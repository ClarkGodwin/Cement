<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cement extends Model
{
    use HasFactory;

    protected $table = 'cement';

    protected $fillable = [
        'name',
        'standard',
        'description'
    ];

    public function items():HasMany{
        return $this->hasMany(Items::class, 'id_cement'); 
    }
}
