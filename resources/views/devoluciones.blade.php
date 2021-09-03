@extends('layout.master')
@section('titulo','Devoluciones')
@section('contenido')

<div class="container" id="prestamos">
    <div class="row">
        <div class="col-12">
            <h1>Devolucion de libros</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="input-group">
                <input type="text" name="" class="form-control" v-model="buscar">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success"  >Buscar</button>
                </span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
			<div class="col-8">
				<table id="tabla-dev" class="table table-bordered">
					<thead style="background: #ffffcc">
						<th width="15%">ID PRESTAMO</th>
						<th width="15%">FOLIO</th>
						<th width="15%">USUARIO</th>
						<th width="15%">EJEMPLAR</th>
						<th width="15%">LIBRO</th>
						<th width="15%">OPCIONES</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in filtroPrestamos">
							<td>@{{v.id_prestamo}}</td>
							<td>@{{v.folio}}</td>
							<td>@{{v.id_usuario}}</td>
							<td>@{{v.id_ejemplar}}</td>
							<td>@{{v.ejemplar.libros.titulo}}</td>
							<td>
								<span class="btn btn-outline-primary" @click="dev(v.id_prestamo)"><i class="fa fa-edit"></i></span>
                <button type="submit" class="btn btn-warning" @click="eliminarT()">Cancelar</button>

							</td>
              
						</tr>
					</tbody>
				</table>
			</div>

	</div>
<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_devolucion">
    <div class="modal-dialog modal-lg " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" v-if="editar">Editando</h4>
        <h4 class="modal-title" v-if="!editar">Guardar Nuevo</h4>
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <!-- Elementos del body -->
 
              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-4">
                    <label>Tipo de usuario</label>
                    <input type="text" name="" placeholder="Ingrese tipo de usuarios" class="form-control" v-model="id_ejemplar">
                    <input type="text" name="" placeholder="Ingrese tipo de usuarios" class="form-control" v-model="id_prestamo">
                    <center><label>Activar</label></center>
                    <input type="checkbox" placeholder="activo" v-model="activo" class="form-control">
                </div>
              </div>  
              <br>
          </div>



              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" v-if="editar">Actualizar</button>

                  <button type="submit" class="btn btn-outline-success"  v-on:click="devolver">Guardar</button>
          
                  <button type="submit" class="btn btn-warning" @click="eliminarT()">Cancelar</button>
                </div>
     
            </div>
           </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@push('scripts')
	<script src="js/dev/devoluciones.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">