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
<a href="{{ url('autor/create') }}" class="btn btn-success">Registrar nuevo Autor</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Autor</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $autores as $autor )
        <tr>
            <td>{{ $autor -> id_autor}}</td>
            <td>{{ $autor -> nom_autor}}</td>
            <td>{{ $autor -> activo}}</td>
            <td>
            <a href="{{ url('/autor/'.$autor->id_autor.'/edit' ) }}" class="btn btn-primary" >
            Editar
            </a>

            <form action="{{ url ('/autor/'.$autor->id_autor ) }}" method="post" class="d-inline ">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $autores->links()!!}
</div>
@endsection