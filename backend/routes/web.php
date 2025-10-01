<?php

use Illuminate\Support\Facades\Route;
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
});
//auth (authentification) routes


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
//fallback

Route::fallback( function () {
    return view('lib.notfound');
});