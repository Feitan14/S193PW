<?php
namespace App\Http\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;


class ControladorVistas extends Controller
{
    public function index()
    {
        $prendas = DB::table('prendas')->get();
        return view('prendas.index', ['prendas' => $prendas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'txtprenda' => 'required|max:255',
            'txtcolor' => 'required|max:255',
            'txtcantidad' => 'required|integer|min:1',
        ]);

        DB::table('prendas')->insert([
            'prenda' => $request->input('txtprenda'),
            'color' => $request->input('txtcolor'),
            'cantidad' => $request->input('txtcantidad'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('prendas.index')->with('exito', 'Prenda registrada con éxito');
    }
    public function edit($id)
    {
        $prenda = DB::table('prendas')->where('id', $id)->first();
        if (!$prenda) {
            abort(404, 'Prenda no encontrada');
        }
        return view('prendas.edit', ['prenda' => $prenda]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'txtprenda' => 'required|max:255',
            'txtcolor' => 'required|max:255',
            'txtcantidad' => 'required|integer|min:1',
        ]);

        DB::table('prendas')
            ->where('id', $id)
            ->update([
                'prenda' => $request->input('txtprenda'),
                'color' => $request->input('txtcolor'),
                'cantidad' => $request->input('txtcantidad'),
                'updated_at' => now(),
            ]);

        return redirect()->route('rutaInicio')->with('exito', 'Prenda actualizada con éxito');
    }

    public function destroy($id)
    {
        DB::table('prendas')->where('id', $id)->delete();
        return redirect()->route('prendas.index')->with('exito', 'Prenda eliminada con éxito');
    }
}
