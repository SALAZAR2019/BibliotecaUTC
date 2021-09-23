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
						<th width="15%">ACTIVO</th>
						<th width="15%">OPCIONES</th>
					</thead>
					<tbody>
						<tr v-for="lec in lectores">
							<td>@{{lec.id_usuario}}</td>
							<td>@{{lec.nombres}}</td>
							<td>@{{lec.apellido_p}}</td>
							<td>@{{lec.apellido_m}}</td>
                            <td>@{{lec.direccion}}</td>
                            <td>@{{lec.correo}}</td>
							<td>@{{lec.telefono}}</td>
							<td>@{{lec.tipo.nombre_tipo}}</td>
							<td v-if="lec.activo == 0">No</td>
							<td v-if="lec.activo == 1">Si</td>
                            
							<td>
								<span class="btn btn-outline-primary btn-sm" @click="editLector(lec.id_usuario)"><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click="deleteLector(lec.id_usuario)"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<span class="btn btn-info" data-toggle="modal" v-on:click="showModal"><i class="fa fa-plus"></i></span>

			</div>
	</div> <!--final del div row-->

		<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="add_lector">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
       				<h4 class="modal-title" v-if="editar">Editar Usuario</h4>
        			<h4 class="modal-title" v-if="!editar">Guardar Usuario</h4>
       
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div> <!--fin header-->

      			<!-- Elementos del body -->
      			<div class="modal-body">
				  	<form class="needs-validation" novalidate>
						
					  	<div class="form-row">
							
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Nombre</label>
								<input type="text" placeholder="Nombre o nombres" class="form-control" id="validationCustom02" v-model="nombres" class="form-control" required>
								<div class="valid-feedback">
									Ok
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Apellido Paterno</label>
								<input type="text" placeholder="Escriba su pellido paterno" class="form-control" id="validationCustom02" v-model="apellido_p" class="form-control" required>
								<div class="valid-feedback">
									Ok
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Apellido Materno</label>
								<input type="text" placeholder="Escriba su apellido materno" class="form-control" id="validationCustom02" v-model="apellido_m" class="form-control" required>
								<div class="valid-feedback">
									Ok
								</div>
							</div>
							
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom01">DNI</label>
								<input type="text" placeholder="Escriba la matricula ó cédula" class="form-control" id="validationCustom01" v-model="id_usuario" class="form-control" required>
								<div class="valid-feedback">
									Asegurese que sean 8 caracteres
								</div>
							</div>
							<div class="col-md-6 mb-3">
								<label for="validationCustom03">Tipo de usuario</label>
									<select class="form-control" id="validationCustom02" v-model="id_tipo" Required>
										<option disabled value="">Seleccione un tipo</option>
										<option v-for="usuarios in tipos" v-bind:value="usuarios.id_tipo">@{{usuarios.nombre_tipo}}</option>
									</select>	
									<div class="valid-feedback">
										Ok
									</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-4 mb-3">
								<label for="validationCustom03">Deireccion</label>
								<input type="text" placeholder="Escriba su dirección completa" class="form-control" id="validationCustom03" v-model="direccion" class="form-control" required>
								<div class="invalid-feedback">
									Calle, N° Int - N° Ext, Cruzamientos
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom04">Correo</label>
								<input type="text" placeholder="Ingrese un correo" class="form-control" id="validationCustom04" v-model="correo" class="form-control" required>
								<div class="invalid-feedback">
									ex@abc.xyz
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom04">Telefono</label>
								<input type="text" placeholder="Ingre un número telefónico" class="form-control" id="validationCustom04" v-model="telefono" class="form-control" required>
								<div class="invalid-feedback">
									Ok
								</div>
							</div>
						</div>
						
						<button type="submit" class="btn btn-success"  v-on:click="updateLector()" v-if="editar">Actualizar</button>
						<button type="submit" class="btn btn-success" v-on:click="addLector()" v-if="!editar">Guardar</button>
						<button type="submit" class="btn btn-warning" @click="Salir()">Cancelar</button>
					</form>

					<!-- <input type="text" placeholder="Rol" v-model="rol_puesto" class="form-control"> -->
				
					<!-- <label class="col-12 text-center">Activar</label>
					<input type="checkbox" placeholder="activo" v-model="activo" class="form-control"> -->
      			</div>
      			<!-- Fin del body -->
    		</div>
  		</div>
	</div> <!--Fin Modal-->

</div> <!--fin del container-->

@endsection
@push('scripts')
    <script src="js/usuarios/lectores.js"></script>
	<!-- <script src="js/usuarios/tipos.js"></script> -->
	<script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">