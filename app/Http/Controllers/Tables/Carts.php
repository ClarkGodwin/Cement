<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Carts_items;
use Auth;
use Carbon\Carbon;
use Cookie;
use Illuminate\Http\Request;
use App\Models\Carts as Carts_table; 

class Carts extends Controller
{
    public function test(){
        return redirect()->route('home')->with('success', 'Element(s) ajoute(s) au panier avec succes'); 
    }
    public function clean_expired_carts(){
        $expiration_date = Carbon::now()->subDays(7); 
        //calculate the date of the 7 days before

        $expired_carts_id = Carts_table::where('updated_at', '<', $expiration_date)
                                ->pluck('id')
                                ->toArray(); 
        //to retrieve all expirated carts' ids                        

        if(!empty($expired_carts_id)){
            Carts_items::whereIn('id_cart', $expired_carts_id)->delete();
            Carts_table::whereIn('id', $expired_carts_id)->delete(); 

            //wherein is used for arrays
        }
        //Now we have to create a command to execute this function daily with laravel scheldule on app/Console/Kernel.php, for the next time
    }

    public function add(Request $request){
        $id_item = (int)$request->id; 
        $quantity = (int)$request->quantity;

        if(Auth::check()){
            $cart = Carts_table::where('id_user', auth()->user()->id)->first(); 

            if(!$cart){
                $cart = Carts_table::create(['id_user' => auth()->user()->id]); 
            }
        }
        else{
            $id_session = Cookie::get('laravel_session'); 
            $cart = Carts_table::where('session_id',  $id_session)->first(); 

            if(!$cart){
                $cart = Carts_table::create([
                    'session_id' => $id_session
                ]); 
            }
            
        }

        $correspondant_cart_item = Carts_items::where('id_cart', $cart->id)
                                    ->where('id_item', $id_item)
                                    ->first();
        //pour s'il y a deja des items correspondants et eviter de creer les memes items avec les memes id_carts                           

        if($correspondant_cart_item){ //s'il y'en a
            $correspondant_cart_item->quantity += $quantity; //on mettra simplement a jour la quantite au lieu d'en creer d'autres
            $correspondant_cart_item->save(); 
        }
        else{ //s'il n'y'en a pas
            Carts_items::create([ //on en creera simplement un autre
                'id_cart' => $cart->id,
                'id_item' => $id_item,
                'quantity' => $quantity
            ]); 
        }

        $cart->touch();  //pour mettre a jour la table Carts pour ajout d'un cart_item

        return redirect()->back()->with('success', 'Element(s) ajoute(s) au panier avec succes'); 
    }

    public function Cart_item_delete($id){
        $id = base64_decode($id); 
        $cart_item = Carts_items::find($id);
        $cart = Carts_table::find($cart_item->id_cart);

        $cart_item->delete();
        
        $correspondant_cart_item = Carts_items::where('id_cart', $cart->id)->first(); 

        if($correspondant_cart_item){
            $cart->touch();
        }
        else{
            $cart->delete(); 
        }

        return redirect()->back()->with('success', 'L\'element a ete supprime du panier avec succes'); 
    }
}
