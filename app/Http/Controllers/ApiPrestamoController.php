<?php

namespace App\Http\Controllers;


use App\Mail\Sendemail;

use Illuminate\Http\Request;
use Illuminate\Support\collection;

use Mail;

use App\Models\Libro;
use App\Models\ejemplares;
use App\Models\Prestamos;
use App\Models\Detalle_prestamo;
use Carbon\Carbon;
use DB;

class ApiPrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$prestamos = DB::table('prestamos as a')
        //->join('detalle_prestamo as b','a.folio','=','b.folio')
        //->select('b.folio')
        //->groupBy('b.folio')
        //->get();
        //return $prestamos;
        $libros = DB::table('Libros as a')
        ->join('ejemplares as b','a.ISBN','=','b.ISBN')
        ->select('a.titulo','a.ISBN','b.prestado','b.codigo')
        ->where('b.prestado','=','1')
        ->get();
        return $libros;
        //return $libros=ejemplares::all();
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$records=[];

        $detalles=$request->get('newdetalles');
        $usuario=$request->get('id_usuario');
        $folio=$request->get('folio');

        $endDate = Carbon::now()->addDay(3)->format('Y-m-d');

        $User=DB::table('usuarios')->where('id_usuario','=',$usuario)->select('correo')->first();
        for($i=0;$i<count($detalles);$i++)
        {
            $records[]=[
                'folio'=>$request->get('folio'),

                'id_usuario'=>$request->get('id_usuario'),

                'fecha_prestamo'=>$request->get('fecha_prestamo'),

                'ISBN'=>$detalles[$i]['ISBN'],

                'titulo'=>$detalles[$i]['titulo'],

                'id_ejemplar'=>$detalles[$i]['codigo'],

                'fecha_devolucion'=>$endDate,

                

            ];
            $activo=$detalles[$i]['codigo'];
            $ejemplar=DB::table('ejemplares')->select('id_ejemplar')->where('ISBN','=',$activo)->Where('prestado','=','1')->limit(1)->get();
            
            
            DB::update("UPDATE ejemplares
            SET prestado='0'
            where codigo ='$activo'"
            );
        }
        $id=$activo;  

    if($records!=null){
           Prestamos::insert($records);
            //Mail::to($User->correo)->send(new Sendemail($detalles,$usuario,$folio,$endDate));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $prestamos=prestamos::where('estado_prestamo','=','1')->find($id);
        return $prestamos;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $prestamos=Prestamos::destroy($id);
    }
}
