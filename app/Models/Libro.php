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

    public function editoriales()
    {
        return $this->belongsTo(EditorialController::class, 'id_editorial');
    }

    public function autores()
    {
        return $this->belongsTo(AutorController::class, 'id_autor', 'id_autor');
    }
}
