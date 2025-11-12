<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('doctor_id')->constrained()->cascadeOnDelete();
            $table->foreignId('schedule_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name'); // temporary patient name if unregistered
            $table->string('gender');
            $table->string('attendant_name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('attendant_phone')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->date('dob');
            $table->string('phone')->nullable();
            $table->dateTime('appointment_date');
            $table->enum('status', ['pending', 'approved', 'checked_in', 'completed', 'cancelled'])->default('pending');
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
