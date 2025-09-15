<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category', // LKS, Olah Raga, Ekstrakurikuler
        'description',
        'date',
        'image',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
