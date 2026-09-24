<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipologie_associative', function (Blueprint $table) {
            $table->id('tipologia_associativa_id');

            $table->string('codice', 50)->unique();

            $table->string('descrizione', 255);

            $table->decimal('quota_proposta', 10, 2);

            $table->boolean('attiva')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipologie_associative');
    }
};