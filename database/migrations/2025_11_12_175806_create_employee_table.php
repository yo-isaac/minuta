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
            $table->id();

            $table->string('cpf')->unique();   
            $table->string('email')->unique(); 

            $table->string('name');            
            $table->string('password');        
            $table->string('role');            

            $table->foreignId('company_id')
                ->constrained('company')
                ->onDelete('cascade');

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
