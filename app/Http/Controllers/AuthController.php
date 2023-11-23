<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    function register(Request $request)  {
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
            'role'=>' '
       ]);

       // Public Folder
       $request->image->move(public_path('uploaded'), $imageName);
      

       Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);

       // Redirect to the dashboard or any other desired page
       if(auth()->user()->role == 'Admin') {
        return redirect()->route('dashboard');
       }
       else{
        return redirect()->route('udashboard');
       }
       
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
               else{
                return redirect()->route('udashboard');
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
