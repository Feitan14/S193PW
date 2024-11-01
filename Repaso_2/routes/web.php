<?php

use App\Http\Controllers\controladorVistas;
use Illuminate\Support\Facades\Route;

route::view('/component','componentes')->name('rutacomponent');
/* rutas para controlodar */

route::get('/', [controladorVistas::class, 'home'])->name('rutaInicio');
route::get('/form', [controladorVistas::class, 'formulario'])->name('rutaform');
route::get('/consultar', [controladorVistas::class, 'consulta'])->name('rutaCliente');

route::post('/enviarCliente', [controladorVistas::class, 'procesarCliente'])->name('rutaEnviar');
