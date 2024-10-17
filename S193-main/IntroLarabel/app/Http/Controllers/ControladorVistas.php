<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function home(){
        return view('inicio');
    }
    
    public function form(){
        return view('form');
    }

    public function consulta(){
        return view('clientes');
    }

    public function procesarCliente( Request $peticion){
        /*return ('si llego l ainformacion');*/
        /*return $peticion->all();*/
        /*return $peticion->path();*/
        /*return $peticion->path();*/
        return $peticion->ip();
    }

    
}
