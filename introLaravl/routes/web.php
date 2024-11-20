<?php

use App\Http\Controllers\clienteController;
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






/* rutas para ccontrolador clienteController */
route::get('/cliente/create', [clienteController::class, 'create'])->name('rutaform');

route::post('/cliente', [clienteController::class, 'store'])->name('rutaEnviar');

route::get('/cliente', [clienteController::class, 'index'])->name('rutaCliente');

/* Apartir de aqui son los metodos de eliminar y editar*/

route::get('/cliente/edit', [clienteController::class, 'edit'])->name('rutaEdit');

route::get('/cliente/actualizar', [clienteController::class, 'update'])->name('rutaUpdate');

route::get('/cliente/destroy', [clienteController::class, 'destroy'])->name('rutaDestroy');