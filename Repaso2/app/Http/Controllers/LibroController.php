<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Alert;

class LibroController extends Controller
{
    public function create()
    {
        return view('registro_libro');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isbn' => 'required|numeric|digits:13',
            'titulo' => 'required|string|max:150',
            'autor' => 'required|string',
            'paginas' => 'required|integer|min:1',
            'anio' => 'required|integer|between:1000,' . date('Y'),
            'editorial' => 'required|string',
            'email' => 'required|email',
        ]);

        Libro::create($validatedData);

        alertify()->success("Todo correcto: Libro \"{$request->titulo}\" guardado");
        return redirect()->route('libros.create');
    }
}
