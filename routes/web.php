<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/', [ContactoController::class, 'index'])->name('home');
Route::resource('contactos', ContactoController::class);
