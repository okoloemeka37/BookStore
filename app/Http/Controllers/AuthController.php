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
            'image'=> $imageName
       ]);

       // Public Folder
       $request->image->move(public_path('uploaded'), $imageName);
       return redirect()->intended('/');
    }
    protected function registered($request, $user)
    {
        // Log in the user after registration
        Auth::login($user);

        // Redirect to the intended page or any other page you want
        return redirect(RouteServiceProvider::HOME);
    }
}
