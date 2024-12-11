@extends('layouts.plantilla')
@section('titulo','Perfil de Usuario')
@section('contenido')

<div class="container mt-5">
    <h2 class="mb-4">{{ __('Perfil de Usuario') }}</h2>
    
    <!-- Card de Información Personal -->
    <div class="card mb-4 shadow-sm border-light" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-dark">{{ __('Información Personal') }}</h5>
            <p class="card-text text-dark"><strong>{{ __('Nombre:') }}</strong> {{ $user->name }}</p>
            <p class="card-text text-dark"><strong>{{ __('Correo Electrónico:') }}</strong> {{ $user->email }}</p>
            <p class="card-text text-dark"><strong>{{ __('Fecha de Registro:') }}</strong> {{ $user->created_at->format('d-m-Y') }}</p>
            <p class="card-text text-dark"><strong>{{ __('Preferencias de Idioma:') }}</strong> {{ $user->language_preference }}</p>
            <a href="{{ route('perfil.editar') }}" class="stretched-link"></a>
        </div>
    </div>

    <!-- Card de Configuración de Seguridad -->
    <div class="card mb-4 shadow-sm border-light" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-dark">{{ __('Configuración de Seguridad') }}</h5>
            <p class="card-text text-dark"><strong>{{ __('Contraseña:') }}</strong> ******</p>
            <a href="{{ route('perfil.cambiar-contrasena') }}" class="btn btn-secondary w-100">{{ __('Cambiar Contraseña') }}</a>
        </div>
    </div>

    <!-- Card de Historial de Reservas -->
    <div class="card mb-4 shadow-sm border-light" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-dark">{{ __('Historial de Reservas') }}</h5>
            <p class="card-text text-dark">{{ __('Accede a tus reservas previas.') }}</p>
            <a href="{{ route('reservas.historial') }}" class="btn btn-info w-100">{{ __('Ver Historial') }}</a>
        </div>
    </div>
</div>

@endsection
