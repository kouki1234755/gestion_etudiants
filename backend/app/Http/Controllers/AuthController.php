<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

public function showRegister()
    {
        //verbe Http sont :
        //get pour les information sensible
        //post si les information sensible
        //put update
        //
        return view('auth.register');
    }
    public function register(Request $request)
    { //Request c'est les donnees envoyer par le formulaire
        // redirection vers dashboard
        //retourne confirmation d'inscription par mail
        //validation des donnees
        $request->validate(['name'=>'required|string|max:255',
                            'email'=>'required|string|email|max:255|unique:users',
                            'password'=>'required|string|min:8|confirmed',]);
        //save to database
        $user=User::create(['name'=>$request->name,'email'=>$request->email,'password'=>bcrypt($request->password),]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
public function login(Request $request)
    {//Request c'est les donnees envoyer par le formulaire
        //validation des donnees
        $request->validate(['email'=>'required|string|email',
                            'password'=>'required|string',]);
        //auth ::attempt bech yod5el lil bd w ya3mel verification si c bon bech yraja3 el dashboard sinon yraja3 error
if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('dashboard');
        }
        
           return back()->withErrors(['email' => 'Email ou mot de passe incorrect',
                                      'password' =>'mot de passe incorrect']);
        }
            public function logout()
    {
        //redirection vers login page
        Auth::logout();
        return redirect()->route('login');
    }
}
