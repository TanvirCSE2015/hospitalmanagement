<?php

namespace App\Filament\Resources\Appointments\Schemas;

use App\Models\Doctor;
use App\Models\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AppointmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('department_id')
                    ->relationship('department','department_name')
                    ->searchable()
                    ->reactive()
                    ->preload(),
                Select::make('doctor_id')
                     ->options(function (callable $get) {
                        return Doctor::whereHas('user.roles', fn ($q) => $q->where('name', 'doctor'))
                        ->where('department_id',$get('department_id'))
                            ->with('user')
                            ->get()
                            ->mapWithKeys(fn ($doctor) => [
                                $doctor->id => $doctor->user?->name ?? '(no name)',
                            ]);
                    })
                    ->reactive()
                    ->required(),
                DatePicker::make('appointment_date')
                    ->label('Appointment Date')
                    ->disabledDates(function (callable $get) {
                        // Define allowed days
                        $doctorId = $get('doctor_id');

                        // If doctor not selected yet → disable all
                        // if (!$doctorId) {
                        //     return []; // or return all dates disabled if you prefer
                        // }

                        if (! $doctorId) {
                                // Disable a large range (e.g., 10 years)
                                $period = CarbonPeriod::create(now()->subYears(5), now()->addYears(5));
                                return array_map(fn ($d) => Carbon::instance($d)->toDateString(), iterator_to_array($period));
                            }

                        // Fetch allowed days from doctor schedule (e.g., ["Monday", "Wednesday", "Friday"])
                        $allowedDays = Schedule::where('doctor_id', $doctorId)
                            ->pluck('day') // ensure the `day` column contains names like "Monday", "Tuesday", etc.
                            ->map(fn ($d) => strtolower($d))
                            ->toArray();
                        
                            

                        // Define the period you want to control (e.g., next 3 months)
                        $start = now();
                        $end = now()->addMonths(3);
                        $period = CarbonPeriod::create($start, $end);

                        // Generate array of *disabled* dates
                        $disabled = [];
                        foreach ($period as $dt) {
                            /** @var \DateTimeInterface $dt */
                            $date = Carbon::instance($dt);
                            if (! in_array(strtolower($date->format('l')), $allowedDays)) {
                                $disabled[] = $date->toDateString(); // 'YYYY-MM-DD'
                            }
                        }

                        $pastDates = CarbonPeriod::create(now()->subYears(10), now()->subDay());
                        foreach ($pastDates as $pd) {
                            /** @var \DateTimeInterface $pd */
                            $p_date=Carbon::instance($pd);
                            $disabled[] =  $p_date->toDateString();
                        }

                        return $disabled; // Must return array of date strings
                    })
                ->native(false)
                ->reactive()
                ->format('Y-m-d')
                ->displayFormat('Y-m-d')
                ->afterStateUpdated(function(callable $set, callable $get,$state){
                    $doctorId = $get('doctor_id');
                    if (! $doctorId || ! $state) {
                        $set('schedule_id', null);
                        return;
                    }

                    $dayName = strtolower(Carbon::parse($state)->format('l'));

                    $schedule = Schedule::where('doctor_id', $doctorId)
                        ->whereRaw('LOWER(day) = ?', [$dayName])
                        ->first();

                    $set('schedule_id', $schedule?->id);
                }),
                Select::make('schedule_id')
                    ->relationship('schedule', 'day')
                    ->default(null),
                TextInput::make('name')
                    ->required(),
                TextInput::make('age')
                    ->required(),
                DatePicker::make('dob')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),

                Select::make('gender')
                    ->options([
                        'Male'=>'Male',
                        'Female'=>'Female',
                        'Others'=>'Others'
                    ])
                    ->required(),
                TextInput::make('attendant_name')
                    ->default(null),
                TextInput::make('attendant_phone')
                    ->tel()
                    ->default(null),
                TextInput::make('address')
                    ->required(),
    
                Textarea::make('reason')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
