<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    //
    protected $table = 'produks';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'description',
        'contact_person',
        'category',
        'stock',
        'unit',
        'gallery',
        'is_active',
    ];
    protected $casts = ['gallery' => 'array'];

}
