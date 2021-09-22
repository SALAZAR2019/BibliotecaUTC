<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditorialController extends Model
{
    use HasFactory;
    protected $table="editoriales";
    protected $primaryKey="id_editorial";
    public $timestamps=false;

    protected $fillable=
    [
        'id_editorial',
        'nom_editorial',
        'activo',
    ];
}
