<?php

namespace App\Http\Controllers;

use App\Http\Requests\validadorRegistrar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class UsuarioController extends Controller
{
    // Vista de inicio de sesión
    public function iniciarSesion()
    {
        return view('iniciosesion');
    }

    // Manejar el inicio de sesión
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('perfil.usuario')->with('exito', 'Inicio de sesión exitoso');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput($request->only('email'));
    }

    // Manejar el cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('exito', 'Cierre de sesión exitoso');
    }

    // Listar usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('busquedaUsuarios', compact('usuarios'));
    }

    // Vista para crear un usuario
    public function create()
    {
        return view('registro');
    }

    // Almacenar un nuevo usuario
    public function store(validadorRegistrar $request)
    {
        $user = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user)); // Esto dispara el evento de verificación de correo

        session()->flash('exito', 'Usuario registrado con éxito. Por favor verifica tu correo electrónico.');
        return redirect()->route('rutaInicioSesion');
    }

    // Editar un usuario
    public function edit(User $usuario)
    {
        return view('editarUsuario', compact('usuario'));
    }

    // Actualizar un usuario
    public function update(validadorRegistrar $request, User $usuario)
    {
        $usuario->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $usuario->password,
        ]);

        session()->flash('exito', 'Usuario actualizado con éxito');
        return redirect()->route('usuarios.index');
    }

    // Eliminar un usuario
    public function destroy(User $usuario)
    {
        $usuario->delete();
        session()->flash('exito', 'Usuario eliminado con éxito');
        return redirect()->route('usuarios.index');
    }

    //FUNCIONES DE RESTABLECIMIENTO DE CONTRASEÑA

    // Mostrar el formulario para solicitar el restablecimiento de contraseña
    public function showLinkRequestForm()
    {
        return view('auth.recuperacionContrasena');
    }

    // Enviar el enlace de restablecimiento de contraseña
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Enviar el enlace de restablecimiento de contraseña
        $response = Password::sendResetLink($request->only('email'));

        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'Te hemos enviado un enlace para restablecer tu contraseña');
        } else {
            return back()->withErrors(['email' => 'No podemos encontrar un usuario con ese correo electrónico.']);
        }
    }

    // Mostrar el formulario para restablecer la contraseña
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Restablecer la contraseña
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ]);

        // Procesar el restablecimiento de la contraseña
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('exito', 'Tu contraseña ha sido restablecida.');
        }

        return back()->withErrors(['email' => 'El token de restablecimiento no es válido.']);
    }
}
