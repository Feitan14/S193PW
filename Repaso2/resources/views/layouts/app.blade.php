<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    
    <!-- Enlace al CSS de Laravel y Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Enlace al CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Alertify CSS para notificaciones -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('principal') }}">Biblioteca</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('libros.create') }}">Registrar Libro</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <footer class="footer mt-auto py-3 text-center">
        <div class="container">
            <span>Nombre Biblioteca &copy; {{ date('d-m-Y') }}</span>
        </div>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    @stack('scripts')
</body>
</html>
