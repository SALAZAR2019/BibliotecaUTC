<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejemplares extends Model
{
    use HasFactory;
    protected $table="ejemplares";
    protected $primaryKey="id_ejemplar";
    public $timestamps=false;

    protected $with=['libros'];

    protected $fillable=
    [
        'id_ejemplar',
        'ISBN',
        'prestado',
        'id_libro',
        'activo'
    ];
    public function libros(){
        return $this-> belongsTo(Libros::class,'id_libro');
    }
}
