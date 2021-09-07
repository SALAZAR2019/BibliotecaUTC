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
						<label>Escriba su nombre</label>
        			<input type="text" placeholder="Nombre/s" v-model="nombres" class="form-control">
        				<br>
						<label>Escriba sus apellidos</label>
        			<input type="text" placeholder="Apellidos" v-model="apellidos" class="form-control">
        				<br>
					<!-- <input type="text" placeholder="Rol" v-model="rol_puesto" class="form-control"> -->
						<label>Seleccione un rol</label>
						<select class="form-control" v-model="rol_puesto">
            				<option>Administrador</option>
							<option>Bibliotecario</option>
        				</select>
						<br>
						<label>Ingrese un usuario</label>
					<input type="text" placeholder="Usuario" v-model="usuario" class="form-control">
						<br>
						<label>Ingrese una contraseña</label>
					<input type="text" placeholder="Contraseña" v-model="password" class="form-control">
				
					<!-- <label class="col-12 text-center">Activar</label>
					<input type="checkbox" placeholder="activo" v-model="activo" class="form-control"> -->
      			</div>
      			<!-- Fin del body -->

        		<div class="modal-footer">
            		<button type="submit" class="btn btn-success"  v-on:click="updateUser()" v-if="editar">Actualizar</button>
            		<button type="submit" class="btn btn-success" v-on:click="addUser()" v-if="!editar">Guardar</button>
          			<button type="submit" class="btn btn-warning" @click="Salir()">Cancelar</button>
		    	</div>
    		</div>
  		</div>
	</div> <!--Fin Modal-->

</div> <!--final del div container-->

@endsection

@push('scripts')
    <script src="js/users/user.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">