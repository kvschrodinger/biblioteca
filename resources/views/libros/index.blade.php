{{-- Extiende el layout principal --}}
@extends('layouts.app')

@section('titulo', 'Catálogo de Libros')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="bi bi-journal-bookmark-fill"></i> Catálogo de Libros</h2>
    {{-- Botón para ir al formulario de registro --}}
    <a href="{{ route('libros.create') }}" class="btn btn-dark">
        <i class="bi bi-plus-circle"></i> Nuevo Libro
    </a>
</div>

{{-- Verifica si hay libros registrados --}}
@if($libros->isEmpty())
    <div class="alert alert-info text-center">
        <i class="bi bi-info-circle"></i>
        No hay libros registrados aún. ¡Agrega el primero!
    </div>
@else
    {{-- Tabla responsiva con todos los libros --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Género</th>
                    <th>Sinopsis</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                {{-- Itera sobre cada libro y crea una fila --}}
                @foreach($libros as $libro)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>
                        
                        <span class="badge bg-secondary">{{ $libro->genero }}</span>
                    </td>
                    
                    <td>
                        {{ $libro->sinopsis }}
                    </td>
                   
                    <td class="text-center">
                        {{-- Botón Editar --}}
                        <a href="{{ route('libros.edit', $libro) }}"
                           class="btn btn-sm btn-warning me-1">
                            <i class="bi bi-pencil-square"></i> Editar
                        </a>

                        {{-- Formulario de eliminación (requiere POST con método DELETE) --}}
                        <form action="{{ route('libros.destroy', $libro) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                            @csrf
                            @method('DELETE') {{-- Spoof del método HTTP --}}
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash3"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection