<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        html, body {
            height: auto;
            min-height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
        }

        .navbar-hidden {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }

        nav {
            position: sticky;
            top: 0;
            z-index: 1030;
            background: #f8f9fa;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", function () {
            const navbar = document.querySelector("nav");
            if (!navbar) return;

            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.classList.add("navbar-hidden");
            } else {
                navbar.classList.remove("navbar-hidden");
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Simulación de datos del carrito
            const cartData = {
                items: [
                    { id: 1, name: "Vuelo CDMX -> NY", type: "flight" },
                    { id: 2, name: "Hotel NY Plaza", type: "hotel" }
                ]
            };

            const cartItemsContainer = document.getElementById('cartItems');
            const cartCount = document.getElementById('cartCount');

            if (cartData.items.length > 0) {
                cartItemsContainer.innerHTML = '';
                cartData.items.forEach(item => {
                    const listItem = document.createElement('li');
                    listItem.className = 'dropdown-item';
                    listItem.textContent = `${item.type === "flight" ? "✈️" : "🏨"} ${item.name}`;
                    cartItemsContainer.appendChild(listItem);
                });
                cartCount.textContent = cartData.items.length;
            } else {
                cartItemsContainer.innerHTML = '<span class="dropdown-item">No tienes elementos en el carrito</span>';
                cartCount.textContent = '0';
            }
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
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vuelos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('vuelos.index') }}">Buscar Vuelos</a></li>
                        <li><a class="dropdown-item" href="{{ route('vuelos.create') }}">Reservar Vuelos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Hoteles</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('hoteles.index') }}">Buscar Hoteles</a></li>
                        <li><a class="dropdown-item" href="{{ route('hoteles.create') }}">Reservar Hoteles</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle position-relative" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="cartCount">0</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cartDropdown">
                        <li>
                            <h6 class="dropdown-header">Tus Selecciones</h6>
                        </li>
                        <li id="cartItems">
                            <span class="dropdown-item">No tienes elementos en el carrito</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-center text-primary" href="{{ route('carrito.index') }}">Ir al carrito</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> Mi Cuenta
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('reservaciones.index') }}">Mis Reservaciones</a></li>
                        <li><a class="dropdown-item" href="{{ route('usuario.actualizar') }}">Actualizar mis datos</a></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Cerrar Sesión</a></li>
                    </ul>
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
            <h5 class="text-uppercase" style="color: white">Agencia de viajes Travell</h5>
            <p style="color: white">Descubre tu siguiente destino con Travell.</p>
            <p style="color: white">&copy; Travell, {{ date('Y') }}</p>
        </div>
    </div>
</footer>
</body>
</html>