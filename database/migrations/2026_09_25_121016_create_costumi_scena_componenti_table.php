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
    Schema::create('costumi_scena_componenti', function (Blueprint $table) {

        $table->id('costume_scena_componente_id');

    $table->unsignedBigInteger('costume_scena_id');

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
        Schema::dropIfExists('costumi_scena_componenti');
    }
};
