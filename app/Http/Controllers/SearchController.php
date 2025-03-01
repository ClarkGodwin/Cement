<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->json('query');
        $results = Items::search($query)->get();

        return response()->json($results);
    }
}
