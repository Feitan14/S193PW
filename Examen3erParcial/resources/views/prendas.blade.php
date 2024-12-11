<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRENDAS</title>
</head>
<body>

    <h1>PRENDAS</h1>

    <div>
        @foreach ($prendas as $prenda)
            <div>
                <h2>Nombre: {{ $prenda->prenda }}</h2>
                <h3>Color: {{ $prenda->color }}</h3>
                <h4>Cantidad: {{ $prenda->cantidad }}</h4>
            </div>

            <div>
                <a href="{{ route('rutaEditarPrendas', $prenda->id) }}">Editar</a>
                <form action=" {{ route('rutaEliminarPrendas', $prenda->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
            <br>
        @endforeach
    </div>

</body>
</html>