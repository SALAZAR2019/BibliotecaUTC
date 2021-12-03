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
<a href="{{ url('materia/create') }}" class="btn btn-success">Registrar nueva sección</a>
<br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Sección</th>
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

            <form action="{{ url ('/materia/'.$materia->id_materia ) }}" method="post" class="d-inline formulario-eliminar">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" value="Borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $materias->links()!!}
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

    $('.formulario-eliminar').submit(function(u){
        u.preventDefault();

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
