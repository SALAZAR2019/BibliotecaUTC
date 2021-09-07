<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_login;

class ControllerUser_login extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $users= User_login::all();
        
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
        $user = new User_login;
        $user->nombres=$request->get('nombres');
        $user->apellidos=$request->get('apellidos');
        $user->rol_puesto=$request->get('rol_puesto');
        $user->usuario=$request->get('usuario');
        $user->password=$request->get('password');
        // $user->activo=$request->get('activo');

        $user->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $users = User_login::find($id);
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
        // $user = new User_login;
        $user = User_login::find($id);

        $user->nombres=$request->get('nombres');
        $user->apellidos=$request->get('apellidos');
        $user->rol_puesto=$request->get('rol_puesto');
        $user->usuario=$request->get('usuario');
        $user->password=$request->get('password');
        // $user->activo=$request->get('activo');

        $user->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User_login::destroy($id);
    }
}
