<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Images_items extends Model
{
    use HasFactory;

    protected $table = 'images_items';

    protected $fillable = [
        'id_item',
        'path'
    ]; 

    public function items():BelongsTo{
        return $this->belongsTo(Items::class, 'id_item'); 
    }
}
