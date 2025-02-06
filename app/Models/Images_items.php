<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images_items extends Model
{
    use HasFactory;

    protected $table = 'images_items';

    protected $fillable = [
        'id_item',
        'path'
    ]; 
}
