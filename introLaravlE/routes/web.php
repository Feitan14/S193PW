<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


route::get('/', [ClienteController::class, 'home'])->name('rutaInicio');
route::resource('cliente', ClienteController::class);