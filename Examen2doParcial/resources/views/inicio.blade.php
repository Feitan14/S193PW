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
    <form  action="/procesarPrendas" method="POST">
        @csrf
        <label for="prenda">Prenda:</label>
        <input type="text" name="txtprenda" id="prenda">
        <small>{{ $errors->first('txtprenda') }}</small>
        <label for="color">Color:</label> 
        <input type="text" name="txtcolor" id="color">
        <small>{{ $errors->first('txtcolor') }}</small>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="txtcantidad" id="cantidad">
        <small>{{ $errors->first('txtcantidad') }}</small>
        <button type="submit">Guardar Prendas</button>

    </form>

</body>
</html>