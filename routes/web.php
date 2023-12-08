<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\UserDashBoardController;
use App\Http\Controllers\BooksController;
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
*/

Route::get('/', function () {
    return view('welcome');
})->name("home");

   
   

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
    Route::get("/dashboard",[AdminDashBoardController::class,"show"])->name("dashboard");
    Route::get("/alusers",[AdminDashBoardController::class,'users'])->name("alusers");
    Route::delete("/delete_user/{id}",[AdminDashBoardController::class,'delete_user']);


//books time
    Route::get("/Adminbook",[BooksController::class,"AdminBooks"])->name("AdminBooks");
//removing books uploaded my norms;

Route::post("/removebook",[BooksController::class,"remove"]);

Route::post("/restore_book",[BooksController::class,"restore"]);
   
    
   });
 // working on normal users 

 Route::get("/udashboard",[UserDashBoardController::class,'show'])->name("udashboard");
 Route::get("/ubook",[BooksController::class,'user_show_books'])->name("ubook");

 


 Route::post("/logout",[AuthController::class,'logout'])->name('logout');

 
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
