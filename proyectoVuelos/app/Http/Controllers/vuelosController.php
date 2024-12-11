<?php

namespace App\Http\Controllers;

use App\Models\Vuelos;
use Illuminate\Http\Request;

class VuelosController extends Controller
{
    public function index()
    {
        $vuelos = Vuelos::all();
        return view('busquedaVuelos', compact('vuelos'));
    }

    public function create()
    {
        return view('registroVuelos');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fechaSalida' => 'required|date',
            'fechaLlegada' => 'required|date|after_or_equal:fechaSalida',
            'horaSalida' => 'required|date_format:H:i',
            'horaLlegada' => 'required|date_format:H:i|after:horaSalida',
        ]);

        Vuelos::create($request->all());

        session()->flash('exito', 'Vuelo registrado con éxito');
        return redirect()->route('vuelos.index');
    }

    public function edit(Vuelos $vuelos)
    {
        return view('editarVuelos', compact('vuelos'));
    }

    public function update(Request $request, Vuelos $vuelos)
    {
        $request->validate([
            'origen' => 'required|string',
            'destino' => 'required|string',
            'fechaSalida' => 'required|date',
            'fechaLlegada' => 'required|date|after_or_equal:fechaSalida',
            'horaSalida' => 'required|date_format:H:i',
            'horaLlegada' => 'required|date_format:H:i|after:horaSalida',
        ]);

        $vuelos->update($request->all());

        session()->flash('exito', 'Vuelo actualizado con éxito');
        return redirect()->route('vuelos.index');
    }

    public function destroy(Vuelos $vuelos)
    {
        $vuelos->delete();
        session()->flash('exito', 'Vuelo eliminado con éxito');
        return redirect()->route('vuelos.index');
    }
}
