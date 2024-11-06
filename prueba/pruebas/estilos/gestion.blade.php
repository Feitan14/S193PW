<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/styles.css"> <!-- Link to the external CSS file -->
    <title>Admin Dashboard</title>
</head>

<body style="height: 100%;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Configuraciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#">Dashboard</a>
        <a href="#">Gestión de Usuarios</a>
        <a href="#">Reservas</a>
        <a href="#">Reportes</a>
        <a href="#">Estadísticas</a>
        <a href="#">Configuración del Sistema</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Bienvenido al Panel de Administración</h2>
        <p>Aquí puedes gestionar las diferentes secciones de la plataforma.</p>

        <div class="row">
            <!-- Gestión de Usuarios -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Usuarios</h5>
                        <p class="card-text">Administra los usuarios, asigna roles y revisa sus permisos.</p>
                        <a href="#" class="btn btn-primary">Ir a gestion de usuarios</a>
                    </div>
                </div>
            </div>

            <!-- Reportes -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Reportes</h5>
                        <p class="card-text">Genera y visualiza reportes de actividad y uso de la plataforma.</p>
                        <a href="#" class="btn btn-primary">Ir a reportes</a>
                    </div>
                </div>
            </div>

            <!-- Estadísticas -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Vuelos</h5>
                        <p class="card-text">Consulta los vuelos de los usuarios, reservas y otros datos importantes.</p>
                        <a href="#" class="btn btn-primary">Ver a vuelos</a>
                    </div>
                </div>
            </div>

            <!-- Configuración del Sistema -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Hoteles</h5>
                        <p class="card-text">Consulta los hoteles de los usuarios, reservas y otros datos importantes.</p>
                        <a href="#" class="btn btn-primary">Ir a hoteles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <h5 class="text-uppercase">{{__('Agencia de viajes Travell')}}</h5>
            <p>{{__('Descubre tu siguiente destino con Travell')}}.</p>
            <p>&copy; {{__('Travell')}}, {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="path/to/script.js"></script> <!-- Link to the external JavaScript file -->
</body>
</html>
