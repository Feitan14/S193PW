@extends('layouts.plantilla')
@section('contenido')

    {{-- Inicia tarjetaCliente --}}
    <div class="container mt-5 col-md-8">

        <div class="card text-justify font-monospace">

            <div class="card-header fs-5 text-primary"> 
                Andres Morales Cortez 
            </div>

            <div class="card-body">
                <h5 class="fw-bold"> mondragonlot@gmail.com </h5>
                <h5 class="fw-medium"> 4421737519 </h5>
                <p class="card-text fw-lighter"> </p>
            </div>

            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-warning btn-sm"> Actualizar </button>
                <button type="submit" class="btn btn-danger btn-sm"> Eliminar </button>
            </div>
        </div>
        {{-- Finaliza tarjetaCliente --}}

    </div>
    {{-- divcontainer --}}

    @endsection