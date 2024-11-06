<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorVistas extends Controller
{
    public function home()
    {
        return view('inicio');
    }
}
