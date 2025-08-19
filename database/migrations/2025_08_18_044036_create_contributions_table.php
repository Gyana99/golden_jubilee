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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade'); // Linked to alumni
            $table->decimal('amount', 10, 2); // Amount
            $table->string('payment_method')->nullable(); // Payment method (UPI, Card, etc.)
            $table->string('transaction_id')->nullable(); // Optional transaction reference
            $table->date('payment_date')->nullable(); // Payment date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
