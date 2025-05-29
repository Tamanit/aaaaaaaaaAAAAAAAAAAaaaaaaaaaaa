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
        Schema::create('act_rows', function (Blueprint $table) {
            $table->foreignId('act_id')->constrained('acts');
            $table->foreignId('rent_unit_id')->constrained('rent_units');
            $table->text('technical_condition')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('act_rows');
    }
};
