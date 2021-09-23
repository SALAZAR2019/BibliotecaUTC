<h1>{{ $modo }} autor </h1>

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
<label for="nom_autor"> Autor </label>
<input class="form-control" type="text" name="nom_autor"  id="nom_autor" 
value="{{ isset($autor -> nom_autor)?$autor -> nom_autor:old('nom_autor') }}">
</div>


<div class="form-group">
<label for="activo"> ACTIVO </label>
<input class="form-control" type="checkbox"  name="activo"  id="activo" 
value="{{ isset($autor -> activo)?$autor->activo:old('activo')}}">
</div>



<input class="btn btn-success" type="submit"  value="{{ $modo }} datos">

<a href="{{ url('autor/') }}" class="btn btn-primary">Regresar</a>