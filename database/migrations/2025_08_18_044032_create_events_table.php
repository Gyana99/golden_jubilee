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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('heading'); // Event heading/title
            $table->text('about')->nullable(); // About event
            $table->dateTime('start_datetime'); // Event start
            $table->dateTime('end_datetime');   // Event end
             $table->string('location')->nullable(); // ✅ Add this line
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
