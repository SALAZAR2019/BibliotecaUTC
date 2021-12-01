<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table="libros";
    protected $primaryKey="ISBN";
    //protected $with=['carrera'];
    public $timestamps=false;
    public $incrementing=false;

    protected $fillable=
    [
        'editoriales',
        //'id_libro',
        'ISBN',
        'titulo',
        'autor',
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

    public function carreras()
    {
        return $this->belongsTo(CarreraController::class, 'id_carrera');
    }

    public function materias()
    {
        return $this->belongsTo(MateriaController::class, 'id_materia');
    }
}
