<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $casts = [
      'created_at' => 'datetime:Y-m-d h:i:s a',
    ];

    public function item()
    {
      return $this->belongsTo(Item::class);
    }
    public function supplier($value='')
    {
      return $this->belongsTo(Supplier::class);
    }
}
