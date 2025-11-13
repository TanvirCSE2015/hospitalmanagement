<?php

namespace App\Filament\Resources\Appointments\Pages;

use App\Filament\Resources\Appointments\AppointmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListAppointments extends ListRecords
{
    protected static string $resource = AppointmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        $user = auth()->user();

        if ($user->hasRole('doctor')) {
            $doctor = $user->doctor; // assuming doctor relation
            if ($doctor) {
                $query->where('doctor_id', $doctor->id)
                      ->where('status', 'checked_in');
            } else {
                $query->whereRaw('0 = 1');
            }
        }

        return $query;
    }
}
