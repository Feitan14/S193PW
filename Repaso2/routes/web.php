<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('principal');
Route::get('/registro', [BookController::class, 'registro'])->name('registro');
Route::post('/books', [BookController::class, 'store'])->name('books.store');


/*
Route::get('/',[LibroController::class,'principal'])->name('principal');

Route::get('/registro',[LibroController::class,'registro'])->name('registro');

Route::post('/enviarLibro',[LibroController::class,'procesarLibro']); */