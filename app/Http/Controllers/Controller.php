<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Images_items;
use App\Models\Items;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests; 

    public function home(){
        $items = Items::where('quantity', '>', 0)->latest('created_at')->take(12)->get(); 
        $images_items = Images_items::all(); 
        return view('pages.home', compact(['items', 'images_items'])); 
    }

    public function all(){
        $items = Items::where('quantity', '>', 0)->get(); 
        $images_items = Images_items::all(); 
        return view('pages.all', compact(['items', 'images_items'])); 
    }

    public function admin_middleware(){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
    }
}
