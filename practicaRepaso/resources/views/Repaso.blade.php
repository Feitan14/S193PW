<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertidor de Unidades</title>

    <!-- Llamada al archivo CSS -->
    @vite(['resources/css/styles.css'])
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h3>Convertidor de Unidades de Almacenamiento</h3>
                    </div>
                    <div class="card-body">
                        {{-- Formulario --}}
                        <form action="/convertir" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                            </div>

                            <div class="mb-3">
                                <label for="unidad" class="form-label">Convertir desde</label>
                                <select id="unidad" name="unidad" class="form-select" required>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                    <option value="TB">TB</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="convertirA" class="form-label">Convertir a</label>
                                <select id="convertirA" name="convertirA" class="form-select" required>
                                    <option value="GB">GB</option>
                                    <option value="MB">MB</option>
                                    <option value="TB">TB</option>
                                </select>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn-custom">Convertir</button>
                            </div>
                        </form>

                        {{-- Mostrar el resultado si existe --}}
                        @if (isset($resultado))
                            <div class="alert alert-success mt-3">
                                {{ $resultado }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
