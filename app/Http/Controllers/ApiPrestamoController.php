<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libros;
use App\Models\ejemplares;
use App\Models\Prestamos;
use App\Models\Detalle_prestamo;
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
        return Prestamos::where("estado_prestamo",'=','1')->select('*')->get();

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
        $records=[];

        $detalles=$request->get('detalles');
        $usuario=$request->get('id_usuario');

        for($i=0;$i<count($detalles);$i++)
        {
            $records[]=[
                'folio'=>$request->get('folio'),
                
                'id_usuario'=>$usuario,

                'fecha_prestamo'=>$request->get('fecha_prestamo'),

                'id_ejemplar'=>$detalles[$i]['id_ejemplar']

            ];
            $activo=$detalles[$i]['id_ejemplar'];
            DB::update("UPDATE ejemplares
                        SET activo='0'
                        where id_ejemplar='$activo'");
        }
        if($records!=null){

            Prestamos::insert($records);
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
    }
}
