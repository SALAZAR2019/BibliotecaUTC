<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_login extends Model
{
    use HasFactory;
    protected $table="user_login";
    protected $primaryKey="id_userlogin";

    protected $fillable=[
        'nombres',
        'apellidos',
        'rol_puesto',
        'usuario',
        'password',
        'activo'
    ];

}
