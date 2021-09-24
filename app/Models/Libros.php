<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    //
    use HasFactory;
    protected $table='libros';
    protected $primaryKey='id_libro';

    public $timestamps=false;
    public $incrementing=false;



    public $fillable=[
    'id_libro',
    'codigo',
    'ISBN',
    'titulo',
    'autor',
    'edicion',
    'editorial',
    'paginas',
    'idioma',
    'ejemplar_total',
    'descripcion',
    'ubicacion',
    'foto',
    'activo',
    'created_at',
    'updated_at',
    // 'id_carrera',
    // 'id_materia',
   
    ];
    
}
