<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVistas extends Controller
{

    public function inicio()
    {
        return view('inicio');
    }

    public function procesarPrenda(request $request)
    {
        $validacion = $request->validate([
            'txtprenda' => 'required|string',
            'txtcolor' => 'required|string',
            'txtcantidad' => 'required|numeric'
        ]);

        $prenda = $request->input('txtprenda');

        session()->flash('exito', 'Se guardo: ' . $prenda . '');

        return to_route('rutaInicio');

    }

}
