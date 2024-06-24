<?php

use App\Models\Demandeur;
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
        Schema::create('demande_cartes', function (Blueprint $table) {
            $table->id();
            $table->string('acte_naissance');
            $table->string('certificat_residence');
            $table->string('status');
            $table->string('piece_pere')->nullable();
            $table->string('piece_mere')->nullable();
            $table->foreignIdFor(Demandeur::class);
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_cartes');
    }
};
