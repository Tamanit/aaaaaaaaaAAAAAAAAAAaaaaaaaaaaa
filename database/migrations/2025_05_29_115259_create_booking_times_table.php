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
//        Schema::create('booking_times', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('rent_unit_type_id_id')->constrained('rent_unit_types');
//            $table->foreignId('tariff_id')->constrained('tariffs');
//            $table->integer('free_hours_in_month')->nullable();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_times');
    }
};
