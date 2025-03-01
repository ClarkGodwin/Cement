<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Images_items;
use App\Models\Items;
use App\Models\User;
use Illuminate\Http\Request;

class AdminItemsController extends Controller
{
    public function list(){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $items = Items::all();
        return view('pages.admin.items.list', compact('items')); 
    }

    public function details($id){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $id = base64_decode($id); 
        $item = Items::find($id); 
        $user = User::find($item->id_user); 
        $username = ucfirst($user->first_name). ' '. ucfirst($user->last_name); 
        $images = Images_items::where('id_item', $id)->get(); 
        return view('pages.admin.items.details', compact(['item', 'images', 'username'])); 
    }
}
