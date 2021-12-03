@extends('layout.master')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>LISTA DE LIBROS</h1>
        </div>

        <form class="form-inline ">

            <input name="buscarpor" class="form-control  mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">

               <button class="btn btn-outline-success  my-2 my-sm-0" type="submit">Buscar</button>
          </form>
    </div>


<br>
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
<div class="row">
	<div class="col-12">
<table class="table table-borderes table-responsive">
    <thead style="background: #ffffcc">
        <tr>

            <th>Foto</th>
            <th>ISBN</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Edicion</th>
            <th>Sección</th>
            <th>Dewey</th>
            <th>Paginas</th>
            <th>Ejemplar</th>
            <th>Resenia</th>
            <th>Columna</th>
            <th>Fila</th>
            <th>Estado del libro</th>
            <th>Activo</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach( $libros as $libro )
        <tr>

            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$libro -> foto }}" height="100" width="200" alt="50">
            </td>
            <td>{{ $libro -> ISBN }}</td>
            <td>{{ $libro -> titulo}}</td>
            <td>{{ $libro -> autor}}</td>
            <td>{{ $libro -> editorial}}</td>
            <td>{{ $libro -> edicion}}</td>
            <td><label class="label label-info">{{ $libro->materias->nom_materia}}</label></td>
            <td>{{ $libro -> id_clasifidewey}}</td>
            <td>{{ $libro -> paginas}}</td>
            <td>{{ $libro -> ejemplares}}</td>
            <td>{{ $libro -> resenia}}</td>
            <td>{{ $libro -> columna}}</td>
            <td>{{ $libro -> fila}}</td>
            <td>{{ $libro -> describe_estado}}</td>
            <td>{{ $libro -> activo}}</td>
            <td>

            <a href="{{ url('/libro/'.$libro->ISBN.'/edit' ) }}" class="btn btn-primary">
            Editar
            </a>
            <form action="{{ url ('/libro/'.$libro->ISBN ) }}" method="post" class="d-inline formulario-eliminar">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit"  value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
{!! $libros->links()!!}
</div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('eliminar')== 'ok')
<script>

Swal.fire(
      'Eliminado!',
      'Su archivo ha sido eliminado.',
      'éxito'
    )

</script>

@endif

<script>

    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

    Swal.fire({
  title: '¿Estás seguro?',
  text: "¡No podrás revertir esto!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '¡Sí, bórralo!',
  cancelButtonText: 'Cancelar',
}).then((result) => {
  if (result.isConfirmed) {
    /*Swal.fire(
      'Eliminado!',
      'Su archivo ha sido eliminado.',
      'éxito'
    )*/
    this.submit();
  }
})
    });


   /*  */
</script>
@endsection
