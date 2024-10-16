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
       /* return 'si llego la info del cliente :)'; 
        return $peticion->all();*/

        //peticion de url del cliente
        //return $peticion->url();
        
        //peticion ip del url de origen
        return $peticion->ip();
    }
}
