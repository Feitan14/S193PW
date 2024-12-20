<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorCliente;

class controladorVistas extends Controller
{
    public function home()
    {
        return view('inicio');
    }
    
    public function consulta()
    {
        
    }
    public function procesarCliente(validadorCliente $peticion)
    {
        $validacion= $peticion->validate([
            'txtnombre'  => 'required|min:4|max:20',
            'txtapellidos' => 'required',
            'txtcorreo'    => 'required',
            'txttelefono'   => 'required|numeric',
        ]);


       //respuesta de redireccion
       // usando la ruta
       // return redirect('/');
       // respuesta con redirect usando en nombre de la ruta
      // return redirect()->route('rutaCliente');
      //se utiliza la siguiente linea para mandar al origen de la peticion
      // return back();
      // arreglos
      // redireccion de variable
/*    $id= [['usuario'=>1],['usuario'=>2]];
    return view('formulario', compact('id')); */
    // redireccion de variable por session
    $usuario= $peticion->input('txtnombre');

    }
}
