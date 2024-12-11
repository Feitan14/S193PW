<?php

namespace App\Http\Controllers;

use App\Models\Hoteles;
use Illuminate\Http\Request;

class HotelesController extends Controller
{
    public function index()
    {
        $hoteles = Hoteles::all();
        return view('busquedaHoteles', compact('hoteles'));
    }

    public function create()
    {
        return view('registroHoteles');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estrellas' => 'required|integer|min:1|max:5',
            'descripcion' => 'required|string',
            'precio_por_noche' => 'required|numeric|min:0',
            'disponibilidad' => 'required|integer|min:0',
        ]);

        Hoteles::create($request->all());

        session()->flash('exito', 'Hotel registrado con éxito');
        return redirect()->route('hoteles.index');
    }

    public function edit(Hoteles $hotel)
    {
        return view('editarHoteles', compact('hotel'));
    }

    public function update(Request $request, Hoteles $hotel)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estrellas' => 'required|integer|min:1|max:5',
            'descripcion' => 'required|string',
            'precio_por_noche' => 'required|numeric|min:0',
            'disponibilidad' => 'required|integer|min:0',
        ]);

        $hotel->update($request->all());

        session()->flash('exito', 'Hotel actualizado con éxito');
        return redirect()->route('hoteles.index');
    }

    public function destroy(Hoteles $hotel)
    {
        $hotel->delete();
        session()->flash('exito', 'Hotel eliminado con éxito');
        return redirect()->route('hoteles.index');
    }
}
