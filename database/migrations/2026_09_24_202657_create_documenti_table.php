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
    Schema::create('documenti', function (Blueprint $table) {

        $table->id('documento_id');

        $table->string('numero_documento', 50)
              ->unique();

        $table->string('tipo_documento', 50);

        $table->string('stato_documento', 30);

        $table->foreignId('evento_id')
              ->nullable()
              ->constrained('eventi', 'evento_id');

        $table->foreignId('associato_id')
              ->nullable()
              ->constrained('associati', 'associato_id');

        $table->unsignedBigInteger('soggetto_terzo_id')
              ->nullable();

        $table->date('data_documento');

        $table->decimal('totale_noleggio', 10, 2)
              ->default(0);

        $table->decimal('totale_quota', 10, 2)
              ->default(0);

        $table->decimal('totale_cauzione', 10, 2)
              ->default(0);

        $table->decimal('totale_documento', 10, 2)
              ->default(0);

        $table->text('motivazione_annullamento')
              ->nullable();

        $table->timestamp('data_annullamento')
              ->nullable();

        $table->foreignId('operatore_id')
              ->nullable()
              ->constrained('users');

        $table->timestamps();

        $table->index('data_documento');
        $table->index('stato_documento');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documenti');
    }
};
