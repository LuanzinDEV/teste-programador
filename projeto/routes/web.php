<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;

Route::get('/', [VagaController::class, 'listarTodasVagas'])->name('home');

Route::get('/vaga', [VagaController::class, 'verVaga'])->name('verVaga');

Route::get('/vaga/form', [VagaController::class, 'formVaga'])->name('formVaga');

Route::post('/vaga', [VagaController::class, 'criarVaga'])->name('criarVaga');


