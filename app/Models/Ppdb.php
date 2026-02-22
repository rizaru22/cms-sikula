<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    //
    protected $fillable = [
        'tahun_ajaran',
        'title',
        'slug',
        'content',
        'is_active',
        'status',
    ];

    protected static function booted()
    {
     static::saving(function ($ppdb) {

        // Kalau status jadi draft → paksa tidak aktif
        if ($ppdb->status === 'draft') {
            $ppdb->is_active = false;
        }

        // Kalau diaktifkan & publish
        if ($ppdb->is_active && $ppdb->status === 'published') {

            // Nonaktifkan semua record lain
            static::where('id', '!=', $ppdb->id)
                ->update(['is_active' => false]);
        }
    });
    }
}
