apresiacion de datos
<table class="table table-dark">
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
            <td>{{ $empleado -> foto}}</td>
            <td>{{ $empleado -> nombre}}</td>
            <td>{{ $empleado -> apellidop}}</td>
            <td>{{ $empleado -> apellidom}}</td>
            <td>{{ $empleado -> correo}}</td>
            <td>Editar |

            <form action="{{url('/empleado/'.$empleado->id_e)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="borrar">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>