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
    Schema::create('eventi', function (Blueprint $table) {

        $table->id('evento_id');

        $table->string('codice', 50)
              ->unique();

        $table->string('descrizione', 255);

        $table->date('data_inizio');

        $table->date('data_fine');

        $table->boolean('attivo')
              ->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventi');
    }
};
