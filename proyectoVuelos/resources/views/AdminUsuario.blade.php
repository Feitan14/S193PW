<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
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
        <h2 class="text-center mb-4">Gestión de Usuarios</h2>

        <!-- Section: Usuarios -->
        <section class="mb-5">
            <h3 class="text-secondary">Usuarios</h3>
            <button class="btn btn-success mb-3" onclick="createUser()">Crear Usuario</button>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable">
                        <!-- Placeholder Row -->
                        <tr>
                            <td>1</td>
                            <td>Juan Pérez</td>
                            <td>juan@ejemplo.com</td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editUser(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser(this)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- JavaScript Functions -->
    <script>
        let userCounter = 2; // For new user IDs

        // Create a new user
        function createUser() {
            Swal.fire({
                title: 'Crear Usuario',
                html: `
                    <input type="text" id="userName" class="swal2-input" placeholder="Nombre">
                    <input type="email" id="userEmail" class="swal2-input" placeholder="Email">
                    <input type="text" id="userRole" class="swal2-input" placeholder="Rol">
                `,
                confirmButtonText: 'Guardar',
                showCancelButton: true,
                preConfirm: () => {
                    const name = document.getElementById('userName').value;
                    const email = document.getElementById('userEmail').value;
                    const role = document.getElementById('userRole').value;

                    if (!name || !email || !role) {
                        Swal.showValidationMessage('Todos los campos son obligatorios');
                        return false;
                    }

                    return { name, email, role };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const table = document.getElementById('usersTable');
                    const newRow = `
                        <tr>
                            <td>${userCounter++}</td>
                            <td>${result.value.name}</td>
                            <td>${result.value.email}</td>
                            <td>${result.value.role}</td>
                            <td>
                                <button class="btn btn-warning btn-sm me-2" onclick="editUser(this)">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser(this)">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    table.innerHTML += newRow;
                    Swal.fire('Éxito', 'Usuario creado con éxito', 'success');
                }
            });
        }

        // Edit an existing user
        function editUser(button) {
            const row = button.parentNode.parentNode;
            const currentData = {
                name: row.children[1].innerText,
                email: row.children[2].innerText,
                role: row.children[3].innerText
            };

            Swal.fire({
                title: 'Editar Usuario',
                html: `
                    <input type="text" id="userName" class="swal2-input" placeholder="Nombre" value="${currentData.name}">
                    <input type="email" id="userEmail" class="swal2-input" placeholder="Email" value="${currentData.email}">
                    <input type="text" id="userRole" class="swal2-input" placeholder="Rol" value="${currentData.role}">
                `,
                confirmButtonText: 'Guardar',
                showCancelButton: true,
                preConfirm: () => {
                    const name = document.getElementById('userName').value;
                    const email = document.getElementById('userEmail').value;
                    const role = document.getElementById('userRole').value;

                    if (!name || !email || !role) {
                        Swal.showValidationMessage('Todos los campos son obligatorios');
                        return false;
                    }

                    return { name, email, role };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    row.children[1].innerText = result.value.name;
                    row.children[2].innerText = result.value.email;
                    row.children[3].innerText = result.value.role;
                    Swal.fire('Éxito', 'Usuario actualizado con éxito', 'success');
                }
            });
        }

        // Delete a user
        function deleteUser(button) {
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
                    Swal.fire('Eliminado', 'El usuario fue eliminado', 'success');
                }
            });
        }
    </script>
</body>
</html>
