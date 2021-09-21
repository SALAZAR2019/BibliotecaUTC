<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutorController;
class ApiAutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['autores']=AutorController::paginate(2);
        return view('autor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('autor.create');
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
            'nom_autor'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosAutor = request()->except('_token');
        AutorController::insert($datosAutor);
         return redirect('autor')->with('mensaje','Autor agregado con éxito');
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
        $autor=AutorController::findOrFail($id);
        return view('autor.edit', compact('autor') );
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
            'nom_autor'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosAutor= request()->except(['_token','_method']);

        AutorController::where('id_autor','=',$id)->update($datosAutor);

        return redirect('autor')->with('mensaje','Autor Modificado');
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
        AutorController::destroy($id);
            
        return redirect('autor')->with('mensaje','Autor Borrada con exito');
    }
}
