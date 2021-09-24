@extends('layout.master')
@section('titulo','Tipos de lector')
@section('contenido')

<div class="container" id="tipo_us">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Tipos de lectores</h1>
        </div>
    </div>

    <div class="row justify-content-center">
			<div class="col-8">
				<table id="table" class="table table-bordered table-responsive">
					<thead style="background: #ffffcc">
						<th width="15%">#</th>
						<th width="15%">TIPO DE LECTOR</th>
						<th width="15%">DESCRIPCIÓN</th>
                        <th width="15%">ACTIVO</th>
						<th width="15%">OPCIONES</th>
						
					</thead>
					<tbody>
						<tr v-for="(tip,index) in tipos">
							<td>@{{index+1}}</td>
							<td>@{{tip.nombre_tipo}}</td>
							<td>@{{tip.descripcion}}</td>
							<td v-if="tip.activo == 0">No</td>
							<td v-if="tip.activo == 1">Si</td>
                            
							<td>
								<span class="btn btn-outline-primary btn-sm" @click="editTipo(tip.id_tipo)"><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click="deleteTipo(tip.id_tipo)"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<span class="btn btn-info" data-toggle="modal" v-on:click="showModal()"><i class="fa fa-plus"></i></span>

			</div>
	</div> <!--final del div row-->

	<!-- Modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="add_Tipo">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
       				<h4 class="modal-title" v-if="editar">Editar tipo de usuario</h4>
        			<h4 class="modal-title" v-if="!editar">Guardar tipo de usuario</h4>
       
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div> <!--fin header-->

      			<!-- Elementos del body -->
      			<div class="modal-body">
				  	<form class="needs-validation" novalidate>
						<div class="form-row justify-content-center">
							<div class="col-md-12 mb-3">
								<label for="validationCustom01">Nombre</label>
								<input type="text" placeholder="Designe un nombre" class="form-control" id="validationCustom01" v-model="nombre_tipo" class="form-control" required>
								<div class="valid-feedback">
									ok
								</div>
							</div>
						</div>
						<div class="form-row justify-content-center">

							<div class="col-md-12 mb-3">
    							<label for="exampleFormControlTextarea1">Descripción "Opcional"</label>
    								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" class="form-control" id="validationCustom02" v-model="descripcion"></textarea>
								<div class="valid-feedback">
									ok
								</div>
  							</div>
						</div>
						
						<button type="submit" class="btn btn-success"  v-on:click="updateTipo()" v-if="editar">Actualizar</button>
						<button type="submit" class="btn btn-success" v-on:click="addTipo()" v-if="!editar">Guardar</button>
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

</div> <!--fin container-->

@endsection

@push('scripts')
    <script src="js/usuarios/tipos.js"></script>
	<!-- <script src="js/usuarios/tipos.js"></script> -->
	<script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">