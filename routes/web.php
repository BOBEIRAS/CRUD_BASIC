<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LocalidadeController;
use App\Http\Controllers\GrupoController;

Route::get('/', [ContactoController::class, 'index'])->name('home');
Route::resource('contactos', ContactoController::class);
Route::resource('localidades', LocalidadeController::class);
Route::resource('grupos', GrupoController::class);
