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
    Schema::create('produzioni_sartoria_dettaglio', function (Blueprint $table) {

        $table->id('produzione_sartoria_dettaglio_id');

        $table->foreignId('produzione_sartoria_id')
              ->constrained(
                  'produzioni_sartoria',
                  'produzione_sartoria_id'
              );

        $table->unsignedBigInteger('articolo_id')
              ->nullable();

        $table->unsignedBigInteger('costume_id')
              ->nullable();

        $table->integer('quantita');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produzioni_sartoria_dettaglio');
    }
};
