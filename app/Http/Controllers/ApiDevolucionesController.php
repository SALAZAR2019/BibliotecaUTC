<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Models\devoluciones;
use App\Models\ejemplares;
use DB;

class ApiDevolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $prestamos = Prestamos::where("estado_prestamo",'=','1')->paginate(6);

        return[
            'pagination'=>[
                'total' => $prestamos->total(),
                'current_page' => $prestamos->currentpage(),
                'per_page' => $prestamos->perpage(),
                'last_page' => $prestamos->lastpage(),
                'from' => $prestamos->firstItem(),
                'to'=>$prestamos->lastItem(),
            ],
            'prestamos'=> $prestamos
        ];
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
        $devolucion=new devoluciones;
        
        $devolucion->id_ejemplar=$request->get('id_ejemplar');
        $devolucion->id_prestamo=$request->get('id_prestamo');
        $devolucion->fecha_regresolibro=$request->get('fecha_prestamo');
        $devolucion->fecha_actual=$request->get('fecha_actual');
        $activo=$request->get('id_ejemplar');
        
        DB::update("UPDATE ejemplares
        SET prestado ='1'
        where codigo='$activo'");

        $pres=$request->get('id_prestamo');

        DB::update("UPDATE prestamos
        SET estado_prestamo='0'
        where id_prestamo='$pres'");
        
        $devolucion->save();
        
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
        $libro=Prestamos::find($id);
        return $libro;
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
