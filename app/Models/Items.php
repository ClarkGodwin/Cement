<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'id_user',
        'id_cement',
        'weight',
        'quantity',
        'unity_price'
    ]; 

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'id_user'); 
    }

    public function cement():BelongsTo{
        return $this->belongsTo(Cement::class, 'id_cement'); 
    }
}
