<x-filament-panels::page>
<x-filament::tabs label="Content tabs">
    <x-filament::tabs.item
        :active="$activeTab === 'patient_info'"
        wire:click="$set('activeTab', 'patient_info')">
        Patient Info
    </x-filament::tabs.item>

     <x-filament::tabs.item
        :active="$activeTab === 'patient_history'"
        wire:click="$set('activeTab', 'patient_history')">
        Patient History
    </x-filament::tabs.item>

    <x-filament::tabs.item
        :active="$activeTab === 'prescription'"
        wire:click="$set('activeTab', 'prescription')">
        Prescription
    </x-filament::tabs.item>
</x-filament::tabs>

<div class="mt-6">
    @if ($activeTab === 'patient_info')
        <x-filament::card>
            @livewire('appointment.patient-info', ['appointment' => $record])
        </x-filament::card>
    @elseif ($activeTab === 'patient_history')
        @livewire('appointment.patient-history', ['appointment' => $record])
    @elseif ($activeTab === 'prescription')
        @livewire('appointment.prescribtion', ['appointment' => $record])
    @endif
</div>
</x-filament-panels::page>
