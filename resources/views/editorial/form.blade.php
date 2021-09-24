<h1>{{ $modo }} editorial </h1>

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
<label for="nom_editorial"> EDITORIAL </label>
<input class="form-control" type="text" name="nom_editorial"  id="nom_editorial" 
value="{{ isset($editorial -> nom_editorial)?$editorial -> nom_editorial:old('nom_editorial') }}">
</div>

<div class="checkbox">
    <label>
        <input type="hidden" name="activo" value="0">
    {!! Form::checkbox('activo', 1) !!}
     Activo
    </label>
</div>


<input class="btn btn-success" type="submit"  value="{{ $modo }} datos">

<a href="{{ url('editorial/') }}" class="btn btn-primary">Regresar</a>