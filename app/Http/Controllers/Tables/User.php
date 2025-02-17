<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User_table;
use Validator; 

class User extends Controller
{
    public function show(){
        $id = base64_encode(auth()->user()->id);
        return view('pages.profile.infos', compact('id')); 
    }

    public function edit($id){
        $user = User_table::find(base64_decode($id)); 
        return view('pages.profile.edit', compact('user')); 
    }

    public function update(Request $request){
        $user = User_table::find($request->id_user);

        if($request->email != $user->email){
            $validator = Validator::make($request->all(), [
                "last_name" => 'required|string|max:3',
                'first_name' => 'required|string|max:40',
                'email' => 'required|email|unique:users,email',
                'cropped_profile' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                "last_name" => 'required|string|max:3',
                'first_name' => 'required|string|max:40',
                'cropped_profile' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput(); 
        }

        if($request->last_name != $user->last_name){
            $user->last_name = $request->last_name; 
        }

        if($request->first_name != $user->first_name){
            $user->first_name = $request->first_name; 
        }

        if($request->email != $user->email){
            $user->email = $request->email; 
        }

        if($request->hasFile('cropped_profile')){}

    }
}
