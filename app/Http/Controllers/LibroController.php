<?php
namespace App\Http\Controllers;
use App\Models\Libro;
use Illuminate\Http\Request;
class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('titulo', 'asc')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $generos = [
            'Aventura', 'Ciencia Ficción', 'Clásico', 'Drama',
            'Fantasía', 'Historia', 'Horror', 'Misterio',
            'Poesía', 'Romance', 'Thriller', 'Terror','No Ficción',
        ];
        return view('libros.create', compact('generos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'genero'           => 'required|string',
            'sinopsis'         => 'required|string',
        ], [
            'titulo.required'           => 'El título es obligatorio.',
            'titulo.max'                => 'El título no puede tener más de 255 caracteres.',
            'autor.required'            => 'El autor es obligatorio.',
            'autor.max'                 => 'El autor no puede tener más de 255 caracteres.',
            'anio_publicacion.required' => 'El año de publicación es obligatorio.',
            'anio_publicacion.integer'  => 'El año debe ser un número entero.',
            'anio_publicacion.digits'   => 'El año debe tener exactamente 4 dígitos.',
            'anio_publicacion.min'      => 'El año no puede ser anterior a 1000.',
            'anio_publicacion.max'      => 'El año no puede ser mayor al año actual.',
            'genero.required'           => 'Debes seleccionar un género.',
            'sinopsis.required'         => 'La sinopsis es obligatoria.',
        ]);

        Libro::create($request->only([
            'titulo', 'autor', 'anio_publicacion', 'genero', 'sinopsis',
        ]));

        return redirect()->route('libros.index')
                         ->with('success', 'Libro registrado exitosamente.');
    }

    public function edit(Libro $libro)
    {
        $generos = [
            'Aventura', 'Ciencia Ficción', 'Clásico', 'Drama',
            'Fantasía', 'Historia', 'Horror', 'Misterio',
            'Poesía', 'Romance', 'Thriller', 'Terror',
        ];
        return view('libros.edit', compact('libro', 'generos'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'           => 'required|string|max:255',
            'autor'            => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'genero'           => 'required|string',
            'sinopsis'         => 'required|string',
        ], [
            'titulo.required'           => 'El título es obligatorio.',
            'titulo.max'                => 'El título no puede tener más de 255 caracteres.',
            'autor.required'            => 'El autor es obligatorio.',
            'autor.max'                 => 'El autor no puede tener más de 255 caracteres.',
            'anio_publicacion.required' => 'El año de publicación es obligatorio.',
            'anio_publicacion.integer'  => 'El año debe ser un número entero.',
            'anio_publicacion.digits'   => 'El año debe tener exactamente 4 dígitos.',
            'anio_publicacion.min'      => 'El año no puede ser anterior a 1000.',
            'anio_publicacion.max'      => 'El año no puede ser mayor al año actual.',
            'genero.required'           => 'Debes seleccionar un género.',
            'sinopsis.required'         => 'La sinopsis es obligatoria.',
        ]);

        $libro->update($request->only([
            'titulo', 'autor', 'anio_publicacion', 'genero', 'sinopsis',
        ]));

        return redirect()->route('libros.index')
                         ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')
                         ->with('success', 'Libro eliminado correctamente.');
    }
}