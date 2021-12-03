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
        ],
        [
            'id_usuario.required' =>'La credencial requiere 10 dígitos *',
            'nombres.required' => 'El campo nombre es requerido *',
            'apellido_p.required' => 'El campo apellido paterno es requerido *',
            'apellido_m.required' => 'El campo apellido paterno es requerido *',
            'direccion.required' => 'El campo dirección es requerido *',
            'correo.required' => 'El campo correo es requerido *',
            'telefono.required' => 'El campo teléfono es requerido *',
            'id_tipo.required' => 'Debe seleccionar un tipo de usuario'


        ],
    );
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
        ],
        [
            'id_usuario.required' =>'La credencial requiere 10 d+igitos *',
            'nombres.required' => 'El campo nombre es requerido *',
            'apellido_p.required' => 'El campo apellido paerno es requerido *',
            'apellido_m.required' => 'El campo apellido paerno es requerido *',
            'direccion.required' => 'El campo dirección es requerido *',
            'correo.required' => 'El campo correo es requerido *',
            'telefono.required' => 'El campo teléfono es requerido *',
            'id_tipo.required' => 'Debe seleccionar un tipo de usuario'
  
  
          ],  
        );
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
        $usuario=Usuarios::destroy($id);
    }
}
