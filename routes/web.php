<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociatoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/associati', [AssociatoController::class, 'index']);
Route::get('/associati/create', [AssociatoController::class, 'create']);
Route::post('/associati', [AssociatoController::class, 'store']);