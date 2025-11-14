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
        Schema::create('first_access', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')
                ->constrained('employee')
                ->onDelete('cascade');

            $table->foreignId('company_id')
                ->constrained('company')
                ->onDelete('cascade');

            $table->enum('status', ['PENDING', 'DONE'])->default('PENDING');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('first_access', function (Blueprint $table) {
            Schema::dropIfExists('first_access');
        });
    }
};
