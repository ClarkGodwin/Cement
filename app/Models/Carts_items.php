<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carts_items extends Model
{
    use  HasFactory; 

    protected $table = 'carts_items'; 

    protected $fillable = [
        'id_cart',
        'id_item',
        'quantity'
    ]; 

    public function carts():BelongsTo{
        return $this->belongsTo(Carts::class, 'id_cart'); 
    }

    public function items():BelongsTo{
        return $this->belongsTo(Items::class, 'id_item'); 
    }
}
