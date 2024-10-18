<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!-- Llamada al archivo CSS -->
    @vite(['resources/css/styles.css'])
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Repaso de Laravel</h1>
        <h3>Andrés Morales Cortez</h3>
        <h4>S193 - Ingeniería de Sistemas</h4>
        <h3>CURP: MOCA030323HQTRRNA2 <br>Nací el 23 de marzo, ese día es festivo<br>Sistemas gooooooood</h3>
        <p>Presiona el botón para comenzar</p>
        <a href="{{ url('/Repaso') }}" class="btn-custom">Repaso 1</a>
    </div>
</body>
</html>
