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
Schema::create('associati', function (Blueprint $table) {

$table->id('associato_id');

$table->bigInteger('numero_associato')->unique();

$table->string('nome', 100);
$table->string('cognome', 100);

$table->char('sesso', 1)->nullable();

$table->date('data_nascita');

$table->string('comune_nascita', 100);
$table->string('provincia_nascita', 2)->nullable();
$table->string('nazione_nascita', 100)
->default('Italia');

$table->string('codice_fiscale', 16)
->unique();

$table->string('email', 255);

$table->string('cellulare', 30);

$table->string('indirizzo_residenza', 255)->nullable();
$table->string('cap_residenza', 10)->nullable();
$table->string('comune_residenza', 100)->nullable();
$table->string('provincia_residenza', 2)->nullable();
$table->string('nazione_residenza', 100)->nullable();

$table->string('indirizzo_domicilio', 255)->nullable();
$table->string('cap_domicilio', 10)->nullable();
$table->string('comune_domicilio', 100)->nullable();
$table->string('provincia_domicilio', 2)->nullable();
$table->string('nazione_domicilio', 100)->nullable();

$table->string('nome_tutore', 100)->nullable();
$table->string('cognome_tutore', 100)->nullable();
$table->string('cellulare_tutore', 30)->nullable();

$table->date('data_inizio_adesione')->nullable();
$table->date('data_fine_adesione')->nullable();

$table->string('stato_associato', 20);

$table->text('note')->nullable();

$table->timestamps();

$table->index('cognome');
$table->index('stato_associato');
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associati');
    }
};
