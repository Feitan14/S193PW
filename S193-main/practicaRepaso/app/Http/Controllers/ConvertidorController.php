<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertidorController extends Controller
{
    public function convertir(Request $request)
    {
        // Recibe los valores de la petición
        $cantidad = $request->input('cantidad');
        $unidad = $request->input('unidad');
        $convertirA = $request->input('convertirA');

        // Inicializar variable para el resultado
        $resultado = 0;

        // Lógica de conversión
        switch ($unidad) {
            case 'MB':
                if ($convertirA === 'GB') {
                    $resultado = $cantidad / 1024;
                }
                break;
            case 'GB':
                if ($convertirA === 'MB') {
                    $resultado = $cantidad * 1024;
                } elseif ($convertirA === 'TB') {
                    $resultado = $cantidad / 1024;
                }
                break;
            case 'TB':
                if ($convertirA === 'GB') {
                    $resultado = $cantidad * 1024;
                }
                break;
            default:
                return redirect()->back()->with('error', 'Unidad no válida');
        }

        // Construir el mensaje del resultado
        $mensaje = "La cantidad de $cantidad $unidad equivale a $resultado $convertirA.";

        // Retornar la vista con el resultado
        return view('Repaso', ['resultado' => $mensaje]);
    }
}
