<?php

namespace App\Filament\Resources\Appointments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class AppointmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('patient.id')
                    ->label('Patient')
                    ->placeholder('-'),
                TextEntry::make('doctor.id')
                    ->label('Doctor'),
                TextEntry::make('schedule.id')
                    ->label('Schedule')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('gender'),
                TextEntry::make('attendant_name')
                    ->placeholder('-'),
                TextEntry::make('attendant_phone')
                    ->placeholder('-'),
                TextEntry::make('dob')
                    ->date(),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('appointment_date')
                    ->dateTime(),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
