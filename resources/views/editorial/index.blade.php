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
<a href="{{ url('editorial/create') }}" class="btn btn-success">Registrar nueva Editorial</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Editorial</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $editoriales as $editorial )
        <tr>
            <td>{{ $editorial -> id_editorial}}</td>
            <td>{{ $editorial -> nom_editorial}}</td>
            <td>{{ $editorial -> activo}}</td>
            <td>
            <a href="{{ url('/editorial/'.$editorial->id_editorial.'/edit' ) }}" class="btn btn-primary" >
            Editar
            </a>

            <form action="{{ url ('/editorial/'.$editorial->id_editorial ) }}" method="post" class="d-inline ">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $editoriales->links()!!}
</div>
@endsection