<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('libros', function (Blueprint $table) {
        $table->id(); // Clave primaria autoincremental

        $table->string('titulo');           // Título del libro
        $table->string('autor');            // Nombre del autor
        $table->integer('anio_publicacion'); // Año de 4 dígitos
        $table->string('genero');           // Género literario
        $table->text('sinopsis');           // Sinopsis del libro

        $table->timestamps(); // created_at y updated_at automáticos
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
