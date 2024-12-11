@extends('layouts.plantilla')
@section('titulo', 'Reservación de Vuelo')
@section('contenido')

@if (session('exito'))
    <script>
        Swal.fire({
            title: '{!! session('exito') !!}',
            icon: 'success'
        });
    </script>
@endif

<div class="container my-5">
    <x-card-form title="{{ __('Reservar Vuelo') }}">
        <form action="{{ route('procesar_reservacion') }}" method="POST" class="p-4">
            @csrf
            <div class="mb-3">
                <label for="nombrePasajero" class="form-label">{{ __('Nombre del Pasajero') }}</label>
                <input type="text" class="form-control" id="nombrePasajero" name="nombrePasajero" placeholder="{{ __('Ej. Juan Pérez') }}">
                <small class="text-danger fst-italic">{{ $errors->first('nombrePasajero') }}</small>
            </div>
            <div class="mb-3">
                <label for="origen" class="form-label">{{ __('Ciudad de Origen') }}</label>
                <input type="text" class="form-control" id="origen" name="origen" placeholder="{{ __('Ej. Ciudad de México') }}">
                <small class="text-danger fst-italic">{{ $errors->first('origen') }}</small>
            </div>
            <div class="mb-3">
                <label for="destino" class="form-label">{{ __('Ciudad de Destino') }}</label>
                <input type="text" class="form-control" id="destino" name="destino" placeholder="{{ __('Ej. Nueva York') }}">
                <small class="text-danger fst-italic">{{ $errors->first('destino') }}</small>
            </div>
            <div class="mb-3">
                <label for="fechaSalida" class="form-label">{{ __('Fecha de Salida') }}</label>
                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida">
                <small class="text-danger fst-italic">{{ $errors->first('fechaSalida') }}</small>
            </div>
            <div class="mb-3">
                <label for="fechaRegreso" class="form-label">{{ __('Fecha de Regreso (opcional)') }}</label>
                <input type="date" class="form-control" id="fechaRegreso" name="fechaRegreso">
                <small class="text-danger fst-italic">{{ $errors->first('fechaRegreso') }}</small>
            </div>
            <div class="mb-3">
                <label for="numeroAdultos" class="form-label">{{ __('Número de Adultos') }}</label>
                <input type="number" class="form-control" id="numeroAdultos" name="numeroAdultos" min="1" value="1">
                <small class="text-danger fst-italic">{{ $errors->first('numeroAdultos') }}</small>
            </div>
            <div class="mb-3">
                <label for="numeroNinos" class="form-label">{{ __('Número de Niños (opcional)') }}</label>
                <input type="number" class="form-control" id="numeroNinos" name="numeroNinos" min="0" value="0">
                <small class="text-danger fst-italic">{{ $errors->first('numeroNinos') }}</small>
            </div>
            <button type="submit" class="btn btn-primary w-100">{{ __('Reservar Vuelo') }}</button>
        </form>
    </x-card-form>
</div>

@endsection
