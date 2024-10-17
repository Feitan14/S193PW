@extends('layouts.plantilla')
@section('titulo','componentes Blade')
@section('contenido')


    <x-card encabezado="Encabezado" titulo="titulo" textoBoton="textoboton"></x-card>

    <x-alert tipo="warning"></x-alert>

@endsection