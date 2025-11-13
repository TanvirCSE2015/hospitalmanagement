<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrescriptionTest extends Model
{
    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
