<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/report-generation.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Generación de Reportes</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Asegura que el pie de página esté siempre al fondo */
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
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

        /* Vista previa del reporte para desplazarse si hay mucho contenido */
        .report-preview {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 1rem;
            background-color: #f9f9f9;
            margin-top: 1rem;
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
                        <a class="nav-link active" href="#">Generación de Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Estadísticas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configuración del Sistema</a>
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
        <h2>Generación de Reportes</h2>

        <!-- Report Configuration Section -->
        <div class="report-config">
            <form id="reportForm">
                <div class="form-group">
                    <label for="report-type">Tipo de Reporte:</label>
                    <select id="report-type" class="form-control">
                        <option value="usuarios">Usuarios</option>
                        <option value="reservas">Reservas</option>
                        <option value="ventas">Ventas</option>
                        <option value="actividad">Actividad</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="start-date">Fecha de Inicio:</label>
                    <input type="date" id="start-date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end-date">Fecha de Fin:</label>
                    <input type="date" id="end-date" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <button type="button" class="btn btn-primary btn-generate" onclick="generateReport()">Generar Reporte</button>
                    <button type="button" class="btn btn-secondary btn-export" onclick="exportReport('pdf')">Exportar a PDF</button>
                    <button type="button" class="btn btn-secondary btn-export" onclick="exportReport('excel')">Exportar a Excel</button>
                </div>
            </form>
        </div>

        <!-- Report Preview Section -->
        <div class="report-preview mt-4" id="report-preview">
            <h3>Vista Previa del Reporte</h3>
            <div id="preview-content" class="preview-content">
                <p>Genera el reporte para verlo aquí.</p>
            </div>
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

        // Función para generar el reporte
        function generateReport() {
            const reportType = document.getElementById('report-type').value;
            const startDate = document.getElementById('start-date').value;
            const endDate = document.getElementById('end-date').value;

            if (!startDate || !endDate) {
                Swal.fire('Error', 'Por favor, selecciona una fecha de inicio y fin', 'error');
                return;
            }

            // Crear el contenido del reporte
            const reportContent = `
                <h5>Reporte de ${reportType.charAt(0).toUpperCase() + reportType.slice(1)}</h5>
                <p>Período: ${startDate} a ${endDate}</p>
                <p><strong>Datos del reporte generados aquí...</strong></p>
            `;

            // Añadir el contenido del reporte en la vista previa
            const previewContent = document.getElementById('preview-content');
            previewContent.innerHTML += `<div class="report-section">${reportContent}</div>`;

            Swal.fire('Éxito', 'Reporte generado con éxito', 'success');
        }

        // Función para exportar el reporte en formato PDF o Excel
        function exportReport(format) {
            const reportType = document.getElementById('report-type').value;

            Swal.fire({
                title: `¿Exportar reporte en formato ${format.toUpperCase()}?`,
                text: `Estás por exportar el reporte de ${reportType} en formato ${format.toUpperCase()}.`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, exportar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Exportado', `El reporte fue exportado en formato ${format.toUpperCase()}.`, 'success');
                }
            });
        }
    </script>
</body>
</html>
