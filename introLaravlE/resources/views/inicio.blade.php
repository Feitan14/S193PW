<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])
    
    <title>Inicio</title>
    <style>
        body, html {
            height: 100%;
        }
        .full-height {
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center text-center full-height">
        <h1 class="display-1">{{__('Bienvenido Turista!')}}</h1>
        <p>{{__('Presiona el boton para iniciar...')}}</p>

        <a href="/form" class="btn btn-primary">{{__('Ir al Registro')}}</a> <br>
        <a href="{{ route('cliente.create') }}" class="btn btn-danger">{{__('Ir al Registro')}}</a>
    </div>
</body>
</html>