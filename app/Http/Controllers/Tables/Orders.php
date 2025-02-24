<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\Items;
use App\Models\Order_items;
use App\Models\Orders as Orders_table;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class Orders extends Controller
{
    public function add($id_cart){
        $cart_items = Carts_items::where('id_cart', $id_cart)->get();
        $item_ids = $cart_items->pluck('id_item')->toArray(); 
        $items = Items::whereIn('id', $item_ids)->get(); 

        $order = Orders_table::create([
            'id_user' => auth()->user()->id,
        ]); 

        foreach($cart_items as $cart_item){
            Order_items::create([
                'id_order' => $order->id,
                'id_item' => $cart_item->id_item,
                'quantity' => $cart_item->quantity
            ]); 

            foreach($items as $item){
                if($item->id == $cart_item->id_item){
                    $item->quantity -= $cart_item->quantity; 
                    $item->save(); 
                }
            }

            $cart_item->delete();
        }

        Carts::find($id_cart)->delete();

        return redirect()->route('home')->with('success', 'Commande effectuee avec succes');

    }

    public function sold(Request $request){
        $id = (int)$request->id; 
        $quantity = (int)$request->quantity;

        $item = Items::find($id); 
        $item->quantity -= $quantity; 
        $item->save(); 

        $order = Orders_table::create([
            'id_user' => auth()->user()->id,
        ]); 
        
        Order_items::create([
            'id_order' => $order->id,
            'id_item' => $item->id,
            'quantity' => $item->quantity
        ]); 

        return redirect()->route('details', base64_encode($id))->with('success', 'Vente effectuee avec succes');
    }
}
