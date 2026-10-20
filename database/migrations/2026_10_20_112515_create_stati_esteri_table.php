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
    Schema::create('stati_esteri', function (Blueprint $table) {

        $table->id('stato_estero_id');

        $table->string('nome_stato', 150);

        $table->string('codice_catastale', 10);

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
    Schema::dropIfExists('stati_esteri');
}
};
