@extends('layouts.plantilla')
@section('titulo','Recuperación de contraseña')
@section('contenido')

@if (session('status'))
    <script>
        Swal.fire({
            title: '{!! session('status') !!}',
            icon: 'success'
        });
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            title: '¡Error!',
            text: '{{ $errors->first() }}',
            icon: 'error'
        });
    </script>
@endif

<x-card-form title="{{__('Recuperar contraseña')}}">
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label">{{ __('Correo Electrónico') }}</label>
            <input type="email" class="form-control" id="correo" name="email" value="{{ old('email') }}" required>
            <small class="text-danger fst-italic">{{ $errors->first('email') }}</small>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">{{ __('Recuperar Contraseña') }}</button>
        </div>
    </form>
</x-card-form>

@endsection