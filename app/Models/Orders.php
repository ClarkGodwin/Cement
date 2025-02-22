<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'id_user', 
        'id_cart'
    ]; 

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user');  
    }

    public function order_items(){
        return $this->hasMany(Order_items::class, 'id_order'); 
    }

    public function carts():BelongsTo{
        return $this->belongsTo(Carts::class, 'id_cart'); 
    }
}
