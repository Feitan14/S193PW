<?php

namespace App\Http\Controllers;

use App\Models\reservacionesVuelos;
use Illuminate\Http\Request;
use App\Models\vuelos;
use App\Http\Requests\validadorReservacionVuelo;

class ReservacionesVuelosController extends Controller
{
    public function reservarVuelo()
    {
        return view('reservacionesVuelos');
    }

    public function index()
    {
        $reservaciones = reservacionesVuelos::with('vuelo')->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    public function create($vueloId)
    {
        $vuelo = vuelos::findOrFail($vueloId);
        return view('reservaciones.create', compact('vuelo'));
    }

    public function store(validadorReservacionVuelo $request)
    {
        // Buscar vuelo (opcional, dependiendo de si reservas vuelos existentes)
        $vuelo = vuelos::where('origen', $request->origen)
            ->where('destino', $request->destino)
            ->where('fechaSalida', $request->fechaSalida)
            ->first();

        if (!$vuelo) {
            return back()->withErrors(['error' => 'No se encontró un vuelo con los datos proporcionados.'])->withInput();
        }

        // Procesar la reservación
        reservacionesVuelos::create([
            'vuelo_id' => $vuelo->id,
            'nombre_pasajero' => $request->nombrePasajero,
            'email_pasajero' => $request->email_pasajero ?? 'sin_correo@example.com',
            'asiento' => rand(1, 100), // Generar un asiento aleatorio o implementar lógica real
        ]);

        return redirect()->back()->with('exito', 'Reservación realizada con éxito para el vuelo de ' . $request->origen . ' a ' . $request->destino . '.');
    }
    public function procesarReservacionVuelo(validadorVuelos $requestRV)
    {
        $validacion5 = $requestRV->validated();
        session()->flash('exito', 'Reservación exitosa');
        return to_route('rutaReservacionesVuelos');
    }
}
