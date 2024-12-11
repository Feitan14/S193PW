<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

// ruta de inicio
Route::get('/', function () {
    return view('principal');
});
// ruta de formulario
//Route::get('/formulario', [Controller::class, 'formulario']);
// ruta de formulario
//Route::post('/formulario', [Controller::class, 'guardar']);
// ruta de formulario
Route::get('/formulario', function () {
    return view('formulario');
    });

    //ruta listado contacto
    Route::get('/listadoContacto', function () {
        return view('listadoContacto');
        });