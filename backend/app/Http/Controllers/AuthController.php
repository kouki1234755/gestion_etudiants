<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function showRegister()
    {
        return view('auth.register');
    }
    public function register()
    { // redirection vers dashboard
        return view('auth.register');
    }
public function login()
    {
        return view('auth.login');
    }
    public function logout()
    {
        //redirection vers login page
        return view('auth.register');
    }
}
