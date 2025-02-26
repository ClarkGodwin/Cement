<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function list(){
        $orders = Orders::all();
        return view('pages.admin.orders.list', compact('orders')); 
    }

    public function details($id){
        $id = base64_decode($id);
        $order = Orders::find($id);
        $user = User::find($order->id_user); 
        $order_items = Order_items::where('id_order', $order->id)->get(); 

        return view('pages.admin.orders.details', compact(['order', 'user', 'order_items'])); 
    }

    public function delete($id){
        $id = base64_decode($id); 
        $order = Orders::find($id); 
        $user = User::find($order->id_user); 
        $order_items = Order_items::where('id_order', $id)->get(); 

        foreach($order_items as $order_item){
            $order_item->delete(); 
        }

        $order->delete();

        $user->touch(); 

        return redirect()->route('admin-orders-list')->with('success', 'Suppression de la commande reussie'); 
    }
}
