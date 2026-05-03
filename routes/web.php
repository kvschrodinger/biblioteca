<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

// Ruta principal: redirige a la lista de libros
Route::get('/', function () {
    return redirect()->route('libros.index');
});

// Ruta para mostrar el formulario de registro
Route::get('/libros/crear', [LibroController::class, 'create'])->name('libros.create');

// Ruta para guardar un libro nuevo (POST)
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');

// Ruta para listar todos los libros
Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');

// Ruta para mostrar el formulario de edición
Route::get('/libros/{libro}/editar', [LibroController::class, 'edit'])->name('libros.edit');

// Ruta para actualizar un libro (PUT)
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');

// Ruta para eliminar un libro (DELETE)
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');