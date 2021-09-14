<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected $primaryKey="id_usuario";
    protected $with=['tipo'];
    public $timestamps=false;
    public $incrementing=false;

    protected $fillable=
    [
        'id_usuario',
        'nombres',
        'apellido_p',
        'apellido_m',
        'direccion',
        'correo',
        'telefono',
        'id_tipo'
    ];

    public function tipo(){
        return $this->belongsTo(Tipos_usuarios::class,'id_tipo','id_tipo');
    }

}
