<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('inicio');
})->name('rutaInicio');

Route::get('/form', function () {
    return view('formulario');
})->name('rutaform');

Route::get('/consultar', function () {
    return view(view: 'cliente');
})->name('rutaCliente'); */

route::view('/','inicio')->name('rutaInicio');
route::view('/form','formulario')->name('rutaform');
route::view('/consultar','cliente')->name('rutaCliente');
route::view('/component','componentes')->name('rutacomponent');