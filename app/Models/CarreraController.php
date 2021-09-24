<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraController extends Model
{
    use HasFactory;
    protected $table="carreras";
    protected $primaryKey="id_carrera";
    public $timestamps=false;

    protected $fillable=
    [
        'id_carrera',
        'nom_carrera',
        'activo',
    ];
}
