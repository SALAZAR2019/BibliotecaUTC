@extends('layout.master')
@section('titulo','Ejemplares')
@section('contenido')

<div class="container" id="ejemplar">
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
						<th width="15%">CÓDIGO</th>
                        <th width="15%">ISBN</th>
                        <th width="15%">PRESTADO</th>
						<th width="15%">DESCRIPCIÓN</th>
                        <!-- <th width="15%">ACTIVO</th> -->
						<th width="15%">OPCIONES</th>
						
					</thead>
					<tbody>
						<tr v-for="(ej,index) in ejemplares">
							<td>@{{index+1}}</td>
							<td>@{{ej.codigo}}</td>
                            <td>@{{ej.ISBN}}</td>
                            <td>@{{ej.prestado}}</td>
							<td>@{{ej.descripcion}}</td>
							<!-- <td v-if="ej.activo == 0">No</td>
							<td v-if="ej.activo == 1">Si</td> -->
                            
							<td>
								<span class="btn btn-outline-primary btn-sm" @click=""><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-danger btn-sm" @click=""><i class="fa fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- Button trigger modal -->
				<span class="btn btn-info" data-toggle="modal" v-on:click="showModal()"><i class="fa fa-plus"></i></span>

			</div>
	</div> <!--final del div row-->

</div> <!--fin del container-->


@endsection

@push('scripts')
    <!-- <script src="js/ejemplares/ejemplares.js"></script> -->
	<!-- <script src="js/usuarios/tipos.js"></script> -->
	<script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">