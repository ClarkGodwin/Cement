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
        'id_user'
    ]; 

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user');  
    }

    public function order_items(){
        return $this->hasMany(Order_items::class, 'id_order'); 
    }
}
