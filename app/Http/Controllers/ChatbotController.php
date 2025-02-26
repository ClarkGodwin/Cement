<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    private $key_words = [
        'stock' => ['disponible', 'stock', 'restant', 'reste'],
        'prix' => ['prix', 'cout', 'combien'],
        'poids' => ['poids', 'lourd', 'pese'],
        'standard' => ['standard', 'norme']
    ]; 

    public function send_message(Request $request){
        $message = strtolower(trim($request->json('message'))); 
        $response = '';

        if(strpos($message, 'bonjour') !== false || strpos($message, 'salut') !== false){
            $response = 'Bonjour, comment puis-je vous aider?';
        }
        else if(strpos($message, 'liste') !== false){
            $items = Items::all(); 
            $names = []; 

            foreach($items as $item){
                if($item->standard != 'null' && $item->standard != ''){
                    $names[] = ucfirst($item->name )." de standard ". ucfirst($item->standard); 
                }
                else{
                    $names[] = ucfirst($item->name); 
                }
            }

            $response = implode(', ', $names); 
        }
        else{
            $response = $this->generate_reply($message); 
        }

        return response()->json(['response' => ucfirst($response)]);
    }

    public function generate_reply($message){
        foreach($this->key_words as $intent => $words){
            foreach($words as $word){
                if(strpos($message, $word) !== false){
                    return $this->get_item_infos($message, $intent); 
                }
            }
        }

        return 'je suis desole, je n\'ai pas compris votre demande, je peux vous informer sur les ciments disponibles, leurs prix, poids et standards. '; 
    }

    public function extract_item_id($message){
        $names = Items::pluck('name')->toArray(); 
        $standards = Items::pluck('standard')->toArray(); 

        foreach($names as $name){
            if(stripos($message, $name) !== false){
                $are_standard = Items::where('name', $name)->pluck('name')->toArray(); 

                if(count($are_standard) > 1){
                    foreach($standards as $standard){
                        if(stripos($message, $standard) !== false){
                            $items = Items::where('name', $name)->get(); 
                            foreach($items as $item){
                                if(stripos($message, $item->standard) !== false){
                                    return $item->id; 
                                }
                            }
                        }
                    }

                    $ids = Items::where('name', $name)->pluck('id')->toArray(); 
                    return $ids; 
                }
                else{
                    $id = Items::where('name', $name)->pluck('id')->first(); 
                    return $id; 
                }
            }
        }

        return null; 
    }

    public function get_item_infos($message, $label){
        $answer = $this->extract_item_id($message); 
        $item = null; 

        if(is_int($answer)){
            $item = Items::find($answer); 
            $standard = "de standard $item->standard"; 

            switch($label){
                case 'prix':
                    if($item->standard != 'null' && $item->standard != ''){
                        return "Le $label du ciment $item->name $standard est de $item->unity_price BIF"; 
                    }
                    else{
                        return "Le $label du ciment $item->name est de $item->unity_price BIF"; 

                    }

                case 'poids':
                    if($item->standard != 'null' && $item->standard != ''){
                        return "Le $label du ciment $item->name $standard est de $item->weight Kg"; 
                    }
                    else{
                        return "Le $label du ciment $item->name est de $item->weight Kg"; 

                    }

                case 'stock':
                    if($item->standard != 'null' && $item->standard != ''){
                        return "Le $label du ciment $item->name $standard est de $item->quantity sacs"; 
                    }
                    else{
                        return "Le $label du ciment $item->name est de $item->quantity sacs"; 

                    }

                case 'standard':
                    if($item->standard != 'null' && $item->standard != ''){
                        return "Le $label du ciment $item->name est $item->standard"; 
                    }
                    else{
                        return "Il n'y a pas de renseignement pour le $label du ciment $item->name"; 

                    }

                    
            }

        }
        else{
            if(is_array($answer)){
                $name = Items::find($answer[0])->name; 
                $standards = Items::where('name', $name)->pluck('standard')->toArray(); 
                $standards_string = implode(', ', $standards); 
                $standards_count = count($standards); 

                return "Pour le ciment $name, il y a $standards_count standards, veuillez precisez le nom et le standard. Ces standards sont: $standards_string"; 
            }
            else{
                return 'Veuillez precisez un nom correct, demandez-moi la liste'; 

            }
        }
    }

}
