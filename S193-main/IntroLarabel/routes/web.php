<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorVistas;

/*Route::get('/', function () {
    return view('inicio');
})->name('rutaInicio');

Route::get('/form', function () {
    return view('form');
})->name('rutaForm');

Route::get('/consultar', function () {
    return view('clientes');
})->name('rutaClientes');

Route::get('/component', function () {
    return view('componentes');
})->name('rutaComponentes');
*/


/*Route::view('/','inicio'->name('rutaInicio'));
Route::view('/form','form'->name('rutaForm'));
Route::view('/consultar','Clientes'->name('rutaClientes'));*/

Route::get('/',[ControladorVistas::class, 'home'])->name ('rutainicio');

Route::get('/form',[ControladorVistas::class, 'form'])->name ('rutaform');

Route::get('/consulta',[ControladorVistas::class, 'consulta'])->name ('rutaconsulta');


Route::post('/enviarCliente',[ControladorVistas::class, 'procesarCliente']);
