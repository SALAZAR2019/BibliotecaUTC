<?php

namespace App\Http\Controllers;
use App\Mail\automail;

use Illuminate\Http\Request;
use App\Models\Prestamos;

use Carbon\Carbon;

use DB;
use Mail;


class autosend extends Controller
{
    //
    public function send()
    {
        $Users = DB::table('prestamos as a')
        ->join('usuarios as b','a.id_usuario','=','b.id_usuario')
        ->select('folio','titulo','correo','fecha_devolucion')
        ->where('estado_prestamo',1)
        ->get();
        //return $Users;
        //$Users=Prestamos::all();

        $date = Carbon::now()->format('Y-m-d');

        
        foreach($Users as $user){
            if($user->fecha_devolucion<$date){
                Mail::to($user->correo)->send(new automail($user));
            }
        }
        
        
        //$User=DB::table('usuarios')->where('id_usuario','=',$usuario)->select('correo')->first();

        //Mail::to($User->correo)->send(new Sendemail);
    }
}
