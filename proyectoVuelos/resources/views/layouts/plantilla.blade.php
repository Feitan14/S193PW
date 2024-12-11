<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap"   rel="stylesheet">
    <style>

      /* Estilos básicos para html y body */
      html, body {
          height: auto; /* Permite que el contenido determine la altura */
          min-height: 100%; /* Garantiza que llene al menos el alto de la pantalla */
          margin: 0;
          display: flex;
          flex-direction: column;
      }

      /* Asegura que el contenido principal ocupe el espacio restante */
      main {
          flex: 1 0 auto;
      }

      /* Hace que el footer permanezca al final */
      footer {
          flex-shrink: 0;
      }

      /* Estilo del navbar oculto */
      .navbar-hidden {
          transform: translateY(-100%); /* Desplaza el navbar fuera de la pantalla */
          transition: transform 0.3s ease-in-out; /* Animación suave */
      }

      /* Asegura que el navbar esté siempre sobre otros elementos */
      nav {
          position: sticky; /* Hace que el navbar permanezca en la parte superior */
          top: 0; /* Alinea al inicio del scroll */
          z-index: 1030; /* Prioridad alta para evitar que lo oculten otros elementos */
          background: #f8f9fa; /* Fondo para que se vea claro sobre otros elementos */
          box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Sombra para resaltar el navbar */
      }

    </style>
     <script>
        // JavaScript para ocultar la barra de navegación al hacer scroll hacia abajo
        let lastScrollTop = 0;
        window.addEventListener("scroll", function() {
            const navbar = document.querySelector("nav");
            if (!navbar) return; // Asegúrate de que el navbar existe

            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.classList.add("navbar-hidden"); // Oculta el navbar
            } else {
                navbar.classList.remove("navbar-hidden"); // Muestra el navbar
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Prevenir valores negativos
        });
    </script>
    <title>@yield('titulo')</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="{{ route('rutaPaginaprincipal') }}">Travell</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Vuelos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('vuelos.index') }}">{{__('Buscar Vuelos')}}</a></li>
              <li><a class="dropdown-item" href="{{ route('rutaReservacionesVuelos') }}">{{__('Reservar Vuelos')}}</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Hoteles
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('hoteles.index') }}">{{__('Buscar Hoteles')}}</a></li>
              <li><a class="dropdown-item" href="{{ route('rutaReservacionesHoteles') }}">{{__('Reservar Hoteles')}}</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('rutaPoliticasCancelacion') }}">{{__('Politicas de Cancelación')}}</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="btn btn-outline-primary" href="{{ route('rutaInicioSesion') }}">{{__('Iniciar Sesión')}}</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    @yield('contenido')
  </main>

  <footer class="bg-dark text-orange pt-4" style="color: rgb(43, 0, 255);">
    <div class="container">       
      <div class="text-center">
        <h5 class="text-uppercase" style="color: white">{{__('Agencia de viajes Travell') }}</h5>
        <p style="color: white">{{__('Descubre tu siguiewnte destino con Travell') }}.</p>
        <p style="color: white">&copy; {{__('Travell') }}, {{ date('Y') }}</p>{{-- Logica sacada de chat, entendida que llamamos una funcion de php para sacar el dia, mes y año --}}
      </div>
    </div>
  </footer>
</body>
</html>