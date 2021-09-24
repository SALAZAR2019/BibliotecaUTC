<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaController extends Model
{
    use HasFactory;
    protected $table="materias";
    protected $primaryKey="id_materia";
    public $timestamps=false;

    protected $fillable=
    [
        'id_materia',
        'nom_materia',
        'activo',
    ];
}
