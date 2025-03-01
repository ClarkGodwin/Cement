<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $username = ucfirst(auth()->user()->last_name) . '_' . ucfirst(substr(auth()->user()->first_name, 0, 1));
        return view('pages.admin.dashboard', compact('username')); 
    }
}
