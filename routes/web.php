<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Registrasi And Login
Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);
Route::get('/register-customer',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register-customer',[RegisterController::class,'store']);
// Close Registrasi And Login

//Setup Profile Customer
Route::get('/setup-profile/{id}',[ProfileController::class,'index'])->middleware('auth');
Route::post('/setup-profile',[ProfileController::class,'create'])->middleware('auth');
//Close Setup Profile Customer


Route::get('/',[HomeController::class,'index']);

Route::get('/about', function () {
    return view('about',[
        "title"=> "About",
        "name" => "Anung firdauzy",
        "email" => "anungfirdauzy538@gmail.com",
        "image" => "logo.png"
    ]);
});



Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class,'show']);