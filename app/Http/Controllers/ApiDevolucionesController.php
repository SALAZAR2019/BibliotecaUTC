<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamos;
use App\Models\devoluciones;
use DB;

class ApiDevolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $prestamos=Prestamos::all();
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
        $activo=$request->get('id_ejemplar');
        
        DB::update("UPDATE ejemplares
        SET activo='1'
        where id_ejemplar='$activo'");

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
