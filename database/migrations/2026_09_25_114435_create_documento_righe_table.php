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
    Schema::create('documento_righe', function (Blueprint $table) {

        $table->id('documento_riga_id');

        $table->foreignId('documento_id')
              ->constrained('documenti', 'documento_id');

        $table->unsignedBigInteger('articolo_id')
              ->nullable();

        $table->unsignedBigInteger('costume_id')
              ->nullable();

        $table->foreignId('destinatario_associato_id')
              ->nullable()
              ->constrained('associati', 'associato_id');

        $table->integer('quantita');

        $table->decimal('prezzo_unitario', 10, 2)
              ->default(0);

        $table->decimal('totale_riga', 10, 2)
              ->default(0);

        $table->text('note')
              ->nullable();

        $table->timestamps();

        $table->index('documento_id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documento_righe');
    }
};
