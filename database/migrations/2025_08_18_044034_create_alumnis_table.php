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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Alumni name
            $table->year('passout_year'); // Passout year
            $table->string('email')->unique(); // Email (optional but useful)
            $table->string('phone')->nullable(); // Phone optional
            $table->string('photo')->nullable(); // Profile photo path optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
