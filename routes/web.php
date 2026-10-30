<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssociatoController;
use App\Http\Controllers\TipologiaAssociativaController;
use App\Http\Controllers\TesseramentoController;
use App\Models\Comune;
use App\Services\CodiceFiscaleService;
use App\Models\StatoEstero;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/associati', [AssociatoController::class, 'index']);
Route::get('/associati/create', [AssociatoController::class, 'create']);
Route::post('/associati', [AssociatoController::class, 'store']);

Route::get('/associati/{id}/edit', [AssociatoController::class, 'edit']);

Route::put('/associati/{id}', [AssociatoController::class, 'update']);

Route::delete('/associati/{id}', [AssociatoController::class, 'destroy']);

Route::get(
    '/associati/{id}',
    [AssociatoController::class, 'show']
);

Route::get(
    '/tesseramenti',
    [TesseramentoController::class, 'index']
);

Route::get(
    '/tesseramenti/create',
    [TesseramentoController::class, 'create']
);

Route::post(
    '/tesseramenti',
    [TesseramentoController::class, 'store']
);

Route::get(
    '/tesseramenti/{id}/edit',
    [TesseramentoController::class, 'edit']
);

Route::put(
    '/tesseramenti/{id}',
    [TesseramentoController::class, 'update']
);

Route::delete(
    '/tesseramenti/{id}',
    [TesseramentoController::class, 'destroy']
);
Route::get('/api/comuni/{nome}', function ($nome) {

    return Comune::whereRaw(
        'UPPER(nome_comune) = ?',
        [strtoupper($nome)]
    )->first();

});
Route::get('/api/codice-fiscale', function () {

    return response()->json([

        'codice_fiscale' =>
            CodiceFiscaleService::genera(

                request('cognome'),
                request('nome'),
                request('sesso'),
                request('data_nascita'),
                request('codice_catastale')

            )

    ]);

});
Route::get('/api/stati-esteri/{nome}', function ($nome) {

    return StatoEstero::whereRaw(
        'UPPER(nome_stato) = ?',
        [strtoupper($nome)]
    )->first();

});
Route::get(
    '/associati/{id}/modulo',
    [AssociatoController::class, 'generaModulo']
);
Route::resource(
    'tipologie-associative',
    TipologiaAssociativaController::class
);
Route::get(
    '/api/associati/{id}/tipologia',
    [TesseramentoController::class,
     'tipologiaAutomatica']
);
Route::get(
    '/api/associati/search',
    [TesseramentoController::class, 'searchAssociati']
);