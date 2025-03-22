<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;

Route::get('/', [VagaController::class, 'listarTodasVagas'])->name('home');

Route::get('/vagas', [VagaController::class, 'listarTodasVagas'])->name('getVagas');
