{{-- Extiende el layout principal --}}
@extends('layouts.app')

@section('titulo', 'Editar Libro')

@section('contenido')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Editar Libro</h4>
            </div>
            <div class="card-body">

                {{-- Formulario que envía datos al método update usando PUT --}}
                <form action="{{ route('libros.update', $libro) }}" method="POST">
                    @csrf
                    @method('PUT') {{-- Necesario para que Laravel lo trate como PUT --}}

                    {{-- Campo: Título (pre-llenado con el valor actual) --}}
                    <div class="mb-3">
                        <label for="titulo" class="form-label fw-semibold">Título</label>
                        <input type="text"
                               class="form-control @error('titulo') is-invalid @enderror"
                               id="titulo"
                               name="titulo"
                               value="{{ old('titulo', $libro->titulo) }}">
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Autor --}}
                    <div class="mb-3">
                        <label for="autor" class="form-label fw-semibold">Autor</label>
                        <input type="text"
                               class="form-control @error('autor') is-invalid @enderror"
                               id="autor"
                               name="autor"
                               value="{{ old('autor', $libro->autor) }}">
                        @error('autor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Año de publicación --}}
                    <div class="mb-3">
                        <label for="anio_publicacion" class="form-label fw-semibold">
                            Año de Publicación
                        </label>
                        <input type="number"
                               class="form-control @error('anio_publicacion') is-invalid @enderror"
                               id="anio_publicacion"
                               name="anio_publicacion"
                               value="{{ old('anio_publicacion', $libro->anio_publicacion) }}"
                               min="1000"
                               max="{{ date('Y') }}">
                        @error('anio_publicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Género con el valor actual preseleccionado --}}
                    <div class="mb-3">
                        <label for="genero" class="form-label fw-semibold">Género</label>
                        <select class="form-select @error('genero') is-invalid @enderror"
                                id="genero"
                                name="genero">
                            <option value="">-- Selecciona un género --</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero }}"
                                    {{-- Compara el género actual del libro con la opción --}}
                                    {{ old('genero', $libro->genero) == $genero ? 'selected' : '' }}>
                                    {{ $genero }}
                                </option>
                            @endforeach
                        </select>
                        @error('genero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Sinopsis --}}
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label fw-semibold">Sinopsis</label>
                        <textarea class="form-control @error('sinopsis') is-invalid @enderror"
                                  id="sinopsis"
                                  name="sinopsis"
                                  rows="4">{{ old('sinopsis', $libro->sinopsis) }}</textarea>
                        @error('sinopsis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Botones de acción --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Libro
                        </button>
                        <a href="{{ route('libros.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@endsection