<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\Images_items;
use App\Models\Order_items;
use App\Models\Orders;
use Auth;
use Illuminate\Http\Request;
use App\Models\User as User_table;
use App\Models\Items; 
use Storage;
use Validator; 

class User extends Controller
{
    public function show(){
        $id = base64_encode(auth()->user()->id);
        return view('pages.profile.infos', compact('id')); 
    }

    // public function dashboard(){
    //     $users = User_table::all();
        
    //     // return view('pages.admin.dashboard', compact())
    // }

    public function edit($id){
        $user = User_table::find(base64_decode($id)); 
        return view('pages.profile.edit', compact('user')); 
    }

    public function update(Request $request){
        $user = User_table::find($request->id_user);

        if($request->email != $user->email){
            $validator = Validator::make($request->all(), [
                "last_name" => 'required|string|max:30',
                'first_name' => 'required|string|max:40',
                'email' => 'required|email|unique:users,email',
                'cropped_profile' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                "last_name" => 'required|string|max:30',
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

        if($request->hasFile('cropped_profile')){
            if($user->profile_photo != null){
                Storage::disk('public')->delete($user->profile_photo); 
            }
            $path = $request->file('cropped_profile')->store('profile/'. $user->last_name. '_'. $user->id, 'public');
            $user->profile_photo = $path; 
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Modifications reussies'); 

    }

    public function delete($id){
        $id = base64_decode($id); 
        $user = User_table::find($id); 
        $items = Items::where('id_user', $id)->get();

        if(count($items) > 0){
            foreach($items as $item){
                $images_items = Images_items::where('id_item', $item->id)->get(); 

                if(count($images_items) > 0){
                    foreach($images_items as $image_item){
                        Storage::disk('public')->delete($image_item->path); 
                        $image_item->delete(); 
                    }
                }

                $item->delete();
            }
        }

        $carts = Carts::where('id_user', $id)->get();

        if(count($carts) > 0){
            foreach($carts as $cart){
                $cart_items = Carts_items::where('id_cart', $cart->id)->get();
                foreach($cart_items as $cart_item){
                    $cart_item->delete(); 
                }

                $cart->delete(); 
            }
        }

        $orders = Orders::where('id_user', $id)->get();

        if(count($orders) > 0){
            foreach($orders as $order){
                $order_items = Order_items::where('id_order', $order->id)->get(); 
                foreach($order_items as $order_item){
                    $order_item->delete(); 
                }

                $order->delete(); 
            }
        }

        if($user->profile_photo){
            Storage::disk('public')->delete($user->profile_photo); 
        }

        Auth::logout(); 

        $user->delete(); 

        return redirect()->route('home')->with('success', ' Suppression du compte reussi avec succes'); 

    }
}
