<!DOCTYPE html>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container col-md-5 col-lg-8">

        @if(session('exito'))
        <script>
            alertify.set('notifier','position', 'top-right');
            alertify.success("¡Se ha registrado exitosamente!");
        </script>
        @endif
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>formulario xd</title>
    </head>
    <body>
    <p class="mt-4 text-sm/relaxed"> Registro de prendas</p>
    <br>
    <div class="mb-3">
                        <label for="prenda" class="form-label">{{__('Prenda')}}</label>
                        <input type="text" class="form-control border-primary" name="prenda" value="{{old('prenda')}}" maxlength="150" required placeholder="Ingrese la prenda">
                        <small class="text-danger fst-italic">{{ $errors->first('prenda') }}</small>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="Color" class="form-label">{{__('Color')}}</label>
                        <input type="text" class="form-control border-primary" name="Color" value="{{old('Color')}}" maxlength="150" required placeholder="Ingrese el colo">
                        <small class="text-danger fst-italic">{{ $errors->first('Color') }}</small>
                    </div>
                    <br>
    <div class="mb-3">
                        <label for="num" class="form-label">{{__('Ingrese la cantidad de prendas')}}</label>
                        <input type="text" class="form-control border-primary" name="num" value="{{old('num')}}" pattern="^\d{}$" required placeholder="Ingrese la cantidad">
                        <small class="text-danger fst-italic">{{ $errors->first('num') }}</small>
                    </div>
                    <br>
                    <!-- Botón Guardar -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary btn-lg fw-bold btn-interactivo">{{__('Guardar prenda')}}</button>
                    </div>
    </body>
    </html>