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
        Schema::create('comuni', function (Blueprint $table) {

            $table->id('comune_id');

            $table->string('nome_comune', 100);

            $table->string('provincia', 2)
                  ->nullable();

            $table->string('codice_catastale', 10);

            $table->string('nazione', 100)
              ->default('Italia');

            $table->boolean('attivo')
              ->default(true);

            $table->timestamps();

            $table->index('nome_comune');
            $table->index('provincia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comuni');
    }
};
