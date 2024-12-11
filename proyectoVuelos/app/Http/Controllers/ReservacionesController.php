<?php

namespace App\Http\Controllers;

use App\Models\Hoteles;
use App\Models\Vuelos;
use App\Models\Reservaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservacionesController extends Controller
{
    // Paso 1: Mostrar la vista de reservación de hoteles
    public function vistaReservarHoteles(Request $request)
    {
        $hoteles = Hoteles::all(); // Aquí podrías aplicar filtros según disponibilidad
        return view('reservaciones.Hoteles', compact('hoteles'));
    }

    // Paso 2: Mostrar la vista de reservación de vuelos
    public function vistaReservarVuelos()
    {
        $vuelos = Vuelos::all(); // Aquí también puedes aplicar filtros
        return view('reservaciones.Vuelos', compact('vuelos'));
    }

    // Paso 3: Ver el carrito de compras
    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('reservaciones.carrito', compact('carrito'));
    }

    // Agregar un hotel al carrito
    public function agregarHotelACarrito(Request $request)
    {
        $hotel = Hoteles::findOrFail($request->input('hotel_id'));

        $carrito = session()->get('carrito', []);
        $carrito[] = [
            'tipo' => 'hotel',
            'id' => $hotel->id,
            'nombre' => $hotel->nombre,
            'precio' => $hotel->precio_por_noche,
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('reservaciones.vuelos')
            ->with('exito', 'Hotel agregado al carrito. Ahora selecciona un vuelo.');
    }

    // Agregar un vuelo al carrito
    public function agregarVueloACarrito(Request $request)
    {
        $vuelo = Vuelos::findOrFail($request->input('vuelo_id'));

        $carrito = session()->get('carrito', []);
        $carrito[] = [
            'tipo' => 'vuelo',
            'id' => $vuelo->id,
            'nombre' => $vuelo->numero_vuelo,
            'precio' => $vuelo->precio,
        ];

        session()->put('carrito', $carrito);

        return redirect()->route('reservaciones.carrito')
            ->with('exito', 'Vuelo agregado al carrito. Revisa tu carrito para confirmar la reservación.');
    }

    // Confirmar la reservación
    public function confirmarReservacion(Request $request)
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('reservaciones.hoteles')
                ->with('error', 'Tu carrito está vacío. Por favor, selecciona un hotel y un vuelo.');
        }

        $total = collect($carrito)->sum('precio');

        $reservacion = Reservaciones::create([
            'user_id' => Auth::id(),
            'total' => $total,
        ]);

        foreach ($carrito as $item) {
            if ($item['tipo'] === 'hotel') {
                $reservacion->hoteles()->attach($item['id']);
            } elseif ($item['tipo'] === 'vuelo') {
                $reservacion->vuelos()->attach($item['id']);
            }
        }

        session()->forget('carrito');

        return redirect()->route('usuarios.reservaciones')
            ->with('exito', 'Reservación confirmada con éxito.');
    }
}