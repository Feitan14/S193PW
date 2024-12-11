@extends('layouts.plantilla')
@section('titulo','Inicio de Sesión')
@section('contenido')

@if (session('exito'))
    <script>
        Swal.fire({
            title: '{!! session('exito') !!}',
            icon: 'success'
        });
    </script>
@endif

<x-card-form title="{{__('Iniciar Sesión')}}">
    <form action="{{ route('rutaProcessarLogin') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label">{{__('Correo Electrónico')}}</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}">
            <small class="text-danger fst-italic">{{ $errors->first('correo') }}</small>
        </div>
        <div class="mb-3">
            <label for="contrasena" class="form-label">{{__('Contraseña') }}</label>
            <input type="password" class="form-control" id="contrasena" name="contrasena" value="{{ old('contrasena') }}">
            <small class="text-danger fst-italic">{{ $errors->first('contrasena')}}</small>
        </div>
        <div class="mb-3">
            <a class="" href="{{ route('rutaRecuperacionContrasena') }}">{{__('¿Olvidaste tu contraseña?')}}</a>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">{{__('Iniciar Sesión')}}</button>
        </div>
    </form>
    <div class="mb-3">
        <a href="{{ route('rutaRegistro') }}" class="btn btn-primary w-100">{{__('Registrarse') }}</a>
    </div>
</x-card-form>

@endsection
