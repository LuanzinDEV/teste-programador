<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VagaController;

//read Vagas
Route::get('/', [VagaController::class, 'listarTodasVagas'])->name('home');
Route::get('/vaga', [VagaController::class, 'verVaga'])->name('verVaga');

//create Vagas
Route::get('/vaga/form', [VagaController::class, 'formVaga'])->name('formVaga');
Route::post('/vaga', [VagaController::class, 'criarVaga'])->name('criarVaga');

//update Vagas
Route::get('/vaga/atualizar/form', [VagaController::class, 'formAtulizaVaga'])->name('formAtulizaVaga');
Route::post('/vaga/atualizar', [VagaController::class, 'atualizaVaga'])->name('atualizaVaga');
Route::patch('/vagas/{id}/pausar', [VagaController::class, 'pausarVaga'])->name('pausarVaga');
Route::patch('/vagas/{id}/despausar', [VagaController::class, 'despausarVaga'])->name('despausarVaga');

//delete vagas
Route::delete('/vaga/delete/{id}', [VagaController::class, 'deletarVaga'])->name('deletarVaga');
