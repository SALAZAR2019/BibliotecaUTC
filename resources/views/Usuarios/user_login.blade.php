@extends('layout.master')
@section('titulo','Usuarios')
@section('contenido')

<div class="container" id="bibliotecario">
    <div class="row">
        <div class="col-12 text-center">
            <h1>USUARIOS</h1>
			 <!-- @{{nom}} -->
        </div>
    </div>

    <div class="row">
			<div class="col-12">
				<table id="table" class="table table-bordered table-responsive">
					<thead style="background: #ffffcc">
						<th width="15%">ID</th>
						<th width="15%">NOMBRES</th>
						<th width="15%">APELLIDOS</th>
						<th width="15%">ROL</th>
						<th width="15%">USUARIO</th>
                        <th width="15%">PASSWORD</th>
                        <th width="15%">ACTIVO</th>
						<th width="15%">OPCIONES</th>
					</thead>
					<tbody>
						<tr v-for="(u,index) in users">
							<td>@{{index+1}}</td>

							<td>@{{u.nombres}}</td>
							<td>@{{u.apellidos}}</td>
							<td>@{{u.rol_puesto}}</td>
                            <td>@{{u.usuario}}</td>
                            <td>@{{u.password}}</td>
                            <td v-if="u.activo == 0">No</td>
							<td v-if="u.activo == 1">Si</td>
							<td>
								<span class="btn btn-outline-primary btn-sm" @click="editUser(u.id_userlogin)"><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click="deleteUser(u.id_userlogin)"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<span class="btn btn-info" data-toggle="modal" v-on:click="showModal()"><i class="fa fa-plus"></i></span>

			</div>
	</div> <!--final del div row-->

	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="add_user">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
       				<h4 class="modal-title" v-if="editar">Editar Personal</h4>
        			<h4 class="modal-title" v-if="!editar">Guardar Personal</h4>
       
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div> <!--fin header-->

      			<!-- Elementos del body -->
      			<div class="modal-body">
				  	<form class="needs-validation" novalidate>
						<div class="form-row">
							<div class="col-md-4 mb-3">
								<label for="validationCustom01">Escriba su nombre</label>
								<input type="text" placeholder="Nombre/s" class="form-control" id="validationCustom01" v-model="nombres" class="form-control" required>
								<div class="valid-feedback">
									ok
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Escriba sus Apellidos</label>
								<input type="text" placeholder="Apellidos" class="form-control" id="validationCustom02" v-model="apellidos" class="form-control" required>
								<div class="valid-feedback">
									ok
								</div>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom03">Seleccione un rol</label>
								<select class="form-control" id="validationCustom02" v-model="rol_puesto" Required>
									<option>Administrador</option>
									<option>Bibliotecario</option>
								</select>	
								<div class="valid-feedback">
									ok
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 mb-3">
								<label for="validationCustom03">Usuario</label>
								<input type="text" placeholder="Usuario" class="form-control" id="validationCustom03" v-model="usuario" class="form-control" required>
								<div class="invalid-feedback">
									Ingrese usuario.
								</div>
							</div>
							<div class="col-md-3 mb-3">
								<label for="validationCustom04">Contraseña</label>
								<input type="text" placeholder="Contraseña" class="form-control" id="validationCustom04" v-model="password" class="form-control" required>
								<div class="invalid-feedback">
									Ingrese una contraseña
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-success"  v-on:click="updateUser()" v-if="editar">Actualizar</button>
						<button type="submit" class="btn btn-success" v-on:click="addUser()" v-if="!editar">Guardar</button>
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

</div> <!--final del div container-->

@endsection

@push('scripts')
    <script src="js/users/user.js"></script>
	<script src="js/validacion.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">