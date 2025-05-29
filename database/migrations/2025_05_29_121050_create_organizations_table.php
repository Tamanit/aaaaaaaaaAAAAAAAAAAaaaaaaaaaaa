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
            $table->string('inn');
            $table->string('kpp');
            $table->string('bank_account');
            $table->string('bank_corr_account');
            $table->string('bik');
            $table->string('okpo');
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
