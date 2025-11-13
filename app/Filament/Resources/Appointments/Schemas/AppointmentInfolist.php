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

                
                TextEntry::make('doctor.user.name')
                    ->label('Doctor'),
                TextEntry::make('name'),
                TextEntry::make('gender'),
                TextEntry::make('appointment_date')
                    ->date(),
                TextEntry::make('schedule.day')
                    ->label('Day')
                    ->placeholder('-'),
                TextEntry::make('attendant_name')
                    ->placeholder('-'),
                TextEntry::make('attendant_phone')
                    ->placeholder('-'),
                TextEntry::make('dob')
                    ->date(),
                TextEntry::make('phone')
                    ->placeholder('-'),
                
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
            ])->columns(3);
    }
}
