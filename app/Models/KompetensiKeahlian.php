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

}
