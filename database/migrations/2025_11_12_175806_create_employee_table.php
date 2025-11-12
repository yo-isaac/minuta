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
        Schema::create('employee', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('cpf')->nullable(false)->unique(true);
            $table->string('name')->nullable(false)->unique(true);
            $table->string('email')->nullable(false)->unique(true);
            $table->string('password')->nullable(false)->unique(true);
            
            $table->string('role')->nullable(false)->unique(true);

            $table->string('company_id')->nullable(false);
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {
            //
        });
    }
};
