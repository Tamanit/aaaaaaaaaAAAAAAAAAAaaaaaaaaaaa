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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('ur_address');
            $table->string('post_address');
            $table->string('bank');
            $table->string('inn', 12);
            $table->string('kpp', 9);
            $table->string('bank_account', 20);
            $table->string('bank_corr_account', 20);
            $table->string('bik', 9);
            $table->string('okpo', 8);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
