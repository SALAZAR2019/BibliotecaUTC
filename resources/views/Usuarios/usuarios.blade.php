@extends('layout.master')
@section('titulo','Lectores')
@section('contenido')

<div class="container" id="lector">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Lectores</h1>
			 <!-- @{{nom}} -->
        </div>
    </div>

    <div class="row">
			<div class="col-12">
				<table id="table" class="table table-bordered table-responsive">
					<thead style="background: #ffffcc">
						<th width="15%">DNI</th>
						<th width="15%">NOMBRES</th>
						<th width="15%">APELLIDO PATERNO</th>
						<th width="15%">APELLIDO MATERNO</th>
						<th width="15%">DIRECCIÓN</th>
                        <th width="15%">CORREO</th>
                        <th width="15%">TELÉFONO (MÓVIL)</th>
						<th width="15%">TIPO DE LECTOR</th>
						<!-- <th width="15%">ACTIVO</th> -->
						<th width="15%">OPCIONES</th>
					</thead>
					<tbody>
						<tr v-for="l in lectores">
							<td>@{{l.id_usuario}}</td>
							<td>@{{l.nombres}}</td>
							<td>@{{l.apellido_p}}</td>
							<td>@{{l.apellido_m}}</td>
                            <td>@{{l.direccion}}</td>
                            <td>@{{l.correo}}</td>
							<td>@{{l.telefono}}</td>
							<td>@{{l.tipos.nombre_tipo}}</td>
                            
							<td>
								<span class="btn btn-outline-primary btn-sm" @click=""><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click=""><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<span class="btn btn-info" data-toggle="modal" v-on:click=""><i class="fa fa-plus"></i></span>

			</div>
	</div> <!--final del div row-->

</div> <!--fin del container-->

@endsection
@push('scripts')
    <script src="js/usuarios/lectores.js"></script>
	<!-- <script src="js/usuarios/tipos.js"></script> -->
	<script src="js/validacion.js"></script>

@endpush