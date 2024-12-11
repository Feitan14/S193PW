@extends('layouts.app')

@section('titulo', 'Carrito de Reservas')

@section('contenido')
    <h1>Tu Carrito</h1>

    @if(count($carrito) > 0)
        <ul>
            @foreach($carrito as $item)
                <li>{{ $item['nombre'] }} ({{ $item['tipo'] }})</li>
            @endforeach
        </ul>
        <a href="{{ route('pago') }}" class="btn btn-primary">Proceder al pago</a>
    @else
        <p>No tienes elementos en tu carrito.</p>
    @endif
@endsection