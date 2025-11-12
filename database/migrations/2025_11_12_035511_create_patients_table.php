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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_code')->unique();
            $table->string('patient_name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
             $table->string('gender')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('patient_phone')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('attendant_name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('attendant_phone')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('patient_address')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
