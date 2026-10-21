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
    Schema::create('consensi_privacy', function (Blueprint $table) {

        $table->id('consenso_privacy_id');

        $table->unsignedBigInteger('associato_id');

        $table->boolean('privacy_accettata')
              ->default(false);

        $table->boolean('riprese_audio_video')
              ->default(false);

        $table->boolean('comunicazioni_commerciali')
              ->default(false);

        $table->date('data_consenso')
              ->nullable();

        $table->timestamps();

        $table->foreign('associato_id')
              ->references('associato_id')
              ->on('associati')
              ->onDelete('cascade');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('consensi_privacy');
}
};
