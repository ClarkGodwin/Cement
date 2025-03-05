<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\User;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class Login extends Controller
{
    public function showLoginForm(){
        return view('pages.login'); 
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

        if(Auth::attempt($credentials)){
            $id_user = Auth::id(); 
            $user = User::find($id_user); 

            if($user->active){
                $this->update_cart($id_user); 
    
                return redirect()->intended('')->with('success', 'Connexion reussi');

            }
            else{
                Auth::logout(); 
                return redirect()->route('home')->with('error', 'Erreur, impossible de vous connectez, Votre compte n\'est plus actif, veuillez contactez un adminitrateur pour le reactiver');

            }
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
