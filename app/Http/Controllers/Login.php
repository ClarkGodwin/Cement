<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class Login extends Controller
{
    public function showLoginForm(){
        return view('pages.login'); 
    }

    public function login(Request $request){
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]); 

        $credentials = $request->only('email', 'password'); 

        // if (Auth::attempt($credentials, $request->remember)) {
        if(Auth::attempt($credentials, $request->filled('remember'))){
            $request->session()->regenerate();

            return redirect()->intended('')->with('success', 'Connexion reussi');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->onlyInput('email'); 

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->send()->with('success', 'Deconnexion reussi.');
    }
}
