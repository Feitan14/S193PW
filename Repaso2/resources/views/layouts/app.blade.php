<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Biblioteca</a>
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
