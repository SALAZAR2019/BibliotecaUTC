@extends('layout.master')
@section('titulo','Prestamos')
@section('contenido')

<div class="container" id="prestamo">
    <div class="row">
        <div class="col-12">
            <h1>PRESTAMO DE LIBROS</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="input-group">
                <input type="text" name="" class="form-control" v-model="codigo" ref="buscar" v-on:keyup.enter="getLibros()">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-success" @click="getLibros()" >Agregar</button>
                </span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
			<div class="col-8">
				<table class="table table-bordered">
					<thead style="background: #ffffcc">
						<th>ID</th>
						<th>ISBN</th>
						<th width="15%">TITULO</th>
						<th width="15%">ESTADO</th>
						<th width="15%">OPCIONES</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in prestamos">
							<td>@{{v.id_ejemplar}}</td>
							<td>@{{v.id_libro}}</td>
							<td>@{{v.codigo}}</td>
							<td>@{{v.titulo}}</td>
							<td><span class="btn btn-bg" @click="eliminarLibro(index)">eliminar</span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-4">
				<div>
				<span class="input-group-btn">
                    <button type="button" class="btn btn-success" >Agregar</button>
                </span>
				</div>
			</div>
	</div>
	<div class="row">
		<div class="col-4">
			<span class="input-group-btn">
				<button class="btn btn-success" @click="prestamo" value="Actualizar" onclick="location.reload()">Realizar prestamo</button>
			</span>
		</div>
	</div>
</div>
@endsection
@push('scripts')
	<script src="js/prestamo/prestamo.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">