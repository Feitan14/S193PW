<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\validadorCliente;
class clienteController extends Controller
{
    /**
     * aqui va la consulta de todo el CRUD
     */
    public function index()
    {
        $consultaclientes=DB::table('clientes')->get();
        return view('cliente',compact('consultaclientes'));
    }

    /**
     * aqui va el insert
     */
    public function create()
    {
        return view('formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validadorCliente $request)
    {
        DB::table('clientes')->insert([
                "nombre" => $request->input('txtnombre'),
                "apellido" => $request->input('txtapellidos'),
                "correo" => $request->input('txtcorreo'),
                "telefono" => $request->input('txttelefono'),
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now(),
            ]
        );
        $usuario=$request->input('txtnombre');
        session()->flash('exito','se guardo el usuario: '.$usuario);
        //return con to route
        return to_route('rutaform');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
