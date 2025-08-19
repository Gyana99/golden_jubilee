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
        Schema::table('contributions', function (Blueprint $table) {
             $table->dropColumn(['transaction_id', 'payment_method']); // remove old columns
            $table->string('payment_photo')->nullable()->after('payment_date'); // add new column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contributions', function (Blueprint $table) {
             $table->string('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->dropColumn('payment_photo');
        });
    }
};
