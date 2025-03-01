<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Items; 
use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\Images_items;
use App\Models\Order_items;
use App\Models\Orders;
use Storage;
use Auth;

class AdminUsersController extends Controller
{
    public function list(){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $users = User::all();
        return view('pages.admin.users.list', compact('users')); 
    }

    public function details($id){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $id = base64_decode($id); 
        $user = User::find($id); 
        return view('pages.admin.users.details', compact('user')); 
    }

    public function change_status($id, $status){
        if(!auth()->user()->admin){
            return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
        }
        $id = base64_decode($id); 
        $user = User::find($id); 
        $id = base64_encode($id); 

        switch($status){
            case 'seller':
                if($user->seller){
                    $user->seller = 0; 
                }
                else{
                    $user->seller = 1; 
                }
                break; 
            case 'admin':
                if($user->admin){
                    $user->admin = 0; 
                }
                else{
                    $user->admin = 1; 
                }
                break; 
            case 'active':
                if($user->active){
                    $user->active = 0; 
                }
                else{
                    $user->active = 1; 
                }
                break; 
            default:
                return redirect()->route('user-details', $id)->with('error', 'Erreur, status inconnu'); 
        }

        $user->save(); 
        return redirect()->route('user-details', $id)->with('success', 'Modifications reussies'); 
    }

}
