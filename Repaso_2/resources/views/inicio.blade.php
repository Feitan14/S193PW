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
            margin: 0; /* Elimina el margen predeterminado del body */
            display: flex; /* Usa flexbox para el body */
            flex-direction: column; /* Organiza los elementos en columnas */
        }
        .full-height {
            flex: 1; /* Permite que este div ocupe todo el espacio disponible */
            display: flex; /* Usa flexbox dentro del div */
            flex-direction: column; /* Organiza los elementos en columnas */
            justify-content: center; /* Centra verticalmente el contenido */
            align-items: center; /* Centra horizontalmente el contenido */
            text-align: center; /* Alinea el texto al centro */
        }
        .image-container {
            margin: 20px 0;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
        }
        nav {
            padding: 5px 0; /* Reduce el padding superior e inferior */
            margin-bottom: 20px; /* Espacio entre el navbar y el contenido */
        }
        .navbar-brand, .nav-link {
            font-size: 16px; /* Ajusta el tamaño de fuente si es necesario */
        }
        footer {
            width: 100%; /* Asegura que el pie de página ocupe todo el ancho */
            text-align: center; /* Alinea el texto al centro */
            padding: 10px; /* Espaciado interno */
            background-color: #f1f1f1; /* Color de fondo del pie de página */
        }
    </style>
</head>
<body>
    {{-- Inicia el navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href=""> Registro Biblioteca </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{request()->routeIs('rutaform') ? 'text-warning' : ''}}" aria-current="page" href="{{ route(name: 'rutaform') }}">{{ __('Registro de libros') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Finaliza navbar --}}

    <div class="d-flex flex-column justify-content-center align-items-center text-center full-height">
        <h1 class="display-1">{{ __('Bienvenido a la biblioteca virtual!') }}</h1>
        <p>{{ __('Presiona el botón para continuar con tu registro') }}</p>

        <a href="/form" class="btn btn-primary">{{ __('Registrar libro') }}</a> <br>

        <h2 class="mt-5">{{ __('E-Noticias del día') }}</h2>
        <div class="row">
            <!-- Imagen 1 -->
            <div class="col-md-4 image-container">
                <img src="https://www.diariodequeretaro.com.mx/incoming/pp8cgo-go_andrea-luna.jpg/alternates/LANDSCAPE_768/go_andrea%20luna.jpg" alt="El libro de cabecera" class="img-fluid">
                <p class="mt-2">Tejedora de relatos: el inquietante universo narrativo de Andrea Luna</p>
            </div>
            <!-- Imagen 2 -->
            <div class="col-md-4 image-container">
                <img src="https://cdn.forbes.com.mx/2024/09/Hay-Festival-dos-768x433.jpg" alt="Literatura, arte, cultura y hasta Radiohead" class="img-fluid">
                <p class="mt-2">Serán parte de Hay Festival Querétaro 2024</p>
            </div>
            <!-- Imagen 3 -->
            <div class="col-md-4 image-container">
                <img src="https://www.elsoldemexico.com.mx/incoming/lgno02-hankang_premio-nobel-literatura_-ilustracion-niklas-elmehed.png/alternates/LANDSCAPE_768/hankang_premio%20nobel%20literatura_%20ilustracio%CC%81n%20niklas%20elmehed.png" alt="usa la prosa poética para enfrentar traumas históricos" class="img-fluid">
                <p class="mt-2">Han Kang gana el Nobel de Literatura por confrontar traumas históricos y exponer la fragilidad humana</p>
            </div>
        </div>
    </div>

    <footer>
        <p>Biblioteca los JAMMI &copy; {{ date('d M Y') }}</p>
    </footer>
</body>
</html>
