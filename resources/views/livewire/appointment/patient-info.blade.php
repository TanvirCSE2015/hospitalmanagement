<div class="grid grid-cols-2 md:grid-cols-2 gap-4 p-4 bg-white rounded-lg shadow">
    {{ $this->form }}
    <div class="space-y-2">
        <div>
            <span class="font-semibold">Name:</span> {{ $appointment->patient->patient_name }}
        </div>
        <div>
            <span class="font-semibold">Email:</span> {{ $appointment->patient->email }}
        </div>
        <div>
            <span class="font-semibold">Phone:</span> {{ $appointment->patient->phone }}
        </div>
    </div>

    <!-- Column 2 -->
    <div class="space-y-2">
        <div>
            <span class="font-semibold">Gender:</span> {{ $appointment->patient->gender }}
        </div>
        <div>
            <span class="font-semibold">Date of Birth:</span> {{ $appointment->patient->dob }}
        </div>
        <div>
            <span class="font-semibold">Address:</span> {{ $appointment->patient->address }}
        </div>
    </div>
</div>
