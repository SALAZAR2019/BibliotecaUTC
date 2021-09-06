<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoController extends Model
{
    use HasFactory;
    protected $table="empleados";
    protected $primaryKey="id_e";
    public $timestamps=false;

    protected $fillable=
    [
        'id_e',
        'nombre',
        'apellidop',
        'apellidom',
        'correo',
        'foto'
    ];
}
