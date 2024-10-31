<?php
use App\Http\Controllers\LibroController;

Route::get('/', function () {
    return view('principal');
})->name('principal');

Route::get('/libros/create', [LibroController::class, 'create'])->name('libros.create');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
