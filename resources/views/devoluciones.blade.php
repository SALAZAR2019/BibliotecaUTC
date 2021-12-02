@extends('layout.master')
@section('titulo','Devoluciones')
@section('contenido')
<div class="container" id="prestamos">
    <div class="row">
      <div class="col-12">
         <h1>DEVOLUCIÓN DE LIBROS</h1>
      </div>
    </div>

    <div class="row g-2">
      <div class="col-6">
        <div class="input-group">
          <div class="col-6 position-relative">
            <input type="text" placeholder="Buscar por folio" name="" class="form-control" v-model="buscar">
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
            <th width="15%">REGISTRAR DEVOLUCIÓN</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in filtroPrestamos" id="celda"  >
							<td>@{{v.id_prestamo}}</td>
							<td>@{{v.folio}}</td>
							<td>@{{v.id_usuario}}</td>
              <td>@{{v.fecha_prestamo}}</td>
              <td>@{{v.titulo}}</td>
              <td >@{{v.fecha_devolucion}}</td>
							<td>
								<span class="btn btn-outline-primary" @click="dev(v.id_prestamo)"><i class="fa fa-edit"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
          <nav aria-label="">
          <ul class="pagination justify-content-center">
            <li class="page-item "  v-if="pagination.current_page > 1">
              <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">Atras</a>
            </li>
            <li class="page-item " v-for="page in pageNumber" v-bind:class="[ page == isActived ? 'active':'']">
              <a class="page-link" href="#"  href="" @click.prevent="changePage(page)">@{{page}}</a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page">
              <a class="page-link"  href="#" @click.prevent="changePage(pagination.current_page + 1)">Next</a>
            </li>
          </ul>
        </nav>
			</div>
	</div>
  <!-- Modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="add_devolucion">
    <div class="modal-dialog modal-md " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" v-on:click="Salir()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
              <!-- Elementos del body -->
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <label>ID EJEMPLAR</label>
                            <p>@{{id_ejemplar}}</p>
                          <label>ID DEL PRESTAMO</label>
                            <p>@{{id_prestamo}}</p>
                          <label>TITULO</label>
                            <p>@{{titulo}}</p>
                          <label>ID USUARIO</label>
                            <p>@{{id_usuario}}</p>
                        </div>
                        <div class="col-sm-6">
                          <label>fecha del prestamo</label>
                          <p>@{{fecha_prestamo}}</p>
                          <label>fecha Actual</label>
                          <p>@{{fecha_actual}}</p>
                        </div>
                      </div>  
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-outline-success"  v-on:click="devolver">Registrar devolucion</button>
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