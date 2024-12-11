@extends('layouts.plantilla')
@section('titulo', 'Vuelos Disponibles')
@section('contenido')

@php
    // Datos simulados de vuelos
    $vuelos = [
        [
            'origen' => 'Ciudad de México',
            'destino' => 'Nueva York',
            'fecha_salida' => '2023-10-15',
            'precio' => 300,
            'id' => 1
        ],
        [
            'origen' => 'Los Ángeles',
            'destino' => 'Londres',
            'fecha_salida' => '2023-10-20',
            'precio' => 450,
            'id' => 2
        ],
        [
            'origen' => 'Madrid',
            'destino' => 'Buenos Aires',
            'fecha_salida' => '2023-10-25',
            'precio' => 600,
            'id' => 3
        ],
    ];
@endphp

<div class="container">
    <h2 class="text-center my-4">Vuelos Disponibles</h2>
    <div class="row">
        @foreach($vuelos as $vuelo)
            <div class="col-md-4 mb-4">
                <x-card 
                    title="{{ $vuelo['origen'] . ' a ' . $vuelo['destino'] }}" 
                    text="Salida: {{ $vuelo['fecha_salida'] }}" 
                    date="{{ $vuelo['fecha_salida'] }}" 
                    price="${{ $vuelo['precio'] }}" 
                />
            </div>
        @endforeach
    </div>
</div>

@endsection