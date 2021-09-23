<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipos_usuarios;

class ApiTiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $tipo= Tipos_usuarios::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_tipo' => 'required'
        ]); 

        $tipo = new Tipos_usuarios;
        $tipo->nombre_tipo=$request->get('nombre_tipo');
        $tipo->descripcion=$request->get('descripcion');

        $tipo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $tipo=Tipos_usuarios::find($id);
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
        $request->validate([
            'nombre_tipo' => 'required'
        ]); 
        $tipo = Tipos_usuarios::find($id);

        $tipo->nombre_tipo = $request->get('nombre_tipo');
        $tipo->descripcion = $request->get('descripcion');
        
        $tipo->update();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo= Tipos_usuarios::destroy($id);
    }
}
