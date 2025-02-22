<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carts extends Model
{
    use HasFactory; 

    protected $table = 'carts'; 

    protected $fillable = [
        'id_user',
        'session_id'
    ]; 

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user'); 
    }

    public function carts_items(){
        return $this->hasMany(Carts_items::class, 'id_cart'); 
    }

    public function orders(){
        return $this->hasOne(Orders::class, 'id_cart'); 
    }
}
