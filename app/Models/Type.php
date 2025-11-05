<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_type')->withTimestamps();
    }
}
