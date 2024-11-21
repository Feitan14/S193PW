@extends('layouts.plantilla')

@section('contenido')

@section('contenido')

@if(session('exito'))
    <script>
        Swal.fire({
            title:"¡Exito!",
            text: "{{{session('exito')}}}",
            icon: "success",
            confirmButtonText: "Aceptar",
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            title:"¡Error!",
            text: "{{{session('error')}}}",
            icon: "error",
            confirmButtonText: "Aceptar",
        });
        </script>
    @endif


    {{-- Inicia tarjetaCliente --}}
    <div class="container mt-5 col-md-8">

    @foreach ($consultaclientes as $cliente)
    

        <div class="card text-justify font-monospace mt-4">

            <div class="card-header fs-5 text-primary">
                {{$cliente->nombre}}
            </div>

            <div class="card-body">
                <h5 class="fw-bold"> {{$cliente->correo}} </h5>
                <h5 class="fw-medium"> {{$cliente->telefono}} </h5>
                <p class="card-text fw-lighter"> </p>
            </div>

            <div class="card-footer text-muted d-flex justify-content-between">
                <a  href="{{route('rutaEdit',  $cliente->id)}}" class="btn btn-warning btn-sm">{{__('Editar')}} </a>

                {{--formulario para eliminar clientes --}}
                <form action="{{route('rutaEliminar', $cliente->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de eliminar este cliente?')">{{__('Eliminar')}} </button>
                </form>
            {{-- fin del formulario --}}
            
            </div>
        </div>

        @endforeach
        {{-- Finaliza tarjetaCliente --}}

    </div>
    {{-- divcontainer --}}

@endsection