<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ControladorVistas::class, 'inicio'])->name('rutaInicio');

Route::post('/procesarPrendas',[ControladorVistas::class, 'procesarPrenda'])->name('procesarPrendas');
