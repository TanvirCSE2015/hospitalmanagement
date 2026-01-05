<?php

namespace App\Filament\Resources\Appointments\Pages;

use App\Filament\Resources\Appointments\AppointmentResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;

class AppointmentDetails extends Page implements HasForms, HasTable
{
    use InteractsWithRecord,InteractsWithForms,InteractsWithTable;

    protected static string $resource = AppointmentResource::class;

    protected string $view = 'filament.resources.appointments.pages.appointment-details';

     public $activeTab = 'patient_info';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    public function getTitle(): string
    {
        return "Appointment Details — {$this->record->patient->patient_name}";
    }

}
