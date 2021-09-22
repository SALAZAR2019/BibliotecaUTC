@extends('layouts.app')
@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"> &times;</span>
</button>
</div>
@endif


<a href="{{ url('libro/create') }}" class="btn btn-success">Registrar nuevo Libro</a>
<br><br>
<table class="table table-light table-responsive">
    <thead class="thead-light">
        <tr>
            
            <th>ISBN</th>
            <th>FOTO</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Edicion</th>
            <th>Carrera</th>
            <th>Materia</th>
            <th>Dewey</th>
            <th>Paginas</th>
            <th>Ejemplar</th>
            <th>Resenia</th>
            <th>Ubicacion</th>
            <th>Estado del libro</th>
            <th>Activo</th>
            <th>Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach( $libros as $libro )
        <tr>
            <td>{{ $libro -> ISBN}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$libro -> foto }}" height="100" width="200" alt="50"> 
            </td>
            <td>{{ $libro -> titulo}}</td>
            <td>{{ $libro -> id_autor}}</td>
            <td>{{ $libro -> id_editorial}}</td>
            <td>{{ $libro -> edicion}}</td>
            <td>{{ $libro -> id_carrera}}</td>
            <td>{{ $libro -> id_materia}}</td>
            <td>{{ $libro -> id_clasifidewey}}</td>
            <td>{{ $libro -> paginas}}</td>
            <td>{{ $libro -> ejemplar_total}}</td>
            <td>{{ $libro -> resenia}}</td>
            <td>{{ $libro -> ubicacion}}</td>
            <td>{{ $libro -> describe_estado}}</td>
            <td>{{ $libro -> activo}}</td>
            <td>

            <a href="{{ url('/libro/'.$libro->ISBN.'/edit' ) }}" class="btn btn-warning" >
            Editar
            </a>
|
            <form action="{{ url ('/libro/'.$libro->ISBN ) }}" method="post" class="d-inline ">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $libros->links()!!}
</div>
@endsection