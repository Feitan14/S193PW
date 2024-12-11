@extends('layouts.plantilla')
@section('titulo', 'Reservacion de Hotel')
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

        <h1 class="mb-4">Búsqueda de Hoteles</h1>
    
        <form id="busqueda-hoteles-form" class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="destino" class="form-label">Destino</label>
                <input type="text" name="destino" class="form-control" placeholder="Ciudad de destino">
            </div>
            <div class="col-md-6">
                <label for="fechas" class="form-label">Fechas</label>
                <input type="text" name="fechas" class="form-control" placeholder="Ejemplo: 2024-12-01 to 2024-12-07">
            </div>
            <div class="col-md-4">
                <label for="no_huespedes" class="form-label">Número de huéspedes</label>
                <input type="number" name="no_huespedes" class="form-control" placeholder="Número de huéspedes">
            </div>
            <div class="col-md-4">
                <label for="precio_min" class="form-label">Precio mínimo por noche</label>
                <input type="number" name="precio_min" class="form-control" placeholder="Precio mínimo">
            </div>
            <div class="col-md-4">
                <label for="precio_max" class="form-label">Precio máximo por noche</label>
                <input type="number" name="precio_max" class="form-control" placeholder="Precio máximo">
            </div>
            <div class="col-md-12">
                <label for="no_estrellas" class="form-label">Estrellas del hotel</label>
                <select name="no_estrellas" class="form-select">
                    <option value="">Cualquier categoría</option>
                    <option value="5">5 estrellas</option>
                    <option value="4">4 estrellas</option>
                    <option value="3">3 estrellas</option>
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary w-100">Buscar hoteles</button>
            </div>
        </form>
        
        <h2>Resultados</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre del hotel</th>
                    <th>Destino</th>
                    <th>Estrellas</th>
                    <th>Calificación</th>
                    <th>Precio por noche</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody id="resultados-hoteles">
                <tr>
                    <td colspan="6" class="text-center">No hay resultados aún.</td>
                </tr>
            </tbody>
        </table>
    
    </div>



@endsection