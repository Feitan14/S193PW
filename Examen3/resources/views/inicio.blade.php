<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Examen 3er Parcial</title>
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
    <a href="'/crearPrenda">Nueva prenda</a>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prenda</th>
                <th>Color</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prendas as $prenda)
            <tr>
                <td>{{ $prenda->id }}</td>
                <td>{{ $prenda->prenda }}</td>
                <td>{{ $prenda->color }}</td>
                <td>{{ $prenda->cantidad }}</td>
                <td>
                    <a href="/editarPrenda/{{ $prenda->id }}">Editar</a>
                    <form action="{{route('prendas.destroy', $prenda->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>