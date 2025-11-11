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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('designation_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('license_number', 100)->unique()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('specialization', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('phone', 20)->unique()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('address', 500)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
