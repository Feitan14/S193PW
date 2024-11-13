<?php
use App\Http\Controllers\controladorVistas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});
route::get('/', [controladorVistas::class, 'home'])->name('inicio');
route::get('/panelAdmin', [controladorVistas::class, 'panelAdmin'])->name('panelAdmin');