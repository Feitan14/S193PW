<?php

use App\Http\Controllers\controladorVistas;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('inicio');
})->name('rutaInicio');

Route::get('/form', function () {
    return view('formulario');
})->name('rutaform');

Route::get('/consultar', function () {
    return view(view: 'cliente');
})->name('rutaCliente'); 

route::view('/','inicio')->name('rutaInicio');
route::view('/form','formulario')->name('rutaform');
route::view('/consultar','cliente')->name('rutaCliente');
*/
route::view('/component','componentes')->name('rutacomponent');
/* rutas para controlodar */

route::get('/', [controladorVistas::class, 'home'])->name('rutaInicio');
route::get('/form', [controladorVistas::class, 'formulario'])->name('rutaform');
route::get('/consultar', [controladorVistas::class, 'consulta'])->name('rutaCliente');

route::post('/enviarCliente', [controladorVistas::class, 'procesarCliente'])->name('rutaEnviar');
