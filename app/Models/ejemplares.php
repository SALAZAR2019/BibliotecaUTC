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
    public $incrementing=false;
    public $keyType = 'string';
    protected $with=['libros'];

    protected $fillable=
    [
        // 'id_ejemplar',
        'codigo',
        'titulo',
        'ISBN',
        'prestado',
        'descripcion',
        // 'activo'
    ];
    // function libros(){
    //    return $this-> belongsTo(Libro::class,'ISBN');
    //}
    public function libros()
    {
        return $this->belongsTo(Libro::class,'ISBN','ISBN');
    }
}
