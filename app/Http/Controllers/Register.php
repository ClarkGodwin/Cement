<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\User;
use Cookie;
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
        // return view('pages.register'); 
    }

    public function update_cart($id_user){
        $session_id = Cookie::get('laravel_session'); //pour recupere la session actuelle 

        $cart_with_session = Carts::where('session_id', $session_id)->first(); 
        //on recupere un eventuel cart cree avec ladite session 

        $cart_with_id = Carts::where('id_user', $id_user)->first(); 
        //on recupere un eventuel cart de l'utilisateur

        if($cart_with_session){// si la cart existe
            $carts_items = Carts_items::where('id_cart', $cart_with_session->id)->get(); 
            //on recupere tous les items y relatifs

            if($cart_with_id){ // si l'utilisateur avait une cart existante
                foreach($carts_items as $cart_item){
                    $cart_item->id_cart = $cart_with_id->id; 
                    //on met a jour leur id_cart correspondant en leur donnant la valeur du cart de l'utilisateur connecte
                }
            }
            else{ // si l'utilisateur n'avait pas de cart a la base
                $cart_with_id = Carts::create([
                    'id_user' => $id_user
                ]); 

                foreach($carts_items as $cart_item){ // pour chaque item dans la cart avec la session
                    $cart_item->id_cart = $cart_with_id->id; 
                    //on met a jour leur id_cart correspondant en leur donnant la valeur du cart de l'utilisateur connecte
                }
            }
            $cart_item->save(); 

        }

    }

    public function store(Request $request){
        // $validator = $this->validator($request->all()); 

        
        // $user = $this->create($request->all()); 

        // event(new Registered($user)); 

        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255', 
            'first_name' => 'required|string|max:255', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $session_id = Cookie::get('laravel_session'); 
        $cart = Carts::where('session_id', $session_id)->first(); 

        $this->update_cart($user->id); 
        Auth::login($user); 
        
        event(new Registered($user)); 

        if($cart){
            $cart->id_user = Auth::id();
            $cart->session_id = null;
            $cart->save(); 
        }

        return redirect()->intended('email/verify')->with('success', 'Inscription reussi');

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
