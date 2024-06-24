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
        Schema::create('renouvellement_cartes', function (Blueprint $table) {
            $table->id();
            $table->string('ancienne_carte');
            $table->string('status');
            $table->foreignIdFor(Demandeur::class);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renouvellement_cartes');
    }
};
