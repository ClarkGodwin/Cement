<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts_items extends Model
{
    use  HasFactory; 

    protected $table = 'carts_items'; 

    protected $fillable = [
        'id_cart',
        'id_item',
        'quantity'
    ]; 
}
