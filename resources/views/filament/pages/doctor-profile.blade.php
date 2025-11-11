<x-filament-panels::page>
    {{-- Page content --}}
    {{ $this->form }}
    <div class="mt-6">
        <x-filament::button wire:click="save" color="primary">
            Save Profile
        </x-filament::button>
    </div>
</x-filament-panels::page>
