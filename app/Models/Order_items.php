<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'id_order',
        'id_item',
        'quantity'
    ]; 
}
