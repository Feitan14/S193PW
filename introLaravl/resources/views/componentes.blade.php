@extends('Layouts.plantilla')

@section('titulo','componentes Blade')

@section('contenido')

<x-Card encabezado="componente" titulo="Dinamico" textoBoton="Guardar"> 
    Soy el contenido del primero
</x-Card>
<x-Card encabezado="componente2" titulo="Dinamico2" textoBoton="No Guardar"> 
    soy el contenido del segundo
</x-Card>

<x-Alert tipo="danger"> </x-Alert>
<x-Alert tipo="warning"> </x-Alert>

@endsection