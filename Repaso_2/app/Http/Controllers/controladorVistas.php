<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validadorCliente;

class controladorVistas extends Controller
{
    public function home()
    {
        return view('inicio');
    }
    
    public function formulario()
    {
        return view('formulario');
    }
    
    public function consulta()
    {
        return view('cliente');
    }

    public function procesarCliente(validadorCliente $peticion)
    {
        // Validación de los campos del formulario
        $validacion = $peticion->validate([
            'isbn'          => 'required|digits:13', // Campo ISBN
            'titulo'        => 'required|min:1|max:150', // Campo Título
            'paginas'       => 'required|numeric|min:1', // Campo Páginas
            'anio'          => 'required|numeric|between:1000,' . date('Y'), // Campo Año
            'emailEditorial' => 'required|email', // Campo Email de Editorial
        ]);

        // Procesar la información si la validación es exitosa
        $usuario = $peticion->input('titulo'); // Cambia esto según el dato que quieras mostrar en la alerta
        session()->flash('exito', 'Se guardó el usuario: ' . $usuario);

        // Redireccionar a la ruta del formulario
        return to_route('rutaform');
    }
}
