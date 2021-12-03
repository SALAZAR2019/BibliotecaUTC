<?php

namespace App\Http\Controllers;
use App\Models\EditorialController;
use Illuminate\Http\Request;

class ApiEditorialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['editoriales']=EditorialController::paginate(2);
        return view('editorial.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('editorial.create');
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
            'nom_editorial'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosEditorial = request()->except('_token');
        EditorialController::insert($datosEditorial);
         return redirect('editorial')->with('mensaje','Editorial agregado con éxito');
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
        $editorial=EditorialController::findOrFail($id);
        return view('editorial.edit', compact('editorial') );
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
            'nom_editorial'=>'required|string|max:200',
            //'activo'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);

        $datosEditorial= request()->except(['_token','_method']);

        EditorialController::where('id_editorial','=',$id)->update($datosEditorial);

        return redirect('editorial')->with('mensaje','Editorial Modificado');
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

        EditorialController::destroy($id);

        return redirect('editorial')->with('eliminar','ok');

    }
}
