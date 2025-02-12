<?php

namespace App\Http\Controllers\Tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items as Items_table; 
use App\Models\Images_items;
use Illuminate\Support\Facades\Storage;
use Validator; 

class Items extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'standard' => 'string|max:255',
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
            'weight' => $request->weight,
            'quantity' => $request->quantity,
            'unity_price' => $request->unity_price,
            'id_user' => auth()->user()->id
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
        return redirect()->intended('')->with('success', 'Insertion reussi');
    }
}
