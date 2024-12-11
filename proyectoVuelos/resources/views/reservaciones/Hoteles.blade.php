@extends('layouts.plantilla')
@section('titulo', 'Reservación de Hotel')
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

<div class="container my-5">
    <x-card-form title="{{ __('Reservar Hotel') }}">
        <form action="/procesarReservacionHotel" method="POST" class="p-4">
            @csrf
            <div class="mb-3">
                <label for="nombreHuesped" class="form-label">{{ __('Nombre del Huésped') }}</label>
                <input type="text" class="form-control" id="nombreHuesped" name="nombreHuesped" placeholder="{{ __('Ej. Juan Pérez') }}">
                <small class="text-danger fst-italic">{{ $errors->first('nombreHuesped') }}</small>
            </div>
            <div class="mb-3">
                <label for="fechaEntrada" class="form-label">{{ __('Fecha de Entrada') }}</label>
                <input type="date" class="form-control" id="fechaEntrada" name="fechaEntrada">
                <small class="text-danger fst-italic">{{ $errors->first('fechaEntrada') }}</small>
            </div>
            <div class="mb-3">
                <label for="fechaSalida" class="form-label">{{ __('Fecha de Salida') }}</label>
                <input type="date" class="form-control" id="fechaSalida" name="fechaSalida">
                <small class="text-danger fst-italic">{{ $errors->first('fechaSalida') }}</small>
            </div>
            <div class="mb-3">
                <label for="ubicacionHotel" class="form-label">{{ __('Ubicación del Hotel') }}</label>
                <input type="text" class="form-control" id="ubicacionHotel" name="ubicacionHotel" placeholder="{{ __('Ej. Playa del Carmen') }}">
                <small class="text-danger fst-italic">{{ $errors->first('ubicacionHotel') }}</small>
            </div>
            <div class="mb-3">
                <label for="cantidadHabitaciones" class="form-label">{{ __('Cantidad de Habitaciones') }}</label>
                <input type="number" class="form-control" id="cantidadHabitaciones" name="cantidadHabitaciones" min="1" max="10" value="1">
                <small class="text-danger fst-italic">{{ $errors->first('cantidadHabitaciones') }}</small>
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
            <button type="submit" class="btn btn-primary w-100">{{ __('Reservar Hotel') }}</button>
        </form>
    </x-card-form>
</div>

@endsection