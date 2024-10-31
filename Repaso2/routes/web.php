<?php

use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('principal');
})->name('principal');

Route::prefix('libros')->group(function () {
    Route::get('/create', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/', [LibroController::class, 'store'])->name('libros.store');
});