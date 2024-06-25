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
        Schema::create('pertes_cartes_users', function (Blueprint $table) {
            $table->id();
            $table->string('certificat_de_perte');
            $table->string('extrait_naissance');
            $table->string('ancienne_carte')->nullable();
            $table->string('date_perte')->nullable();
            $table->string('status')->nullable();
            $table->foreignIdFor(Demandeur::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertes_cartes_users');
    }
};
