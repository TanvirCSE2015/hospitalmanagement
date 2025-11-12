<?php

namespace App\Filament\Resources\Appointments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;

class AppointmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('doctor.user.name')
                    ->label('Doctor')
                    ->searchable(),
                TextColumn::make('appointment_date')
                    ->date()
                    ->sortable(),
                TextColumn::make('schedule.day')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextInputColumn::make('patient_id'),
                // TextColumn::make('attendant_name')
                //     ->searchable(),
                // TextColumn::make('attendant_phone')
                //     ->searchable(),
                // TextColumn::make('dob')
                //     ->date()
                //     ->sortable(),
                TextColumn::make('phone')
                    ->searchable(),
                
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
