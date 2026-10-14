<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssociatoController;
use App\Http\Controllers\TipologiaAssociativaController;
use App\Http\Controllers\TesseramentoController;

Route::get('/', [DashboardController::class, 'index']);

Route::get('/associati', [AssociatoController::class, 'index']);
Route::get('/associati/create', [AssociatoController::class, 'create']);
Route::post('/associati', [AssociatoController::class, 'store']);

Route::get('/associati/{id}/edit', [AssociatoController::class, 'edit']);

Route::put('/associati/{id}', [AssociatoController::class, 'update']);

Route::delete('/associati/{id}', [AssociatoController::class, 'destroy']);

Route::get(
    '/tipologie-associative',
    [TipologiaAssociativaController::class, 'index']
);

Route::get(
    '/tipologie-associative/create',
    [TipologiaAssociativaController::class, 'create']
);

Route::post(
    '/tipologie-associative',
    [TipologiaAssociativaController::class, 'store']
);

Route::get(
    '/tipologie-associative/{id}/edit',
    [TipologiaAssociativaController::class, 'edit']
);

Route::put(
    '/tipologie-associative/{id}',
    [TipologiaAssociativaController::class, 'update']
);

Route::delete(
    '/tipologie-associative/{id}',
    [TipologiaAssociativaController::class, 'destroy']
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