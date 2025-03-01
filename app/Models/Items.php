<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Items extends Model
{
    use HasFactory, Searchable;

    protected $table = 'items';

    protected $fillable = [
        'id_user',
        'id_cement',
        'name',
        'standard', 
        'description',
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

    public function images_items():HasMany{
        return $this->hasMany(Images_items::class, 'id_item'); 
    }

    public function toSearchableArray(){
        $array = [
            'name' => $this->name,
            'standard' => $this->standard,
            'description' => $this->description,
        ];
        return $array; 
    }
}
