<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use App\Models\ejemplares;
use App\Models\Libros;
use DB;

class ApiEjemplaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return libros::all();
        return $ejemplar=ejemplares::all();
        
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
        $ejemplar= new ejemplares;
        $ejemplar->codigo=$request->get('codigo');
        $ejemplar->save();
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
        $libro=ejemplares::where('prestado','=','1')->find($id);
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
        $ejemplar=ejemplares::find($id);
        $ejemplar->codigo=$request->get('codigo');
        $ejemplar->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = DB::table('Libros as a')
        ->join('ejemplares as b','a.ISBN','=','b.ISBN')
        ->select('b.activo')
        ->where('b.id_ejemplar','=',$id)
        ->first();

        $cant = DB::table('Libros as a')
        ->join('ejemplares as b','a.ISBN','=','b.ISBN')
        ->select('a.ejemplares')
        ->where('b.id_ejemplar','=',$id)
        ->first();
        
        $datos = DB::table('Libros as a')
        ->join('ejemplares as b','a.ISBN','=','b.ISBN')
        ->select('a.ISBN')
        ->where('b.id_ejemplar','=',$id)
        ->get();
        foreach($datos as $dato){
            $ids =$dato->ISBN;

        }
        $ISBN = $ids;
        DB::update("UPDATE libros
            SET ejemplares=ejemplares-1 
            where ISBN ='$ISBN'"
            );

            $ejemplar= ejemplares::destroy($id);
    }
}
