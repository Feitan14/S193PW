<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorPrendas;
use App\Models\prendas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrendasController extends Controller
{

    public function home(){
        return view('inicio');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prendas = DB::table('prendas')->get();
        return view('prendas', compact('prendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formPrendas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validadorPrendas $request)
    {

        DB::table('prendas')->insert([
            "prenda" => $request->input('txtprenda'),
            "color" => $request->input('txtcolor'),
            "cantidad" => $request->input('txtcantidad'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $prenda = $request->input('txtprenda');
        session()->flash('exito', 'Se guardo la prenda: '.$prenda);
        return redirect('/prendas');

    }

    /**
     * Display the specified resource.
     */
    public function show(prendas $prendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prenda = DB::table('prendas')->where('id', $id)->first();

        if (!$prenda) {
            return redirect()->back()->withErrors('Prenda no encontrada');
        }
        return view('editarPrendas', compact('prenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validadorPrendas $request, $id)
    {
        $actualizar = DB::table('prendas')
            ->where('id', $id)
            ->update([
                "prenda" => $request->input('txtprenda'),
                "color" => $request->input('txtcolor'),
                "cantidad" => $request->input('txtcantidad'),
                "updated_at" => Carbon::now()
            ]);

        return to_route('rutaPrendas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $delete = DB::table('prendas')->where('id', $id)->delete();

        session()->flash('exito', 'Se elimino la prenda');
        return to_route('rutaPrendas');
    }
}
