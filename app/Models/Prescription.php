<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function medicines()
    {
        return $this->hasMany(PrescriptionMedicine::class);
    }

    public function tests()
    {
        return $this->hasMany(PrescriptionTest::class);
    }
}
