<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'welcome_message',
        'history',
        'vision',
        'mission',
        'study_programs', // JSON or text
    ];
}
