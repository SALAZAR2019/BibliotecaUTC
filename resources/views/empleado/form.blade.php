<h1>{{ $modo }} empleado </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ( $errors->all() as $error )
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
<label for="nombre"> Nombre </label>
<input class="form-control" type="text" name="nombre"  id="nombre" 
value="{{ isset($empleado -> nombre)?$empleado -> nombre:old('nombre') }}">
</div>

<div class="form-group">
<label for="apellidop"> Apellido Paterno </label>
<input class="form-control" type="text"  name="apellidop"  id="apellidop" 
value="{{ isset($empleado -> apellidop)?$empleado->apellidop:old('apellidop')}}">
</div>

<div class="form-group">
<label for="apellidom"> Apellido Materno </label>
<input class="form-control" type="text"  name="apellidom"  id="apellidom" 
value="{{ isset($empleado -> apellidom)?$empleado -> apellidom:old('apellidom') }}">
</div>

<div class="form-group">
<label for="correo"> Correo </label>
<input class="form-control" type="text"  name="correo"  id="correo" 
value="{{ isset($empleado -> correo)?$empleado -> correo:old('correo')}}">
</div>

<div class="form-group">
<label for="foto"> </label>
@if(isset($empleado -> foto))
<img src="{{ asset('storage').'/'.$empleado -> foto }}" class="img-thumbnail img-fluid" width="100" alt="">
@endif
<input class="form-control" type="file"  name="foto"  id="foto" value="">
</div>


<input class="btn btn-success" type="submit"  value="{{ $modo }} datos">

<a href="{{ url('empleado/') }}" class="btn btn-primary">Regresar</a>