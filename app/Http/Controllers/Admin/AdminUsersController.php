<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function list(){
        $users = User::all();
        return view('pages.admin.users.list', compact('users')); 
    }

    public function details($id){
        $id = base64_decode($id); 
        $user = User::find($id); 
        return view('pages.admin.users.details', compact('user')); 
    }
}
