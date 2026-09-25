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
    Schema::create('soggetti_terzi', function (Blueprint $table) {

        $table->id('soggetto_terzo_id');

        $table->string('ragione_sociale', 255);

        $table->string('codice_fiscale', 16)
              ->nullable();

        $table->string('partita_iva', 11)
              ->nullable();

        $table->string('email', 255)
              ->nullable();

        $table->string('telefono', 30)
              ->nullable();

        $table->string('indirizzo', 255)
              ->nullable();

        $table->string('cap', 10)
              ->nullable();

        $table->string('comune', 100)
              ->nullable();

        $table->string('provincia', 2)
              ->nullable();

        $table->text('note')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soggetti_terzi');
    }
};
