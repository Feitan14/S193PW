@extends('layouts.plantillaUsuario')

@section('titulo', 'Mis Reservaciones')

@section('contenido')
    <h1>Mis Reservaciones</h1>

    <h3>Vuelos</h3>
    @if(count($reservaciones_vuelos) > 0)
        <ul>
            @foreach($reservaciones_vuelos as $reserva)
                <li>{{ $reserva->vuelo->origen }} -> {{ $reserva->vuelo->destino }} - Fecha: {{ $reserva->fecha }}</li>
            @endforeach
        </ul>
    @else
        <p>No tienes vuelos reservados.</p>
    @endif

    <h3>Hoteles</h3>
    @if(count($reservaciones_hoteles) > 0)
        <ul>
            @foreach($reservaciones_hoteles as $reserva)
                <li>{{ $reserva->hotel->nombre }} - Fecha de entrada: {{ $reserva->fecha_entrada }}</li>
            @endforeach
        </ul>
    @else
        <p>No tienes hoteles reservados.</p>
    @endif
@endsection