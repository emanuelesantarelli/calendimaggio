<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tesseramenti', function (Blueprint $table) {

            $table->id('tesseramento_id');

            $table->foreignId('associato_id')
                  ->constrained('associati', 'associato_id');

            $table->foreignId('tipologia_associativa_id')
                  ->constrained(
                      'tipologie_associative',
                      'tipologia_associativa_id'
                  );

            $table->unsignedBigInteger('documento_id')
                  ->nullable()
                  ->unique();

            $table->foreignId('operatore_id')
                  ->constrained('users');

            $table->integer('anno');

            $table->decimal('importo_quota', 10, 2);

            $table->string('metodo_pagamento', 30);

            $table->date('data_pagamento');

            $table->text('note')->nullable();

            $table->timestamps();

            $table->unique(
                ['associato_id', 'anno'],
                'uq_tesseramento_annuale'
            );

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tesseramenti');
    }
};