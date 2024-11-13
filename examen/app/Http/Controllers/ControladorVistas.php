<?php

namespace App\Http\Controllers;
use App\Http\Requests\validadorRopa;
use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function home()
    {
        return view('inicio');
    }
    public function procesarCliente(validadorRopa $peticion)
    {
        // Validación de los campos del formulario
        $validacion = $peticion->validate([
            'Prenda'        => 'required|min:1|max:150', // Campo Prenda
            'Color'        => 'required|min:1|max:150', // Campo Color
            'num'       => 'required|numeric|min:1', // Campo cantidad
        ]);

        // Procesar la información si la validación es exitosa
        $usuario = $peticion->input('titulo'); // Cambia esto según el dato que quieras mostrar en la alerta
        session()->flash('exito', 'Se guardó la prenda: ' . $usuario);

        // Redireccionar a la ruta del formulario
        return to_route('inicio');
    }
}
