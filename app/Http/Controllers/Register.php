<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
// use illuminate\Support\Facades\Validator; 
use Validator; 

class Register extends Controller
{
    public function showRegistrationForm(){
        return view('pages.register'); 
    }

    public function store(Request $request){
        $this->validator($request->all())->validate(); 

        $user = $this->create($request->all()); 

        event(new Registered($user)); 

        // auth()->login($user); 

        Auth::login($user); 

        return redirect()->intended('')->with('success', 'Inscription reussi');

    }

    public function validator(array $data){
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8', Rules\Password::defaults()],
        ]); 
    }

    public function create(array $data){
        return User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
