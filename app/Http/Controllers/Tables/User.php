<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Carts;
use App\Models\Carts_items;
use App\Models\Images_items;
use App\Models\Order_items;
use App\Models\Orders;
use Auth;
use Hash;
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
                'password' => 'nullable|string|min:8|confirmed',
                'cropped_profile' => 'nullable|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                "last_name" => 'required|string|max:30',
                'first_name' => 'required|string|max:40',
                'password' => 'nullable|string|min:8|confirmed',
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
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        if($request->filled('password')){
            $user->password = Hash::make($request->password); 
        }

        if($request->hasFile('cropped_profile')){
            if($user->profile_photo != null){
                Storage::disk('public')->delete($user->profile_photo); 
            }
            $path = $request->file('cropped_profile')->store('profile/'. $user->last_name. '_'. $user->id, 'public');
            $user->profile_photo = $path; 
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Modifications enregistrees, si l\'email a ete modifie, veuillez le valider avec l\'email de validation envoye'); 

    }

    public function profile_photo_delete(){
        $user = User_table::find(auth()->user()->id); 

        if($user->profile_photo != null){
            Storage::disk('public')->delete($user->profile_photo); 
            $user->profile_photo = null; 
            $user->save(); 
        }

        return redirect()->route('profile')->with('success', 'Photo de profil supprimee avec succes');
    }

    public function delete($id, $admin = false){
        $encoded_id = $id; 
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

        if($admin){
            if(!auth()->user()->admin){
                return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
            }
            $user->delete(); 
    
            return redirect()->route('admin-users-list')->with('success', ' Suppression du compte reussi avec succes'); 
            
        }
        else{
            Auth::logout(); 
    
            $user->delete(); 
    
            return redirect()->route('home')->with('success', ' Suppression du compte reussi avec succes'); 
        }

    }
}
