@extends('layouts.plantillaNav')
@section('titulo','formulario')
@section('contenido')


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>

</head>
<body>


    <div class="container">

    <h1 class="display-1 text-prmiary text-center">Gestión de Contactos </h1>

    <form action="{{route('/formulario')}}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nombre" class="form-label">{{__('Nombre')}} </label>
                        <input type="text" class="form-control" name="nombre"value="{{old('nombre')}}">
                        <small class="txt-danger fst-italic"> {{ $errors->first('nombre') }} </small>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">{{__('Correo')}}</label>
                        <input type="text" class="form-control" name="correo" value="{{old('correo')}}">
                        <small class="txt-danger fst-italic">{{ $errors->first('correo') }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">{{__('Telefono')}}</label>
                        <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
                        <small class="txt-danger fst-italic">{{ $errors->first('telefono') }}</small>
                    </div>
            </div>

            <div class="card-footer text-muted">

            <div class="d-grid gap-2 mt-2 mb-1">
                <button type="submit" class="btn btn-success btn-sm"> {{__('Guardar contacto')}} </button>
            </div>

            </form>



</body>
</html>
@endsection