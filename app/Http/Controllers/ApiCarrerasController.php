<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarreraController;
class ApiCarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $datos['carreras']=CarreraController::paginate(2);
        return view('carrera.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('carrera.create');
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
        $campos=[
            'nom_carrera'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosCarrera = request()->except('_token');
        CarreraController::insert($datosCarrera);
         return redirect('carrera')->with('mensaje','carrera agregada con éxito');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $carrera=CarreraController::findOrFail($id);
        return view('carrera.edit', compact('carrera') );
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
        $campos=[
            'nom_carrera'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosCarrera= request()->except(['_token','_method']);

        CarreraController::where('id_carrera','=',$id)->update($datosCarrera);

        return redirect('carrera')->with('mensaje','carrera Modificada');
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
        CarreraController::destroy($id);

        return redirect('carrera')->with('mensaje','carrera Borrada con exito');
    }
}
