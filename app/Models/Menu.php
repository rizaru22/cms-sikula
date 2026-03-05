<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['name', 'route', 'icon', 'order', 'is_active'];

    protected $table = 'menus';

}
