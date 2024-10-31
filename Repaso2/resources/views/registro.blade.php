@extends('layouts.app')

@section('content')
    <h1>Registro de Libro</h1>
    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ old('isbn') }}" required>
            @error('isbn')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
            @error('titulo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor') }}" required>
            @error('autor')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Páginas</label>
            <input type="number" name="paginas" class="form-control" value="{{ old('paginas') }}" required>
            @error('paginas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" value="{{ old('anio') }}" required>
            @error('anio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Editorial</label>
            <input type="text" name="editorial" class="form-control" value="{{ old('editorial') }}" required>
            @error('editorial')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label>Email de Editorial</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

@push('scripts')
    @if(session('status') == 'success')
        <script>alertify.success("Todo correcto: Libro \"{{ session('libro_titulo') }}\" guardado");</script>
    @endif
@endpush
