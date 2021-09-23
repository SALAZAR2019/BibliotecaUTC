<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_usuarios extends Model
{
    use HasFactory;
    protected $table="tipos_usuarios";
    protected $primaryKey = "id_tipo";
    public $timestamps = false;

    protected $fillable = [
        'nombre_tipo',
        'descripcion',
    ];

}
