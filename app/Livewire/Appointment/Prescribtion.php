<?php

namespace App\Livewire\Appointment;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;
use Livewire\Component;

class Prescribtion extends Component implements HasForms
{
    use InteractsWithForms;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Physical Test')
                ->schema([
                    Repeater::make('physical_tests')
                        ->relationship('appointment.prescription.tests')
                        ->schema([
                            Select::make('test_id')
                                ->relationship('test', 'test_name')
                                ->required(),
                        ])
                        ->columns(3)
                ]),
        ];
    }
    // public function getFormModel()
    // {
    //     return $this->appointment?->prescription;
    // }
    public function render()
    {
        return view('livewire.appointment.prescribtion');
    }
}
