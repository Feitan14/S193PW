@extends('layouts.plantilla')

@section('titulo','Formulario')

@section('contenido')

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container col-md-5 col-lg-8">

        @if(session('exito'))
        <script>
            alertify.set('notifier','position', 'top-right');
            alertify.success("¡Se ha registrado exitosamente!");
        </script>
        @endif

        <div class="card shadow-lg border-0 rounded-lg font-monospace">
            <!-- Encabezado del Formulario -->
            <div class="card-header fs-4 text-center text-white bg-primary">
                {{__('Registro de Clientes')}}
            </div>

            <!-- Cuerpo del Formulario -->
            <div class="card-body p-4 bg-light">
                <form action="/enviarCliente" method="POST">
                    @csrf
                    
                    <!-- Campo ISBN -->
                    <div class="mb-3">
                        <label for="isbn" class="form-label">{{__('ISBN')}}</label>
                        <input type="text" class="form-control border-primary" name="isbn" value="{{old('isbn')}}" pattern="^\d{13}$" required placeholder="Ingrese el ISBN de 13 dígitos">
                        <small class="text-danger fst-italic">{{ $errors->first('isbn') }}</small>
                    </div>

                    <!-- Campo Título -->
                    <div class="mb-3">
                        <label for="titulo" class="form-label">{{__('Título')}}</label>
                        <input type="text" class="form-control border-primary" name="titulo" value="{{old('titulo')}}" maxlength="150" required placeholder="Ingrese el título (máximo 150 caracteres)">
                        <small class="text-danger fst-italic">{{ $errors->first('titulo') }}</small>
                    </div>

                    <!-- Campo Páginas -->
                    <div class="mb-3">
                        <label for="paginas" class="form-label">{{__('Páginas')}}</label>
                        <input type="number" class="form-control border-primary" name="paginas" value="{{old('paginas')}}" min="1" required placeholder="Número de páginas">
                        <small class="text-danger fst-italic">{{ $errors->first('paginas') }}</small>
                    </div>

                    <!-- Campo Año -->
                    <div class="mb-3">
                        <label for="anio" class="form-label">{{__('Año')}}</label>
                        <input type="number" class="form-control border-primary" name="anio" value="{{old('anio')}}" min="1000" max="{{date('Y')}}" required placeholder="Año de publicación">
                        <small class="text-danger fst-italic">{{ $errors->first('anio') }}</small>
                    </div>

                    <!-- Campo Email de Editorial -->
                    <div class="mb-3">
                        <label for="emailEditorial" class="form-label">{{__('Email de Editorial')}}</label>
                        <input type="email" class="form-control border-primary" name="emailEditorial" value="{{old('emailEditorial')}}" required placeholder="correo@editorial.com">
                        <small class="text-danger fst-italic">{{ $errors->first('emailEditorial') }}</small>
                    </div>

                    <!-- Botón Guardar -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold btn-interactivo">{{__('Guardar libro')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pie de Página -->
<footer style="position: fixed; bottom: 0; width: 100%; text-align: center; padding: 10px; background-color: #f1f1f1;">
    <p>Biblioteca los JAMMI &copy; {{ date('d M Y') }}</p>
</footer>

@endsection
