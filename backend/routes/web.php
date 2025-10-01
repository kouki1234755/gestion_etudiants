<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AuthController;
//public routes

Route::get('/', function () {
    return view('home.Accueil');
});

Route::get('/about', function () {
    return view('home.About');
});

Route::get('/contact', function () {
    return view('home.Contact');
});

//routes admin

Route::get('/admin', function () {
    return view('admin.Dashboard');
})->name('dashboard');

//auth (authentification) routes

/*Route::get('/login', function () {
    return view('auth.login');
});*/
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::get('/register',[AuthController::class,'showRegister'])->name('register');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

/*Route::get('/register', function () {
    return view('auth.register');
});*/
//fallback

Route::fallback( function () {
    return view('lib.notfound');
});