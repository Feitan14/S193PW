<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])

    <title>Convertidor de Unidades</title>

</head>
<body style="background-color: lightslategrey">
    <div class="container mt-5" style="background-color: lightslategrey;">
        <div class="row justify-content-center" >
            <div class="col-md-6">
                <div class="card shadow-lg"style="background-color: lightgrey">
                    <div class="card-header text-center text-white "style="background-color: yellowgreen; color: white;">
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
                                <button type="submit" class="btn btn-success" style="background-color: yellowgreen; color: white;">Convertir</button>
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
