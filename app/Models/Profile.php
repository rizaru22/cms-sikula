<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{ 
    protected $fillable = [
        'welcome_message',
        'name',
        'short_name',
        'address',
        'phone',
        'email',
        'logo',
        'history',
        'vision',
        'mission',
        'facebook', 
        'twitter', 
        'instagram', 
        'youtube', 
        'thread', // JSON or text
    ];
}
