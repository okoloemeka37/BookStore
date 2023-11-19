<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
 Route::get("/dashboard",[DashBoardController::class,"show"])->name("dashboard");
 Route::get("/users",[DashBoardController::class,'users'])->name("users");
 Route::post("/logout",[AuthController::class,'logout'])->name('logout');
 Route::get("/Addbook",[BooksController::class,"show"])->name("Addbook");
 Route::delete("/delete_user/{id}",[DashBoardController::class,'delete_user']);
});




Route::middleware(['guest'])->group(function () {

   Route::get('/login',function(){
        return view('Auths.login');
    })->name('login');
    Route::get('/register',function(){
        return view('Auths.Register');
    })->name("register");

    Route::post("/register",[AuthController::class, 'register'])->name('form');
   Route::post("/login",[AuthController::class,'login'])->name('login.form');

});
