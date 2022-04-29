<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s a',
    ];

    public function scopeActive($query) {
      return $query->where('status', 'active');
    }
}
