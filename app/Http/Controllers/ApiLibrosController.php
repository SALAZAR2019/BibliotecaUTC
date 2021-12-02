<?php

namespace App\Http\Controllers;
use App\Models\Libro;
use App\Models\CarreraController;
use App\Models\MateriaController;
use App\Models\ejemplares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ApiLibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $titulo =$request->get('buscarpor');

        $carreras= CarreraController::all();
        $materias = MateriaController::all();
        $datos['libros']=Libro::where('titulo','like',"%$titulo%")->paginate(5);
        return view('libro.index',$datos, compact('carreras','materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $carreras= CarreraController::all();
        $materias = MateriaController::all();
        return view('libro.create', compact('carreras','materias'));
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
            'ISBN'=>'required|string|max:200',
            'titulo'=>'required|string|max:150',
            'autor'=>'required|string|max:300',
            'editorial'=>'required|string|max:300',
            'edicion'=>'required|string|max:80',
            'id_carrera'=>'required|string|max:11',
            'id_clasifidewey'=>'required|string|max:11',
            'paginas'=>'required|string|max:20',
            'ejemplares'=>'required|string|max:11',
            // 'resenia'=>'required|string|max:900',
            'ubicacion'=>'required|string|max:90',
            'describe_estado'=>'required|string|max:900',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request() ->all();
        $datosLibro = request()->except('_token');



        if($request->hasFile('foto')) {
            $datosLibro['foto']=$request->file('foto')->store('uploads','public');
        }
        Libro::insert($datosLibro);

        $resenia=$request->get('resenia');
        $titulo=$request->get('titulo');
        $fecha_alta = Carbon::now();

        $ISBN = $request->get('ISBN');
        $ejemplares=$request->get('ejemplares');
        //$ejemplares=[];
        for($i=0;$i<($ejemplares);$i++)
        {
            $ejemplar[]=[
                //'id_ejemplar'=>$ejemplares,
                'codigo'=>$ISBN+$i,
                'ISBN'=>$ISBN,
                'titulo'=>$titulo,
                'descripcion'=>$resenia,
                'fecha_alta'=>$fecha_alta

            ];

        }
        ejemplares::insert($ejemplar);

        //return response()->json($ejemplar);
         return redirect('libro')->with('mensaje','Libro agregado con éxito');
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
        $carreras= CarreraController::all();
        $materias = MateriaController::all();
        $libro=Libro::findOrFail($id);
        return view('libro.edit', compact('libro', 'carreras','materias') );
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
            'ISBN'=>'required|string|max:200',
            'titulo'=>'required|string|max:150',
            'autor'=>'required|string|max:300',
            'editorial'=>'required|string|max:300',
            'edicion'=>'required|string|max:80',
            'id_carrera'=>'required|string|max:11',
            'id_clasifidewey'=>'required|string|max:11',
            'paginas'=>'required|string|max:20',
            'ejemplares'=>'required|string|max:11',
            // 'resenia'=>'required|string|max:900',
            'ubicacion'=>'required|string|max:90',
            'describe_estado'=>'required|string|max:900',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        if($request->hasFile('foto')) {
            $campos=[ 'foto'=>'required|max:10000|mimes:jpeg,png,jpg' ];
            $mensaje=[ 'foto.required'=>'La foto es requerida' ];
        }

        $this->validate($request, $campos, $mensaje);


        $datosLibro= request()->except(['_token','_method']);

        if($request->hasFile('foto')) {
            $libro=Libro::findOrFail($id);
            Storage::delete('public/'.$libro->foto);
            $datosLibro['foto']=$request->file('foto')->store('uploads','public');
        }

        Libro::where('ISBN','=',$id)->update($datosLibro);

        $libro=Libro::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );
        return redirect('libro'
        )->with('mensaje','Libro Modificado');
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
        $libro=Libro::findOrFail($id);
        if(Storage::delete('public/'.$libro->foto)){
        Libro::destroy($id);
        }
        return redirect('libro')->with('mensaje','Libro Borrado');
    }
}
