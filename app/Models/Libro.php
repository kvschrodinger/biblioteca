<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // Campos que se pueden llenar masivamente (evita MassAssignmentException)
    protected $fillable = [
        'titulo',
        'autor',
        'anio_publicacion',
        'genero',
        'sinopsis',
    ];
}