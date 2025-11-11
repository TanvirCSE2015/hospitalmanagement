<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\Doctor;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('doctor_id')
                    ->label('Doctor')
                    ->options(function () {
                        $user = auth()->user();

                        // If the user has the "doctor" role, show only their own doctor record
                        if ($user->hasRole('doctor')) {
                            $doctor = $user->doctor;
                            return $doctor ? [$doctor->id => $user->name] : [];
                        }

                        // Otherwise, show all doctors
                        return Doctor::with('user')
                            ->get()
                            ->mapWithKeys(fn($doctor) => [
                                $doctor->id => $doctor->user?->name ?? "(no name)",
                            ])
                            ->toArray();
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('day')
                    ->label('Day')
                    ->options([
                        'Sunday' => 'Sunday',
                        'Monday' => 'Monday',
                        'Tuesday' => 'Tuesday',
                        'Wednesday' => 'Wednesday',
                        'Thursday' => 'Thursday',
                        'Friday' => 'Friday',
                        'Saturday' => 'Saturday',
                    ])
                    ->required(),
                TimePicker::make('start_time')
                    ->required(),
                TimePicker::make('end_time')
                    ->required(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
