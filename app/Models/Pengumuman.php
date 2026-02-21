<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
    protected $table = 'pengumumans';
    protected $fillable = ['title', 'description', 'event_date','end_date'];

    protected $casts = [
        'event_date' => 'date',
        'end_date' => 'date',
    ];
    
}
