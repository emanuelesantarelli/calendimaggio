<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociatoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/associati', [AssociatoController::class, 'index']);
Route::get('/associati/create', [AssociatoController::class, 'create']);
Route::post('/associati', [AssociatoController::class, 'store']);
Route::get('/associati/{id}/edit', [AssociatoController::class, 'edit']);
Route::put('/associati/{id}', [AssociatoController::class, 'update']);
Route::delete('/associati/{id}', [AssociatoController::class, 'destroy']);