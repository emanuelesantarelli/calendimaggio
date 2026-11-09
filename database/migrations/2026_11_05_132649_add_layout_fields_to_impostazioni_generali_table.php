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
    Schema::table(
        'impostazioni_generali',
        function (Blueprint $table) {

            $table->string(
                'colore_primario'
            )->nullable();

            $table->string(
                'colore_secondario'
            )->nullable();

            $table->string(
                'logo_path'
            )->nullable();

        }
    );
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table(
        'impostazioni_generali',
        function (Blueprint $table) {

            $table->dropColumn([
                'colore_primario',
                'colore_secondario',
                'logo_path'
            ]);

        }
    );
}
};
