<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorRegistrar;
use App\Http\Requests\validadorLogin;
use App\Http\Requests\validadorRecuperacion;
use App\Http\Requests\validadorHoteles;
use App\Http\Requests\validadorVuelos;
use App\Models\Vuelos;
use App\Models\hoteles;

class ControladorVistas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('');
    }

    //
    public function paginaprincipal()
    {
        return view('paginaprincipal');
    }

    public function politicasCancelacion()
    {
        return view('politicasCancelacion');
    }

    public function gestionVyHAdmin()
    {
        $vuelos = Vuelos::all();
        $hoteles = Hoteles::all();
        return view('gestionVyHAdmin', compact('vuelos', 'hoteles'));
    }

    public function panelAdmin()
    {
        return view('panelAdmin');  // Vista del panel de administración
    }

    public function reportesAdmin()
    {
        return view('reportesAdmin');// Vista de los reportes de administración
    }
    

// ------------------------------

        // Crear un nuevo vuelo
        public function createVuelo(Request $request)
        {
            $request->validate([
                'origen' => 'required|string',
                'destino' => 'required|string',
                'tarifa' => 'required|numeric',
                'condiciones' => 'required|string',
                'servicios' => 'required|string',
            ]);
    
            $vuelo = new Vuelos();
            $vuelo->origen = $request->origen;
            $vuelo->destino = $request->destino;
            $vuelo->tarifa = $request->tarifa;
            $vuelo->condiciones = $request->condiciones;
            $vuelo->servicios = $request->servicios;
            $vuelo->save();
    
            return response()->json(['message' => 'Vuelo creado con éxito', 'vuelo' => $vuelo]);
        }
    
        // Editar un vuelo existente
        public function editVuelo(Request $request, $id)
        {
            $request->validate([
                'origen' => 'required|string',
                'destino' => 'required|string',
                'tarifa' => 'required|numeric',
                'condiciones' => 'required|string',
                'servicios' => 'required|string',
            ]);
    
            $vuelo = Vuelos::findOrFail($id);
            $vuelo->origen = $request->origen;
            $vuelo->destino = $request->destino;
            $vuelo->tarifa = $request->tarifa;
            $vuelo->condiciones = $request->condiciones;
            $vuelo->servicios = $request->servicios;
            $vuelo->save();
    
            return response()->json(['message' => 'Vuelo actualizado con éxito', 'vuelo' => $vuelo]);
        }
    
        // Eliminar un vuelo
        public function deleteVuelo($id)
        {
            $vuelo = Vuelos::findOrFail($id);
            $vuelo->delete();
    
            return response()->json(['message' => 'Vuelo eliminado con éxito']);
        }
    
        public function Hotel(Request $request){

            return view('reservacionesHoteles');

        }
        // Crear un nuevo hotel
        public function createHotel(Request $request)
        {
            $request->validate([
                'nombre' => 'required|string',
                'tarifa' => 'required|numeric',
                'condiciones' => 'required|string',
                'servicios' => 'required|string',
            ]);
    
            $hotel = new Hoteles();
            $hotel->nombre = $request->nombre;
            $hotel->tarifa = $request->tarifa;
            $hotel->condiciones = $request->condiciones;
            $hotel->servicios = $request->servicios;
            $hotel->save();
    
            return response()->json(['message' => 'Hotel creado con éxito', 'hotel' => $hotel]);
        }
    
        // Editar un hotel existente
        public function editHotel(Request $request, $id)
        {
            $request->validate([
                'nombre' => 'required|string',
                'tarifa' => 'required|numeric',
                'condiciones' => 'required|string',
                'servicios' => 'required|string',
            ]);
    
            $hotel = Hoteles::findOrFail($id);
            $hotel->nombre = $request->nombre;
            $hotel->tarifa = $request->tarifa;
            $hotel->condiciones = $request->condiciones;
            $hotel->servicios = $request->servicios;
            $hotel->save();
    
            return response()->json(['message' => 'Hotel actualizado con éxito', 'hotel' => $hotel]);
        }
    
        // Eliminar un hotel
        public function deleteHotel($id)
        {
            $hotel = Hoteles::findOrFail($id);
            $hotel->delete();
    
            return response()->json(['message' => 'Hotel eliminado con éxito']);
        }
    
}
