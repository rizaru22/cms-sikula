<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    //
    protected $table = 'kompetensi_keahlians';
    protected $fillable = [
        'logo',
        'name',
        'slug',
        'description',
    ];

    protected static function booted()
    {
        static::saved(function(){
            cache()->forget('sitemap-kompetensi');    
        });

        static::deleted(function(){
            cache()->forget('sitemap-kompetensi');    
        });
    }

}
