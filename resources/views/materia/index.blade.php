@extends('layout.master')
@section('contenido')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"> &times;</span>
</button>
</div>
@endif

<br><br>
<a href="{{ url('materia/create') }}" class="btn btn-success">Registrar nueva materia</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Materia</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $materias as $materia )
        <tr>
            <td>{{ $materia -> id_materia}}</td>
            <td>{{ $materia -> nom_materia}}</td>
            <td>{{ $materia -> activo}}</td>
            <td>
            <a href="{{ url('/materia/'.$materia->id_materia.'/edit' ) }}" class="btn btn-primary" >
            Editar
            </a>

            <form action="{{ url ('/materia/'.$materia->id_materia ) }}" method="post" class="d-inline ">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $materias->links()!!}
</div>
@endsection