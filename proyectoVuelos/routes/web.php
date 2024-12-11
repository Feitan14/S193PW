<?php

use App\Http\Controllers\ControladorVistas;
use App\Http\Controllers\ProfileController;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VuelosController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\ReservacionesController;

Route::get('/', [ControladorVistas::class, 'paginaprincipal'])->name('rutaPaginaprincipal');
Route::get('/politicasCancelacion', [ControladorVistas::class, 'politicasCancelacion'])->name('rutaPoliticasCancelacion');
Route::get('/gestionVyHAdmin', [ControladorVistas::class, 'gestionVyHAdmin'])->name('rutaGestionVyHAdmin');
Route::get('/panelAdmin', [ControladorVistas::class, 'panelAdmin'])->name('rutaPanelAdmin');
Route::get('/reportesAdmin', [ControladorVistas::class, 'reportesAdmin'])->name('rutaReportesAdmin');

// Rutas Usuarios
Route::resource('usuarios', UsuarioController::class);
Route::get('/iniciosesion', [UsuarioController::class, 'iniciarSesion'])->name('rutaInicioSesion');

// Rutas Vuelos
Route::resource('vuelos', VuelosController::class);

// Rutas Hoteles
Route::resource('hoteles', HotelesController::class);

// Rutas Reservaciones
Route::get('/reservaciones/vuelos', [ReservacionesController::class, 'vistaReservarVuelos'])->name('rutaReservacionesVuelos');
Route::get('/reservaciones/hoteles', [ReservacionesController::class, 'vistaReservarHoteles'])->name('rutaReservacionesHoteles');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
