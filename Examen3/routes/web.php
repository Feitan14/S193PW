<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;
use app\Http\Controllers\Controller;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ControladorVistas::class, 'prendas.index'])->name('prendas.index');
Route::get('/', [ControladorVistas::class, ''])->name('');

Route::post('/procesarPrendas',[ControladorVistas::class, 'procesarPrenda'])->name('procesarPrendas');

