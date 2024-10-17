<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])
    
    <title>Inicio</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightslategrey; /* Fondo azul claro */
        }

        .container {
            text-align: center;
            padding: 60px; /* Bordes más grandes */
            border-radius: 20px; /* Bordes redondeados más amplios */
            background-color: white; /* Fondo blanco solo para el contenido */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más marcada */
            width: 50%; /* Para hacer el contenedor más amplio */
            max-width: 800px; /* Limitar el tamaño máximo en pantallas grandes */
        }

        h1 {
            color: yellowgreen; /* Color del título */
            margin-bottom: 30px;
            font-size: 2.5rem; /* Hacer el título más grande */
        }

        h3, h4 {
            color: #004d40; /* Colores de los subtítulos */
            margin-bottom: 15px;
        }

        p {
            color: #616161;
            margin-bottom: 30px;
            font-size: 1.2rem;
        }

        .btn-custom {
            background-color: yellowgreen; /* Botón con el color verde */
            color: white;
            padding: 15px 30px; /* Botón más grande */
            border-radius: 8px; /* Borde del botón más redondeado */
            text-decoration: none;
            font-size: 1.3rem; /* Fuente del botón más grande */
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #5dba4a; /* Color más oscuro al pasar el mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Repaso de Laravel</h1>
        <h3>Andrés Morales Cortez</h3>
        <h4>S193 - Ingeniería de Sistemas</h4>
        <p>Presiona el botón para comenzar</p>

        <a href="/Repaso" class="btn-custom">Repaso 1</a>
    </div>
</body>
</html>
