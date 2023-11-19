<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    function show(){
        $user=Auth::user();
        return    view('admin.AddBook',['user'=>$user]);
    }
}
