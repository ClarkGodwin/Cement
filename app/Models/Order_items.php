<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_items extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'id_order',
        'id_item',
        'quantity'
    ]; 

    public function orders():BelongsTo{
        return $this->belongsTo(Orders::class, 'id_order'); 
    }

    public function items():BelongsTo{
        return $this->belongsTo(Items::class, 'id_item'); 
    }
}
