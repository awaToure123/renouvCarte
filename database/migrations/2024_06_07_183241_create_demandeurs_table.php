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
        Schema::create('demandeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('age')->nullable();
            $table->string('adresse')->nullable();
            $table->string('situation_matrimonial')->nullable();
            $table->string('professession')->nullable();
            $table->string('region')->nullable();
            $table->string('status');;
            $table->string('tel')->unique();
            $table->string('password');
            $table->string('profile')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandeurs');
    }
};
