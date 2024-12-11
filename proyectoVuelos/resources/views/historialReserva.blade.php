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

<x-card-form title="{{ __('Busca Tu Vuelo') }}">
    <form action="/procesarBusqueda" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Pais" class="form-label">{{ __('País') }}</label>
            <input type="text" class="form-control @error('Pais') is-invalid @enderror" id="Pais" name="Pais" value="{{ old('Pais') }}">
            @error('Pais')
                <small class="text-danger fst-italic">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="Ciudad" class="form-label">{{ __('Ciudad') }}</label>
            <input type="text" class="form-control @error('Ciudad') is-invalid @enderror" id="Ciudad" name="Ciudad" value="{{ old('Ciudad') }}">
            @error('Ciudad')
                <small class="text-danger fst-italic">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="DiaL" class="form-label">{{ __('Día de Partida') }}</label>
            <input type="date" class="form-control @error('DiaL') is-invalid @enderror" id="DiaL" name="DiaL" value="{{ old('DiaL') }}">
            @error('DiaL')
                <small class="text-danger fst-italic">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="HoraP" class="form-label">{{ __('Hora de Partida') }}</label>
            <input type="time" class="form-control @error('HoraP') is-invalid @enderror" id="HoraP" name="HoraP" value="{{ old('HoraP') }}">
            @error('HoraP')
                <small class="text-danger fst-italic">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">{{ __('Buscar Opciones') }}</button>
        </div>
    </form>
</x-card-form>

<!-- Sección de Historial de Reservas -->
<div class="mt-5">
    <h3>{{ __('Historial de Reservas') }}</h3>
    <div class="d-flex flex-wrap">
        <!-- Reemplaza este ejemplo con datos reales del historial del usuario -->
        <x-card-detail 
            detalleUrl="/detalle-reserva/1" 
            imgUrl="ruta/a/imagen-reserva1.jpg" 
            title="Reserva a París" 
            text="Vuelo de ida y vuelta a París"
            date="2024-10-12"
            price="$1200 USD"
        />
        <x-card-detail 
            detalleUrl="/detalle-reserva/2" 
            imgUrl="ruta/a/imagen-reserva2.jpg" 
            title="Hotel en Londres" 
            text="Estancia de 3 noches en el centro de Londres"
            date="2024-09-15"
            price="$300 USD"
        />
        <!-- Agrega más reservas del historial aquí -->
    </div>
</div>

@endsection
