<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryAchievement extends Model
{
    //
    protected $fillable = ['name'];
    protected $table = 'category_achievements';
    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }
}
