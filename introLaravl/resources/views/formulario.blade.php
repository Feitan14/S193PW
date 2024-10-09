@extends('layouts.plantilla')
@section('titulo','formulario')
@section('contenido')

{{-- Inicia Tarjeta con formulario --}}

    <div class="container mt-5 col-md-6">

        <div class="card font-monospace">

            <div class="card-header fs-5 text-center text-primary">
                Registro de Clientes
            </div>

            <div class="card-body text-justify">

                <form class="mb-3">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre: </label>
                        <input type="text" class="form-control" id="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" id="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo: </label>
                        <input type="email" class="form-control" id="correo">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono: </label>
                        <input type="number" class="form-control" id="telefono">
                    </div>
            </div>

            <div class="card-footer text-muted">

            <div class="d-grid gap-2 mt-2 mb-1">
                <button type="submit" class="btn btn-success btn-sm"> Guardar Cliente </button>
            </div>

            </form>
            </div>
        </div>
    </div>

@endsection