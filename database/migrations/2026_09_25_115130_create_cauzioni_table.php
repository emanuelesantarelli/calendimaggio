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
    Schema::create('cauzioni', function (Blueprint $table) {

        $table->id('cauzione_id');

        $table->foreignId('documento_id')
              ->unique()
              ->constrained('documenti', 'documento_id');

        $table->decimal('importo_richiesto', 10, 2)
              ->default(0);

        $table->decimal('importo_versato', 10, 2)
              ->default(0);

        $table->decimal('importo_restituito', 10, 2)
              ->default(0);

        $table->date('data_versamento')
              ->nullable();

        $table->date('data_restituzione')
              ->nullable();

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
        Schema::dropIfExists('cauzioni');
    }
};
