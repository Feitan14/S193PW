<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

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

        $libro = Libro::create($validatedData);

        return redirect()->route('libros.create')
            ->with('status', 'success')
            ->with('libro_titulo', $libro->titulo);
    }
}
