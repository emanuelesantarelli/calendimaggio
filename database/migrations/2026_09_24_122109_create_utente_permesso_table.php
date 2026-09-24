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
    Schema::create('utente_permesso', function (Blueprint $table) {

        $table->foreignId('utente_id')
              ->constrained('users');

        $table->foreignId('permesso_id')
              ->constrained('permessi', 'permesso_id');

        $table->primary([
            'utente_id',
            'permesso_id'
        ]);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utente_permesso');
    }
};
