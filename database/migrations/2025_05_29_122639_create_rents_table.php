<?php

use App\Enumeration\RentStatus;
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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->timestamp('registration_date');
            $table->integer('number_of_places');
            $table->timestamp('rent_at');
            $table->text('message')->nullable();
//            $table->foreignId('organization_id')->constrained('organizations');
//            $table->foreignId('price_id')->constrained('prices');
//            $table->foreignId('tariff_id')->constrained('tariffs');
//            $table->foreignId('act_id')->constrained('acts');
            $table->enum('status', RentStatus::toArray());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
