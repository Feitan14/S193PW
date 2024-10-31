<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book; // Asegúrate de tener el modelo Book para guardar los datos
use Alert; // Para usar Alertify si tienes una librería configurada

class BookController extends Controller
{
    // Método para mostrar la vista principal
    public function index()
    {
        // Puedes pasar datos a la vista principal si deseas
        return view('principal');
    }

    // Método para mostrar el formulario de registro de libro
    public function create()
    {
        return view('registro');
    }

    // Método para almacenar un nuevo libro en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $this->validateData($request);

        // Crear el nuevo libro
        $book = new Book;
        $book->isbn = $validatedData['isbn'];
        $book->title = $validatedData['title'];
        $book->author = $validatedData['author'];
        $book->pages = $validatedData['pages'];
        $book->year = $validatedData['year'];
        $book->publisher = $validatedData['publisher'];
        $book->publisher_email = $validatedData['publisher_email'];
        $book->save();

        // Mensaje de éxito con Alertify (dependiendo de tu integración)
        alertify()->success("Todo correcto: Libro “{$book->title}” guardado");

        return redirect()->route('books.index');
    }

    // Método para validar los datos de entrada
    private function validateData(Request $request)
    {
        return $request->validate([
            'isbn' => 'required|numeric|digits:13',
            'title' => 'required|string|max:150',
            'author' => 'required|string|max:100',
            'pages' => 'required|integer|min:1',
            'year' => 'required|integer|between:1000,' . date('Y'),
            'publisher' => 'required|string|max:100',
            'publisher_email' => 'required|email',
        ], [
            'isbn.required' => 'El ISBN es obligatorio.',
            'isbn.numeric' => 'El ISBN debe ser numérico.',
            'isbn.digits' => 'El ISBN debe tener 13 dígitos.',
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no debe exceder los 150 caracteres.',
            'author.required' => 'El autor es obligatorio.',
            'pages.required' => 'El número de páginas es obligatorio.',
            'pages.integer' => 'El número de páginas debe ser un entero.',
            'year.required' => 'El año es obligatorio.',
            'year.between' => 'El año debe estar entre 1000 y el año actual.',
            'publisher.required' => 'La editorial es obligatoria.',
            'publisher_email.required' => 'El correo de la editorial es obligatorio.',
            'publisher_email.email' => 'El correo de la editorial debe ser un correo válido.',
        ]);
    }
}
