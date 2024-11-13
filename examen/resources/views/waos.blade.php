<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Panel de Administración</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Estilo general */
        body {
            background-color: #f8f9fa;
        }
        .section-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .section-header {
            font-weight: bold;
            color: #343a40;
            margin-bottom: 1rem;
        }
        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestión de Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Estadísticas</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h2 class="mb-4">Panel de Administración</h2>

        <!-- Sección de Vuelos -->
        <div class="section-container">
            <div class="section-header">Gestión de Vuelos</div>
            <button class="btn btn-primary" onclick="manageSection('Vuelos')">Administrar Vuelos</button>
            <button class="btn btn-secondary" onclick="addSection('Vuelos')">Agregar Nuevo Vuelo</button>
            <button class="btn btn-info" onclick="viewDetails('Vuelos')">Ver Detalles</button>
            <button class="btn btn-warning" onclick="editSection('Vuelos')">Editar Vuelo</button>
            <button class="btn btn-danger" onclick="deleteSection('Vuelos')">Eliminar Vuelo</button>
        </div>

        <!-- Sección de Reservas -->
        <div class="section-container">
            <div class="section-header">Gestión de Reservas</div>
            <button class="btn btn-primary" onclick="manageSection('Reservas')">Administrar Reservas</button>
            <button class="btn btn-secondary" onclick="addSection('Reservas')">Agregar Nueva Reserva</button>
            <button class="btn btn-info" onclick="viewDetails('Reservas')">Ver Detalles</button>
            <button class="btn btn-warning" onclick="editSection('Reservas')">Editar Reserva</button>
            <button class="btn btn-danger" onclick="deleteSection('Reservas')">Eliminar Reserva</button>
        </div>

        <!-- Sección de Destinos -->
        <div class="section-container">
            <div class="section-header">Gestión de Destinos</div>
            <button class="btn btn-primary" onclick="manageSection('Destinos')">Administrar Destinos</button>
            <button class="btn btn-secondary" onclick="addSection('Destinos')">Agregar Nuevo Destino</button>
            <button class="btn btn-info" onclick="viewDetails('Destinos')">Ver Detalles</button>
            <button class="btn btn-warning" onclick="editSection('Destinos')">Editar Destino</button>
            <button class="btn btn-danger" onclick="deleteSection('Destinos')">Eliminar Destino</button>
        </div>

        <!-- Sección de Usuarios -->
        <div class="section-container">
            <div class="section-header">Gestión de Usuarios</div>
            <button class="btn btn-primary" onclick="manageSection('Usuarios')">Administrar Usuarios</button>
            <button class="btn btn-secondary" onclick="addSection('Usuarios')">Agregar Nuevo Usuario</button>
            <button class="btn btn-info" onclick="viewDetails('Usuarios')">Ver Detalles</button>
            <button class="btn btn-warning" onclick="editSection('Usuarios')">Editar Usuario</button>
            <button class="btn btn-danger" onclick="deleteSection('Usuarios')">Eliminar Usuario</button>
        </div>

        <!-- Sección de Empleados -->
        <div class="section-container">
            <div class="section-header">Gestión de Empleados</div>
            <button class="btn btn-primary" onclick="manageSection('Empleados')">Administrar Empleados</button>
            <button class="btn btn-secondary" onclick="addSection('Empleados')">Agregar Nuevo Empleado</button>
            <button class="btn btn-info" onclick="viewDetails('Empleados')">Ver Detalles</button>
            <button class="btn btn-warning" onclick="editSection('Empleados')">Editar Empleado</button>
            <button class="btn btn-danger" onclick="deleteSection('Empleados')">Eliminar Empleado</button>
        </div>

    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Travell, <span id="currentYear"></span></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mostrar el año actual en el footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Función para gestionar secciones
        function manageSection(section) {
            Swal.fire('Administración', `Estás gestionando la sección de ${section}`, 'info');
        }

        // Función para agregar nuevo registro
        function addSection(section) {
            Swal.fire({
                title: `¿Agregar nuevo en ${section}?`,
                text: `Estás a punto de agregar un nuevo registro a ${section}.`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, agregar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Éxito', `Nuevo registro agregado en ${section}.`, 'success');
                }
            });
        }

        // Función para ver detalles
        function viewDetails(section) {
            Swal.fire('Detalles', `Mostrando detalles de ${section}`, 'info');
        }

        // Función para editar registros
        function editSection(section) {
            Swal.fire({
                title: `¿Editar en ${section}?`,
                text: `Estás a punto de editar un registro en ${section}.`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, editar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Éxito', `Registro editado en ${section}.`, 'success');
                }
            });
        }

        // Función para eliminar registros
        function deleteSection(section) {
            Swal.fire({
                title: `¿Eliminar en ${section}?`,
                text: `Esta acción es irreversible. ¿Deseas continuar?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Eliminado', `Registro eliminado en ${section}.`, 'success');
                }
            });
        }
    </script>
</body>
</html>
