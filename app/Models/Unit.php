<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function types()
    {
        return $this->belongsToMany(Type::class, 'unit_type')->withTimestamps();
    }
}
