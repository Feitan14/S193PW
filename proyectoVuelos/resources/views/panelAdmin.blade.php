<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">AdminPanel</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('gestionVyHAdmin') }}">Gestión de Vuelos y Hoteles</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reportesAdmin') }}">Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('AdminUsuarios') }}">Usuarios</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5">
        <h1 class="text-center">Bienvenido al Panel de Administración</h1>
        <p class="text-center">Seleccione una opción para gestionar los servicios.</p>

        <!-- Cards de acceso rápido -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Card: Gestión de Vuelos y Hoteles -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://img.freepik.com/foto-gratis/coleccion-elementos-viaje-vista-superior_23-2148691133.jpg?t=st=1733221117~exp=1733224717~hmac=558a95797397b3167c1abbe27dab1707f635abb911633003222a7adab43804cc&w=996" class="card-img-top" alt="Gestión de Vuelos y Hoteles">
                    <div class="card-body">
                        <h5 class="card-title">Gestión de Vuelos y Hoteles</h5>
                        <p class="card-text">Administra los vuelos y hoteles de tus usuarios, gestionando opciones y disponibilidad.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('gestionVyHAdmin') }}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
            
            <!-- Card: Reportes -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://agendapro.com/web_assets/img/Desktop_-Reportes-de-gestion-8-1.webp" class="card-img-top" alt="Reportes">
                    <div class="card-body">
                        <h5 class="card-title">Reportes</h5>
                        <p class="card-text">Genera y visualiza reportes sobre el desempeño y estadísticas del sistema.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('reportesAdmin') }}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Card: Usuarios -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://lh3.googleusercontent.com/B2B2y-S85WNWRXxRLFvhO0DoSs6Wg2lje-gGd-uTj_03XYm9IT5GhPxomnQ8Qg36aR1uMzbUKmNtCvr-Rmb1nv4vZVo1zFnQmpfuU8N_uFp3SFnjLmSuFGCdRx5IQquIV9T8b8V9acW2nS7vYH0-I07XdG6fBRDoiRdMLjTV2jSMh5lYDAfSJwqH9TNFQDXCQ6qMG6oLgg" class="card-img-top" alt="Usuarios">
                    <div class="card-body">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Gestiona y administra los usuarios del sistema, creando, editando o eliminando perfiles.</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('AdminUsuarios') }}" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
