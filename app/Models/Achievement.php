<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_achievement_id', // LKS, Olah Raga, Ekstrakurikuler
        'description',
        'date',
        'image',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    
        public function category_achievement()
        {
            return $this->belongsTo(CategoryAchievement::class, 'category_achievement_id');
        }

    protected static function booted()
    {
        static::saved(function(){
            cache()->forget('sitemap-prestasi');    
        }); 

        static::deleted(function(){
            cache()->forget('sitemap-prestasi');    
        });
    }
}
