<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/js/app.js'])
    
    <title>Inicio</title>
    <style>
        body, html {
            height: 100%;
            
        }
        .full-height {
            height: 100vh;
            background-color: lightslategrey;
        }
        
    </style>
</head>
<body>
    <div class="d-flex flex-column justify-content-center align-items-center text-center full-height">
        <h1 class="display-1"> Bienvenido al Repaso de Larabel</h1>
        <h2 class="display-4"> Creado por Carlos Saúl Muñoz Ibarra</h2>
        <p>Presiona el boton para iniciar....</p>

        <a href="/Repaso" class="btn btn-success" style="background-color: yellowgreen; color: white;"> Ir al Repaso </a>     
        {{-- <a href="" class="btn btn-danger"> Ir al Registro </a> --}}
    </div>
</body>
</html>