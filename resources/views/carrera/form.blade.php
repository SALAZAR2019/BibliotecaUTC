<h1>{{ $modo }} carrera </h1>

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
<label for="nom_carrera"> Carrera </label>
<input class="form-control" type="text" name="nom_carrera"  id="nom_carrera"
value="{{ isset($carrera -> nom_carrera)?$carrera -> nom_carrera:old('nom_carrera') }}">
</div>


<!--<div class="form-group">
<label for="activo"> ACTIVO </label>
<input class="form-control" type="checkbox"  name="activo"  id="activo"
value="{{ isset($autor -> activo)?$autor->activo:old('activo')}}">
</div>-->
<div class="checkbox">
    <label>
        <input type="hidden" name="activo" value="0">
    {!! Form::checkbox('activo', 1) !!}
     Activo
    </label>
</div>



<input class="btn btn-success" type="submit"  value="{{ $modo }} datos">

<a href="{{ url('carrera/') }}" class="btn btn-warning">Cancelar</a>
