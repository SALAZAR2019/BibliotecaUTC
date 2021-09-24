<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MateriaController;
class ApiMateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['materias']=MateriaController::paginate(2);
        return view('materia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('materia.create');
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
            'nom_materia'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosMateria = request()->except('_token');
        MateriaController::insert($datosMateria);
         return redirect('materia')->with('mensaje','materia agregado con éxito');
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
        $materia=MateriaController::findOrFail($id);
        return view('materia.edit', compact('materia') );
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
            'nom_materia'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosMateria= request()->except(['_token','_method']);

        MateriaController::where('id_materia','=',$id)->update($datosMateria);

        return redirect('materia')->with('mensaje','materia Modificada');
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
        MateriaController::destroy($id);
            
        return redirect('materia')->with('mensaje','materia Borrada con exito');
    }
}
