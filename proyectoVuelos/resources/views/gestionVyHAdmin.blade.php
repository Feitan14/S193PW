<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vuelos y Hoteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ route('admin.panel') }}">Volver al Panel</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Gestión de Vuelos y Hoteles</h2>

        <!-- Section: Vuelos -->
        <section class="mb-5">
            <h3 class="text-secondary">Vuelos</h3>
            <button class="btn btn-success mb-3" onclick="createFlight()">Crear Vuelo</button>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Tarifa</th>
                            <th>Condiciones</th>
                            <th>Servicios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="flightsTable">
                        <!-- Placeholder Row -->
                        <tr>
                            <td>1</td>
                            <td>Madrid</td>
                            <td>Londres</td>
                            <td>$150</td>
                            <td>Cancelación gratuita 24h antes</td>
                            <td>WiFi, Bebidas</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editFlight(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteFlight(this)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Section: Hoteles -->
        <section>
            <h3 class="text-secondary">Hoteles</h3>
            <button class="btn btn-success mb-3" onclick="createHotel()">Crear Hotel</button>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tarifa</th>
                            <th>Condiciones</th>
                            <th>Servicios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="hotelsTable">
                        <!-- Placeholder Row -->
                        <tr>
                            <td>1</td>
                            <td>Hotel Sunset</td>
                            <td>$120</td>
                            <td>Desayuno incluido</td>
                            <td>Piscina, WiFi</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editHotel(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteHotel(this)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- JavaScript Functions -->
    <script>
        let flightCounter = 2; // For new flight IDs
        let hotelCounter = 2;  // For new hotel IDs

        // Create a new flight
        function createFlight() {
            Swal.fire({
                title: 'Crear Vuelo',
                html: `
                    <input type="text" id="flightOrigin" class="swal2-input" placeholder="Origen">
                    <input type="text" id="flightDestination" class="swal2-input" placeholder="Destino">
                    <input type="number" id="flightPrice" class="swal2-input" placeholder="Tarifa">
                    <input type="text" id="flightConditions" class="swal2-input" placeholder="Condiciones">
                    <input type="text" id="flightServices" class="swal2-input" placeholder="Servicios">
                `,
                confirmButtonText: 'Guardar',
                showCancelButton: true,
                preConfirm: () => {
                    const origin = document.getElementById('flightOrigin').value;
                    const destination = document.getElementById('flightDestination').value;
                    const price = document.getElementById('flightPrice').value;
                    const conditions = document.getElementById('flightConditions').value;
                    const services = document.getElementById('flightServices').value;

                    if (!origin || !destination || !price || !conditions || !services) {
                        Swal.showValidationMessage('Todos los campos son obligatorios');
                        return false;
                    }

                    return { origin, destination, price, conditions, services };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const table = document.getElementById('flightsTable');
                    const newRow = `
                        <tr>
                            <td>${flightCounter++}</td>
                            <td>${result.value.origin}</td>
                            <td>${result.value.destination}</td>
                            <td>$${result.value.price}</td>
                            <td>${result.value.conditions}</td>
                            <td>${result.value.services}</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editFlight(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteFlight(this)">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    table.innerHTML += newRow;
                    Swal.fire('Éxito', 'Vuelo creado con éxito', 'success');
                }
            });
        }

        // Create a new hotel
        function createHotel() {
            Swal.fire({
                title: 'Crear Hotel',
                html: `
                    <input type="text" id="hotelName" class="swal2-input" placeholder="Nombre del Hotel">
                    <input type="number" id="hotelPrice" class="swal2-input" placeholder="Tarifa">
                    <input type="text" id="hotelConditions" class="swal2-input" placeholder="Condiciones">
                    <input type="text" id="hotelServices" class="swal2-input" placeholder="Servicios">
                `,
                confirmButtonText: 'Guardar',
                showCancelButton: true,
                preConfirm: () => {
                    const name = document.getElementById('hotelName').value;
                    const price = document.getElementById('hotelPrice').value;
                    const conditions = document.getElementById('hotelConditions').value;
                    const services = document.getElementById('hotelServices').value;

                    if (!name || !price || !conditions || !services) {
                        Swal.showValidationMessage('Todos los campos son obligatorios');
                        return false;
                    }

                    return { name, price, conditions, services };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const table = document.getElementById('hotelsTable');
                    const newRow = `
                        <tr>
                            <td>${hotelCounter++}</td>
                            <td>${result.value.name}</td>
                            <td>$${result.value.price}</td>
                            <td>${result.value.conditions}</td>
                            <td>${result.value.services}</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editHotel(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteHotel(this)">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    table.innerHTML += newRow;
                    Swal.fire('Éxito', 'Hotel creado con éxito', 'success');
                }
            });
        }

        // Edit a hotel
        function editHotel(button) {
            const row = button.parentNode.parentNode;
            const currentData = {
                name: row.children[1].innerText,
                price: row.children[2].innerText.slice(1),
                conditions: row.children[3].innerText,
                services: row.children[4].innerText
            };

            Swal.fire({
                title: 'Editar Hotel',
                html: `
                    <input type="text" id="hotelName" class="swal2-input" placeholder="Nombre" value="${currentData.name}">
                    <input type="number" id="hotelPrice" class="swal2-input" placeholder="Tarifa" value="${currentData.price}">
                    <input type="text" id="hotelConditions" class="swal2-input" placeholder="Condiciones" value="${currentData.conditions}">
                    <input type="text" id="hotelServices" class="swal2-input" placeholder="Servicios" value="${currentData.services}">
                `,
                confirmButtonText: 'Guardar',
                showCancelButton: true,
                preConfirm: () => {
                    const name = document.getElementById('hotelName').value;
                    const price = document.getElementById('hotelPrice').value;
                    const conditions = document.getElementById('hotelConditions').value;
                    const services = document.getElementById('hotelServices').value;

                    if (!name || !price || !conditions || !services) {
                        Swal.showValidationMessage('Todos los campos son obligatorios');
                        return false;
                    }

                    return { name, price, conditions, services };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    row.children[1].innerText = result.value.name;
                    row.children[2].innerText = `$${result.value.price}`;
                    row.children[3].innerText = result.value.conditions;
                    row.children[4].innerText = result.value.services;
                    Swal.fire('Éxito', 'Hotel actualizado con éxito', 'success');
                }
            });
        }

        // Delete a hotel
        function deleteHotel(button) {
            const row = button.parentNode.parentNode;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    row.remove();
                    Swal.fire('Eliminado', 'El hotel fue eliminado', 'success');
                }
            });
        }

        // Delete a flight
        function deleteFlight(button) {
            const row = button.parentNode.parentNode;
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    row.remove();
                    Swal.fire('Eliminado', 'El vuelo fue eliminado', 'success');
                }
            });
        }
    </script>
</body>
</html>
