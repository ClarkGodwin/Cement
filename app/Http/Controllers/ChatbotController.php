<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function send_message(Request $request){
        $response = 'Bonjour';

        // if(strpos($message, 'bonjour') !== false || strpos($message, 'salut') !== false){
        //     $response = 'Bonjour, comment puis-je vous aider?';
        // }

        return response()->json(['response' => $response]);
    }
}
