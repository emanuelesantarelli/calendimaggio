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
    Schema::create('produzioni_sartoria', function (Blueprint $table) {

        $table->id('produzione_sartoria_id');

        $table->foreignId('evento_id')
              ->constrained('eventi', 'evento_id');

        $table->string('numero_produzione', 50)
              ->unique();

        $table->date('data_produzione');

        $table->string('stato', 30);

        $table->text('note')
              ->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produzioni_sartoria');
    }
};
