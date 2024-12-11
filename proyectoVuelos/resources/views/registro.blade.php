@extends('layouts.plantilla')
@section('titulo','Registro')
@section('contenido')

@if (session('exito'))
    <script>
        Swal.fire({
            title: '{!! session('exito') !!}',
            icon: 'success'
        });
    </script>
@endif

<x-card-form title="{{__('Registrate')}}">
    <form action="{{ route('usuarios.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">{{__('Nombre')}}</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
            <small class="text-danger fst-italic">{{ $errors->first('nombre') }}</small>
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">{{__('Apellidos')}}</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            <small class="text-danger fst-italic">{{ $errors->first('nombre') }}</small>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">{{__('Telefono')}}</label>
            <input type="number" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
            <small class="text-danger fst-italic">{{ $errors->first('telefono') }}</small>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{__('Correo Electronico')}}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            <small class="text-danger fst-italic">{{ $errors->first('email') }}</small>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{__('Contraseña')}}</label>
            <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
            <small class="text-danger fst-italic">{{ $errors->first('password') }}</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{__('Confirmar Contraseña')}}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            <small class="text-danger fst-italic">{{ $errors->first('password_confirmation') }}</small>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">{{__('Registrarse')}}</button>
        </div>
    </form>
</x-card-form>

@endsection