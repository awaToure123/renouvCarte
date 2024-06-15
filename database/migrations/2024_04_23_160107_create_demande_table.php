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
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->string('timbre');
            $table->string('copie_acte_naissance');
            $table->string('date_naissance');
            $table->string('photo');
            $table->string('carte_ancienne');
            $table->string('status');
            $table->foreignIdFor(Demandeur::class);
            $table->timestamps();
        });
    }

    /**

     */
    public function down(): void
    {
        Schema::dropIfExists('demande');
    }
};
