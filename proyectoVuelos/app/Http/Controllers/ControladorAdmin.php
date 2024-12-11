<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorAdmin extends Controller
{
    // Panel principal del administrador
    public function panelAdmin()
    {
        return view('panelAdmin');
    }

    // Gestión de vuelos, hoteles y destinos
    public function gestionVyHAdmin()
    {
        return view('gestionVyHAdmin');
    }

    // Gestión de reportes
    public function reportesAdmin()
    {
        return view('reportesAdmin');
    }
}
