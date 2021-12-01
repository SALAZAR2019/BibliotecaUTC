@extends('layout.master')
@section('titulo','Ejemplares')
@section('contenido')

<div class="container" id="ejemplar">
    <div class="row">
        <div class="col-12 text-center">
            <h1>EJEMPLARES</h1>
			
        </div>
    </div>
    <div class="row justify-content-center">
			<div class="col-8">
				<table id="table" class="table table-bordered table-responsive">
					<thead style="background: #ffffcc">
						<!-- <th width="15%">#</th> -->
						<th width="15%">CÓDIGO</th>
                        <th width="15%">TÍTULO</th>
                        <th width="15%">PRESTADO</th>
						<th width="15%">DESCRIPCIÓN</th>
                        <!-- <th width="15%">ACTIVO</th> -->
						<th width="15%">OPCIONES</th>
						
					</thead>
					<tbody>
						<tr v-for="(ej,index) in ejemplares">
							<!-- <td>@{{index+1}}</td> -->
							<td>@{{ej.codigo}}</td>
                            <td>@{{ej.titulo}}</td>
                            <!-- <td>@{{ej.prestado}}</td> -->
							<td v-if="ej.prestado == 1">Si</td>
							<td v-if="ej.prestado == 0">No</td>
							<td>@{{ej.descripcion}}</td>
							
                            
							<td>
								<span class="btn btn-outline-primary btn-sm" @click="editEjemplar(ej.id_ejemplar)"><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click="deleteEj(ej.id_ejemplar)"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<!-- <span class="btn btn-info" data-toggle="modal" v-on:click="showModal()"><i class="fa fa-plus"></i></span> -->

			</div>
	</div> <!--final del div row-->

	<!-- modal -->

	<div class="modal fade" tabindex="-1" role="dialog" id="edit_ejemplar">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
       				<h4 class="modal-title" v-if="editar">Editar Ejemplar</h4>
        			<h4 class="modal-title" v-if="!editar">Guardar Ejemplar</h4>
       
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div> <!--fin header-->

      			<!-- Elementos del body -->
      			<div class="modal-body">
				  	<form class="needs-validation" novalidate>
						<div class="form-row">
							<div class="col-md-8 mb-3">
								<label>Título</label>
								<p>@{{titulo}}</p>
							</div>
							<div class="col-md-4 mb-3">
								<label for="validationCustom02">Código</label>

								<input type="text" placeholder="Apellidos" class="form-control" id="validationCustom02" v-model="codigo" class="form-control" required>
								<div class="valid-feedback">
									ok
								</div>
							</div>
						</div>
					
						<button type="submit" class="btn btn-success"  v-on:click="updateEjemplar" v-if="editar">Actualizar</button>
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
    <script src="js/ejemplares/ejemplares.js"></script>
	<!-- <script src="js/usuarios/tipos.js"></script> -->
	<script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">