<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{




    //getting users location with ip address

          




    function register_normal(Request $request)  {

        

       $credentials=$request->validate([
        'name'=>['required','string'],
        'email'=>['required','email','unique:users,email'],
        'password'=>['required', Password::min(8)->letters()->symbols()],
        'image'=>['required','image','mimes:png,jpg,jpeg|max:2048'],
       ]);

    

       
       $imageName = time().'.'.$request->image->extension();
       User::create([
            'name'=>$credentials['name'],
            'email'=> $credentials['email'],
            'password'=>bcrypt($credentials['password']),
            'image'=> $imageName,
            'role'=>'norm',
            'phone'=>' ',
            'ig_link'=>' ',
            'fb_link'=>' ',
            'twitter_link'=>' ',
            'author_description'=>' ',
            'country'=>$request['country'],
            'currency'=>$request['currency'],
               ]);

       // Public Folder
       $request->image->move(public_path('uploaded'), $imageName);
      

       Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);

       // Redirect to the dashboard or any other desired page
      
    
        return redirect()->route('NormDashboard'); 
       
       
    }



    function register_author(Request $request)  {
        trim($request->phone);
        $credentials=$request->validate([
         'Aname'=>['required','string'],
         'Aemail'=>['required','email','unique:users,email'],
         'Apassword'=>['required', Password::min(8)->letters()->symbols()],
         'Aimage'=>['required','image','mimes:png,jpg,jpeg|max:2048'],
         'phone'=>['required','regex:/^[0-9]+$/','max:9999999999'],
         'ig_link'=>['required','url'],
         'fb_link'=>['required','url'],
         'twitter_link'=>['required','url'],
         'author_description'=>['required','string']
        ]);
        
        $imageName = time().'.'.$request->Aimage->extension();
        User::create([
             'name'=>$credentials['Aname'],
             'email'=> $credentials['Aemail'],
             'password'=>bcrypt($credentials['Apassword']),
             'image'=> $imageName,
             'role'=>'Author',
             'phone'=>$credentials['phone'],
             'ig_link'=>$credentials['ig_link'],
             'fb_link'=>$credentials['fb_link'],
             'twitter_link'=>$credentials['twitter_link'],
             'author_description'=>$credentials['author_description'],
             'country'=>$request['country'],
            'currency'=>$request['currency'],
        ]);
 
        // Public Folder
        $request->Aimage->move(public_path('uploaded'), $imageName);
       
 
        Auth::attempt(['email' => $credentials['Aemail'], 'password' => $credentials['Apassword']]);
 
        // Redirect to the dashboard or any other desired page
       
     
         return redirect()->route('AuthorDashboard');
        
        
     }
 



    function login(Request $request) {
        $credentials=$request->validate([
            
            'email'=>['required','email','exists:users,email'],
            'password'=>['required'],
           ]);
           if(Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])){
            if(auth()->user()->role == 'Admin') {
                return redirect()->route('dashboard');
               }
               else if(auth()->user()->role == 'Author'){
                return redirect()->route('AuthorDashboard');
               }else{
                return redirect()->route('NormDashboard');
               }
           }else{
            return redirect()->route("login")->with(['error'=>"Wrong Credentials"]);
           }
           
    }
   

function logout(){
Auth::logout();
return redirect()->route("login");

}

}
