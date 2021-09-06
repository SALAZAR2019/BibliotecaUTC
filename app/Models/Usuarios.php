<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected $primaryKey="id_usuario";
    public $timestamps=false;

    protected $fillable=
    [
        'id_usuario',
        'cedula_matricula',
        'nombre',
        'apellido_p',
        'apellido_m',
        'usuario',
        'password',
    ];

}
