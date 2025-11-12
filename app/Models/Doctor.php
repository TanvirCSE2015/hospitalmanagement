<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Doctor extends Model
{

    protected static function boot()
    {
         parent::boot();

        // // Delete old avatar when doctor is deleted
        // static::deleting(function ($doctor) {
        //     if ($doctor->avatar_path && \Storage::disk('public')->exists($doctor->avatar_path)) {
        //         \Storage::disk('public')->delete($doctor->avatar_path);
        //     }
        // });

        // Delete old avatar only if a new one is uploaded
        static::updated(function ($doctor) {
            // Check if avatar_path is changed
            if ($doctor->isDirty('photo')) {
                $original = $doctor->getOriginal('photo'); // old file
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function schedules(){
        
        return $this->hasMany(Schedule::class);
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    
}
