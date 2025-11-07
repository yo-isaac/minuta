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
        Schema::create('company', function (Blueprint $table) {
            // cnpj as number makes sense rng
            $table->unsignedInteger('cnpj')->nullable(false);
            $table->string('legal_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company', function (Blueprint $table) {
            //
        });
    }
};
