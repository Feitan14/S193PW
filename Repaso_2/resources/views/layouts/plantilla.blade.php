<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alertify CSS and JS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <title>@yield('titulo')</title>
</head>
<body>
    {{-- Inicia el navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <center>
            <div class="container-fluid">
                <a class="navbar-brand" href="">Registro Biblioteca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaform')?'text-warning':''}}" aria-current="page" href="{{ route('rutaform') }}">{{__('Registro de libros')}}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaform')?'':'text-warning'}}" href="{{ route('rutaCliente') }}">{{__('Consulta Clientes')}}</a> 
                        </li> -->
                    </ul>
                </div>
            </div>
        </center>
    </nav>
    {{-- Finaliza navbar --}}

    @yield('contenido')

    {{-- Script para mostrar alertas --}}
    <script>
        @if(session('exito'))
            alertify.set('notifier', 'position', 'top-right');
            alertify.success("¡Buen trabajo!");
        @endif
    </script>
</body>
</html>
