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
        return ejemplares::all();
        /*$libros = DB::table('Libros as a')
        ->join('ejemplares as b','a.ISBN','=','b.ISBN')
        ->select('titulo','b.id_ejemplar')
        ->get();
        return $libros;*/
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
        $libro=ejemplares::where('Activo','=','1')->find($id);
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
