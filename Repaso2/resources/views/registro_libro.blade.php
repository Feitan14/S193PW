@extends('layouts.app')

@section('content')
    <h1>Registro de Libro</h1>
    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>ISBN</label>
            <input type="text" name="isbn" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Autor</label>
            <input type="text" name="autor" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Páginas</label>
            <input type="number" name="paginas" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Editorial</label>
            <input type="text" name="editorial" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email de Editorial</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
