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
        Schema::create(
    'impostazioni_generali',
    function (Blueprint $table) {

        $table->id();

        $table->string(
            'nome_associazione'
        );

        $table->string(
            'indirizzo'
        )->nullable();

        $table->string(
            'cap',
            10
        )->nullable();

        $table->string(
            'citta'
        )->nullable();

        $table->string(
            'provincia',
            2
        )->nullable();

        $table->string(
            'email'
        )->nullable();

        $table->string(
            'pec'
        )->nullable();

        $table->string(
            'telefono'
        )->nullable();

        $table->string(
            'codice_fiscale'
        )->nullable();

        $table->string(
            'partita_iva'
        )->nullable();

        $table->string(
            'logo'
        )->nullable();

        $table->timestamps();

    }
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impostazioni_generali');
    }
};
