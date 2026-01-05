<?php

namespace App\Livewire\Appointment;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class PatientInfo extends Component implements HasForms
{
    use InteractsWithForms;
    public $appointment;
    public $patient_name;


    public function mount($appointment)
    {
        $this->appointment = $appointment;
          $this->form->fill([
            'patient_name' => $this->appointment->patient->patient_name,
            // 'phone' => $appointment->patient->patient_phone,
            // 'age' => $appointment->patient->age,
        ]);
    }

    public function getFormSchema(): array
    {
        
        return[
            TextInput::make('patient_name'),
        ];
    }

    public function getFormModel()
    {
        return $this->appointment->patient;
    }

    public function render()
    {
        return view('livewire.appointment.patient-info');
    }
}
