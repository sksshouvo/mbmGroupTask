<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s a',
    ];
}
