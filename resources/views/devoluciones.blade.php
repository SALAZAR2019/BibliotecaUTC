@extends('layout.master')
@section('titulo','Devoluciones')
@section('contenido')
<div class="container" id="prestamos">
    <div class="row">
      <div class="col-12">
         <h1>Devolucion de libros</h1>
      </div>
    </div>
    <div class="row g-2">
      <div class="col-6">
        <div class="input-group">
          <div class="col-6 position-relative">
            <input type="text" name="" class="form-control" v-model="buscar">
          </div>
          <div class="col-3 position-relative">
            <span class="input-group-btn">
              <button type="button" class="btn btn-success"  >Buscar</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
			<div class="col-12">
				<table id="tabla-dev" class="table table-bordered">
					<thead style="background: #ffffcc">
						<th width="15%">ID PRESTAMO</th>
						<th width="15%">FOLIO</th>
						<th width="15%">USUARIO</th>
						<th width="15%">FECHA PRESTAMO</th>
						<th width="15%">EJEMPLAR</th>
						<th width="15%">NOMBRE DEL LIBRO</th>
            <th width="15%">REGISTRAR DEVOLUCION</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in filtroPrestamos">
							<td>@{{v.id_prestamo}}</td>
							<td>@{{v.folio}}</td>
							<td>@{{v.id_usuario}}</td>
              <td>@{{v.fecha_prestamo}}</td>
							<td>@{{v.id_ejemplar}}</td>
							<td>@{{v.ejemplar.libros.titulo}}</td>
							<td>
								<span class="btn btn-outline-primary" @click="dev(v.id_prestamo)"><i class="fa fa-edit"></i></span>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
              <!-- Elementos del body -->
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-4">
                          <label>ID EJEMPLAR</label>
                            <input type="text" name="" placeholder="Ingrese su nombre" class="form-control" v-model="id_ejemplar">
                          <label>ID DEL PRESTAMO</label>
                            <input type="text" name="" placeholder="Ingrese su apellido paterno" class="form-control" v-model="id_prestamo">
                          <label>TITULO</label>
                            <input type="text" name="" placeholder="Ingrese su curp" class="form-control" v-model="titulo">
                          <label>ID USUARIO</label>
                            <input type="text" name="" placeholder="Ingrese su direccion" class="form-control" v-model="id_usuario">
                        </div>
                        <div class="col-sm-4">
                          <label>fecha del prestamo</label>
                          <input type="text" name="" placeholder="Ingrese su nombre" class="form-control" v-model="fecha_prestamo">
                          <label>fecha Actual</label>
                          <input type="text" name="" placeholder="Ingrese su nombre" class="form-control" v-model="fecha_actual">        
                        </div>
                      </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-success"  v-on:click="devolver">Guardar</button>
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