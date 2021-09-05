<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devoluciones extends Model
{
    use HasFactory;
    protected $table="devoluciones";
    protected $primaryKey="id_devolucion";
    public $timestamps=false;

    protected $fillable=
    [
        'id_devolucion',
        'id_prestamo',
        'id_ejemplar',
        'fecha_regresolibro',
        'fecha_actual',
        'sancion'
    ];
}
