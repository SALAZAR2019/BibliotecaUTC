<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_login;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cache;

class AccesoController extends Controller
{
    public function validar(Request $request)
    {
        //usuario y password son los name del formulario login
        $user = $request->get('usuario');
        $contraseña = $request->get('password');

        $ingresar = User_login::where('usuario','=', $user)
        ->where('password','=', $contraseña)
        ->first();

        if (!empty($ingresar))
        {
            $rol=$ingresar->rol_puesto;
            $nombre = $ingresar->nombres;
            $ape=$ingresar->apellidos;
            Session::put('nombre', $nombre);
            Session::put('rol', $rol);
            Session::put('ap',$ape);

            if ($rol == 'Bibliotecario'){
                return redirect('prestamo');
            }else {
                return redirect('user');
            }
        }else {
            return redirect('login');
        }
    }
    public function salir()
    {
        Session::flush();
        Session::reflash();
        Cache::flush();
        unset($_SESSION);
        return Redirect::to('login');
    }
}
