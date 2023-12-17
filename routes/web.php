<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\UserDashBoardController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\IndexPageController;
use App\Http\Controllers\NotificationController;
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
for pagination:: php artisan vendor:publish --tag=laravel-pagination
*/

Route::get('/',[IndexPageController::class,'index'])->name("home");
Route::get('/sort{genre}',[IndexPageController::class,'index'])->name("gen");
//viewing single book 
Route::get('/book{id}',[IndexPageController::class,'single'])->name("sin");

   
   

Route::middleware(['auth'])->group(function () {
  
    // anyAuth can access this route
    //working with book page
Route::post('/storeBook', [BooksController::class,'store'])->name('storeBook');
Route::get("/Addbook",[BooksController::class,"show"])->name("Addbook");
Route::delete("/delete_book/{id}",[BooksController::class,'delete_book']);
Route::get("/editForm/{id}",[BooksController::class,'edit'])->name("edit_btn");
Route::put('/editBook/{id}', [BooksController::class,'update'])->name('editBook');
Route::post("/livesearch",[BooksController::class,"search"]);


//working with notification page
Route::get("/Notification",[NotificationController::class,'all'])->name('notice');

Route::middleware(['admin'])->group(function(){
    Route::get("/AdminDashboard",[AdminDashBoardController::class,"show"])->name("dashboard");
    Route::get("/alusers",[AdminDashBoardController::class,'users'])->name("alusers");
    Route::delete("/delete_user/{id}",[AdminDashBoardController::class,'delete_user']);


//books time
    Route::get("/Adminbook",[BooksController::class,"AdminBooks"])->name("AdminBooks");
//removing books uploaded by others;

Route::post("/removebook",[BooksController::class,"remove"]);

Route::post("/restore_book",[BooksController::class,"restore"]);
   
    
   });
 // working on Authors
Route::middleware(['author'])->group(function(){
    Route::get("/dashboard",[UserDashBoardController::class,'show'])->name("AuthorDashboard");
 Route::get("/book",[BooksController::class,'user_show_books'])->name("Authorbook");

});
 
 //working on normal users
 Route::get("/ndashboard",[UserDashBoardController::class,'Normshow'])->name("NormDashboard");


 Route::post("/logout",[AuthController::class,'logout'])->name('logout');

 
});




Route::middleware(['guest'])->group(function () {

   Route::get('/login',function(){
        return view('Auths.login');
    })->name('login');
    Route::get('/register',function(){
        return view('Auths.Register');
    })->name("register");

    Route::post("/register",[AuthController::class, 'register_normal'])->name('register_handle');
    Route::post("/Aregister",[AuthController::class, 'register_author'])->name('register_handle_author');
   Route::post("/login",[AuthController::class,'login'])->name('login_handle');

});
