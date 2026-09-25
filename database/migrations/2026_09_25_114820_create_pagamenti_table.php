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
    Schema::create('pagamenti', function (Blueprint $table) {

        $table->id('pagamento_id');

        $table->foreignId('documento_id')
              ->constrained('documenti', 'documento_id');

        $table->decimal('importo', 10, 2);

        $table->string('metodo_pagamento', 30);

        $table->date('data_pagamento');

        $table->text('note')
              ->nullable();

        $table->timestamps();

        $table->index('data_pagamento');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagamenti');
    }
};
