<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $usuarios=Usuarios::all();
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
            'id_usuario'=>'required',
            'nombres'=>'required',
            'apellido_p'=>'required',
            'apellido_m'=>'required',
            'direccion'=>'required',
            'correo'=>'required',
            'telefono'=>'required',
            'id_tipo'=>'required'
        ]);
        $usuario= new Usuarios;
        $usuario->id_usuario=$request->get('id_usuario');
        $usuario->nombres=$request->get('nombres');
        $usuario->apellido_p=$request->get('apellido_p');
        $usuario->apellido_m=$request->get('apellido_m');
        $usuario->direccion=$request->get('direccion');
        $usuario->correo=$request->get('correo');
        $usuario->telefono=$request->get('telefono');
        $usuario->id_tipo=$request->get('id_tipo');

        $usuario->save();
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
        $usuarios=Usuarios::where('activo','=','1')->find($id);
        return $usuarios;
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
            'id_usuario'=>'required',
            'nombres'=>'required',
            'apellido_p'=>'required',
            'apellido_m'=>'required',
            'direccion'=>'required',
            'correo'=>'required',
            'telefono'=>'required',
            'id_tipo'=>'required'
        ]);
        $usuario= Usuarios::find($id);

        $usuario->id_usuario=$request->get('id_usuario');
        $usuario->nombres=$request->get('nombres');
        $usuario->apellido_p=$request->get('apellido_p');
        $usuario->apellido_m=$request->get('apellido_m');
        $usuario->direccion=$request->get('direccion');
        $usuario->correo=$request->get('correo');
        $usuario->telefono=$request->get('telefono');
        $usuario->id_tipo=$request->get('id_tipo');
        $usuario->update();

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=Usuarios::delete($id);
    }
}
