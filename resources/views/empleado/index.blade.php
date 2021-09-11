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


<a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo Usuario</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $empleados as $empleado )
        <tr>
            <td>{{ $empleado -> id_e}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado -> foto }}" width="100" alt=""> 
            </td>
            <td>{{ $empleado -> nombre}}</td>
            <td>{{ $empleado -> apellidop}}</td>
            <td>{{ $empleado -> apellidom}}</td>
            <td>{{ $empleado -> correo}}</td>
            <td>

            <a href="{{ url('/empleado/'.$empleado->id_e.'/edit' ) }}" class="btn btn-warning" >
            Editar
            </a>

            <form action="{{ url ('/empleado/'.$empleado->id_e ) }}" method="post" class="d-inline ">
            @csrf 
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links()!!}
</div>
@endsection