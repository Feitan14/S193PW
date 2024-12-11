<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Examen 2do Parcial</title>
</head>
<body>
    
    @if (session('exito'))
        <script>
            Swal.fire({
                title: '{!! session('exito') !!}',
                icon: 'success'
            });
        </script>
    @endif

    <h1>Registro de prendas</h1>
    <form  action="{{ route('rutaProcesarEditarPrendas', $prenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="prenda">Prenda:</label>
        <input type="text" name="txtprenda" id="prenda" value="{{ $prenda->prenda }}">
        <small>{{ $errors->first('txtprenda') }}</small>
        <label for="color">Color:</label> 
        <input type="text" name="txtcolor" id="color" value="{{ $prenda->color }}">
        <small>{{ $errors->first('txtcolor') }}</small>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="txtcantidad" id="cantidad" value="{{ $prenda->cantidad }}">
        <small>{{ $errors->first('txtcantidad') }}</small>
        <button type="submit">Guardar Prendas</button>

    </form>

</body>
</html>