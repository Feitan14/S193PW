<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorVistas extends Controller
{
    public function home()
    {
        return view('inicio');
    }
    
    public function formulario()
    {
        return view('formulario');
    }
    
    public function consulta()
    {
        return view('cliente');
    }
    public function procesarCliente(request $peticion)
    {
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
    session()->flash('exito','se guardo el usuario: '.$usuario);
    //return con to route
    return to_route('rutaform');
    }
}
