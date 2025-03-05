<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use App\Models\Order_items;
use App\Models\Orders;
use App\Models\User;
use Dom\Element;
use Illuminate\Http\Request;
use App\Models\Items as Items_table; 
use App\Models\Images_items;
use Illuminate\Support\Facades\Storage;
use Validator; 

class Items extends Controller
{
    public function list($id_user){
        $id_user = base64_decode($id_user); 
        $items = Items_table::where('id_user', $id_user)->get();
        return view('pages.items.list', compact('items'));
    }
    
    public function details($id){
        $id = base64_decode($id); 
        $id = (int)$id;
        $item = Items_table::find($id); 
        $images = Images_items::where('id_item', $id)->get();
        return view('pages.items.details', compact(['item', 'images'])); 
    }

    public function user_view_details($id){
        $id = base64_decode($id); 
        $item = Items_table::find($id); 
        $images = Images_items::where('id_item', $id)->get();
        return view('pages.details', compact(['item', 'images'])); 
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'standard' => 'nullable|string|max:255',
            'description' => 'required|string',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unity_price' => 'required|numeric',
            'croppedImages' => 'required',
            'croppedImages.*' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); 

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 422);
        }

        $items = Items_table::create([
            'name' => $request->name,
            'standard' => $request->standard,
            'description' => $request->description,
            'weight' => (int)$request->weight,
            'quantity' => (int)$request->quantity,
            'unity_price' => (int)$request->unity_price,
            'id_user' => (int)$request->id_user 
        ]);

        $last_id = $items->id;

        $images_paths = []; 

        if($request->hasFile('croppedImages')){
            foreach($request->file('croppedImages') as $image){
                // In case you want to rename the image and still store it in public
                // $image_name = time().'_'.uniqid().'.'.$image->getClientOriginalExtension(); 
                // $path = $image->storeAs('items/'. $request->name. '_'. $last_id , $image_name, 'public');
                $path = $image->store('items/'. auth()->user()->last_name. '_'. auth()->user()->id. '/'. $request->name. '_'. $last_id , 'public');

                Images_items::create([
                    'id_item' => $last_id,
                    'path' => $path
                ]);

                $images_paths[] = $path; 
            }

        }

        $user = User::find($request->id_user); 

        if($user->seller != 1){
            $user->seller = 1; 
            $user->save(); 
        }

        return redirect()->intended('')->with('success', 'Insertion reussi');
    }

    public function image_add(Request $request, $admin = false){
        $item_id = (int)$request->id_item; 
        if($request->hasFile('cropped_item')){
            $path = $request->file('cropped_item')->store('items/'. auth()->user()->last_name. '_'. auth()->user()->id. '/'. $request->name. '_'. $item_id , 'public');
    
            Images_items::create([
                'id_item' => $item_id,
                'path' => $path
            ]);
        }
        if($admin){
            if(!auth()->user()->admin){
                return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
            }
            return redirect()->route('item-details', base64_encode($item_id))->with('success', 'Image ajoutee avec succes');

        }
        else{
            return redirect()->route('items-details', base64_encode($item_id))->with('success', 'Image ajoutee avec succes');

        }
    }

    public function image_delete($id, $admin = false){ // il s'agit de l'id de l'image
        $id = base64_decode($id); 
        $image = Images_items::find($id); 
        $item = Items_table::find($image->id_item); 
        $path = $image->path; 
        Storage::disk('public')->delete($path); 
        $image->delete(); 
        if($admin){
            if(!auth()->user()->admin){
                return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
            }
            return redirect()->route('item-details', base64_encode($item->id))->with('success', 'Image supprimee avec succes');
        }
        else{
            return redirect()->route('items-details', base64_encode($item->id))->with('success', 'Image supprimee avec succes');

        }
    }

    public function update(Request $request, $admin = false){
        $id = (int)$request->id; 
        $items = Items_table::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'standard' => 'nullable|string|max:255',
            'description' => 'required|string',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unity_price' => 'required|numeric',
        ]); 

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 422);
        }

        if($request->name != $items->name){
            $items->name = $request->name; 
        }

        if($request->standard != $items->standard){
            $items->standard = $request->standard; 
        }

        if($request->description != $items->description){
            $items->description = $request->description; 
        }

        if((int)$request->weight != $items->weight){
            $items->weight = (int)$request->weight; 
        }

        if((int)$request->quantity != $items->quantity){
            $items->quantity = (int)$request->quantity; 
        }

        if((int)$request->unity_price != $items->unity_price){
            $items->unity_price = (int)$request->unity_price; 
        }

        $items->save(); 

        if($admin){
            if(!auth()->user()->admin){
                return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
            }
            return redirect()->route('item-details', base64_encode($id))->with('success', 'Modifications enregistrees avec succes');

        }
        else{
            return redirect()->route('items-details', base64_encode($id))->with('success', 'Modifications enregistrees avec succes');

        }

    }

    public function delete(Request $request, $admin = false){
        $id = (int)$request->id; 
        $items = Items_table::find($id); 
        $images = Images_items::where('id_item', $id)->get();
        
        foreach($images as $image){
            Storage::disk('public')->delete($image->path); 
            $image->delete(); 
        }

        $order_items = Order_items::where('id_item', $id)->get();

        if(count($order_items) > 0){
            foreach($order_items as $order_item){
                $order_id = $order_item->id_order; 
                $order_item->delete();

                $others_orders = Order_items::where('id_order', $order_id)->get();
                // to see if there are others items_other so we won't delete the order if so

                if(count($others_orders) == 0){
                    Orders::find($order_id)->delete(); 
                }
                
            }
        }

        $items->delete();
        if($admin){
            if(!auth()->user()->admin){
                return redirect()->route('home')->with('error', 'Vous devez etre un administarteur pour acceder a cette partie de l\'application'); 
            }
            return redirect()->route('admin-items-list')->with('success', 'Modifications enregistrees avec succes');

        }
        else{
            return redirect()->route('items-list', base64_encode(auth()->user()->id))->with('success', 'Modifications enregistrees avec succes');

        }
    }
}
