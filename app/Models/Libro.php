<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table="libros";
    protected $primaryKey="id_libro";
    public $timestamps=false;

    protected $fillable=
    [
        'id_libro',
        'ISBN',
        'titulo',
        'id_autor',
        'id_editorial',
        'edicion',
        'id_carrera',
        'id_materia',
        'id_clasifidewey',
        'paginas',
        'ejemplar_total',
        'resenia',
        'ubicacion',
        'describe_estado',
        'foto',
        'activo',
    ];
}
