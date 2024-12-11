<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar librerías para exportar a PDF y Excel -->
    <script src="https://cdn.jsdelivr.net/npm/jspdf@2.5.1/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.17.0/dist/xlsx.full.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.panel') }}">Volver al Panel</a>
        </div>
    </nav>

    <main class="container my-5">
        <h2 class="text-center">Gestión de Reportes</h2>
        <p class="text-center">Genere reportes de vuelos, hoteles o clientes y expórtelos en PDF o Excel.</p>
        <div class="row">
            <div class="col-md-4">
                <button class="btn btn-success w-100" onclick="generateFlightReport()">Reportes de Vuelos</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success w-100" onclick="generateHotelReport()">Reportes de Hoteles</button>
            </div>
            <div class="col-md-4">
                <button class="btn btn-success w-100" onclick="generateClientReport()">Reportes de Clientes</button>
            </div>
        </div>
    </main>

    <script>
        // Generar reporte de vuelos en PDF
        function generateFlightReport() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text('Reporte de Vuelos', 10, 10);
            // Aquí puedes agregar los datos de vuelos
            doc.text('Datos de los vuelos...', 10, 20);
            doc.save('reporte_vuelos.pdf');
        }

        // Generar reporte de hoteles en PDF
        function generateHotelReport() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text('Reporte de Hoteles', 10, 10);
            // Aquí puedes agregar los datos de hoteles
            doc.text('Datos de los hoteles...', 10, 20);
            doc.save('reporte_hoteles.pdf');
        }

        // Generar reporte de clientes en PDF
        function generateClientReport() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text('Reporte de Clientes', 10, 10);
            // Aquí puedes agregar los datos de los clientes
            doc.text('Datos de los clientes...', 10, 20);
            doc.save('reporte_clientes.pdf');
        }

        // Generar reporte de vuelos en Excel
        function generateFlightExcelReport() {
            const flightsData = [
                ['ID', 'Nombre', 'Fecha', 'Destino'],
                [1, 'Vuelo A', '2024-12-10', 'Madrid'],
                [2, 'Vuelo B', '2024-12-11', 'Barcelona'],
                // Aquí agregas los datos reales de los vuelos
            ];

            const ws = XLSX.utils.aoa_to_sheet(flightsData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Vuelos');
            XLSX.writeFile(wb, 'reporte_vuelos.xlsx');
        }

        // Generar reporte de hoteles en Excel
        function generateHotelExcelReport() {
            const hotelsData = [
                ['ID', 'Nombre', 'Precio', 'Ubicación'],
                [1, 'Hotel A', '$100', 'Madrid'],
                [2, 'Hotel B', '$120', 'Barcelona'],
                // Aquí agregas los datos reales de los hoteles
            ];

            const ws = XLSX.utils.aoa_to_sheet(hotelsData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Hoteles');
            XLSX.writeFile(wb, 'reporte_hoteles.xlsx');
        }

        // Generar reporte de clientes en Excel
        function generateClientExcelReport() {
            const clientsData = [
                ['ID', 'Nombre', 'Correo Electrónico', 'Teléfono'],
                [1, 'Cliente A', 'clienteA@example.com', '123456789'],
                [2, 'Cliente B', 'clienteB@example.com', '987654321'],
                // Aquí agregas los datos reales de los clientes
            ];

            const ws = XLSX.utils.aoa_to_sheet(clientsData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Clientes');
            XLSX.writeFile(wb, 'reporte_clientes.xlsx');
        }
    </script>
</body>
</html>
