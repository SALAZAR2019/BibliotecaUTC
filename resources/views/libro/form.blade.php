<h1>{{ $modo }} libro </h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ( $errors->all() as $error )
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

<div></div>
<div class="modal-body">
<divc class="row">
<div class="col-sm-4">

<div class="form-group">
<label for="ISBN"> ISBN </label>
<input class="form-control" type="number" name="ISBN"  id="ISBN"
value="{{ isset($libro -> ISBN)?$libro -> ISBN:old('ISBN') }}" >
</div>

<div class="form-group">
<label for="titulo"> Título </label>
<input class="form-control" type="text"  name="titulo"  id="titulo"
value="{{ isset($libro -> titulo)?$libro->titulo:old('titulo')}}" >
</div>


<div class="form-group">
    <label for="autor"> Nombre del autor </label>
    <input class="form-control" type="text"  name="autor"  id="autor"
    value="{{ isset($libro -> autor)?$libro->autor:old('autor')}}" >
</div>

    <div class="form-group">
        <label for="editorial"> Editorial del libro </label>
        <input class="form-control" type="text"  name="editorial"  id="editorial"
        value="{{ isset($libro -> editorial)?$libro->editorial:old('editorial')}}" >
</div>










<div class="form-group">
<label for="edicion"> Edición</label>
<input class="form-control" type="number"  min="0" name="edicion"  id="edicion"
value="{{ isset($libro -> edicion)?$libro->edicion:old('edicion')}}" >
</div>
</div>

<div class="col-sm-4">


<div class="form-group">
    <label for="">Secciones</label>
    <select name="id_materia"  class="form-control" required>
    <option value="">--Elige una sección--</option >
        @foreach ($materias as $materia)
        <option value="{{ $materia-> id_materia }}"
            @if (!is_null(old('id_materia')))
            {{ old('id_materia') == $materias}}
            @else
            @if(isset($libro))
            {{$libro ->id_materia ==$materia->id_materia ? 'selected' : '' }}
            @endif
            @endif
            >{{$materia->nom_materia}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
<label for="id_clasifidewey"> Dewey </label>
<input class="form-control" type="number"  min="0" name="id_clasifidewey"  id="id_clasifidewey"
value="{{ isset($libro -> id_clasifidewey)?$libro -> id_clasifidewey:old('id_clasifidewey') }}">
</div>

<div class="form-group">
<label for="paginas"> Páginas </label>
<input class="form-control" type="number"  min="0" name="paginas"  id="paginas"
value="{{ isset($libro -> paginas)?$libro -> paginas:old('paginas')}}" >
</div>

<div class="form-group">
<label for="ejemplares"> Ejemplar </label>
<input class="form-control" type="number" min="0" name="ejemplares"  id="ejemplares"
value="{{ isset($libro -> ejemplares)?$libro->ejemplares:old('ejemplares')}}" >
</div>

<div class="form-group">
    <label for="resenia"> Reseña </label>
    <input class="form-control" type="text"  name="resenia"  id="resenia"
    value="{{ isset($libro -> resenia)?$libro -> resenia:old('resenia') }}" >
    </div>

</div>



<div class="col-sm-4">


<div class="form-group">
<label for="columna"> Columna </label>
<input class="form-control" type="text"  value="Utc/Fam/" name="columna"  id="columna"
value="{{ isset($libro -> columna)?$libro -> columna:old('columna')}}" >
</div>

<div class="form-group">
    <label for="fila"> Fila </label>
    <input class="form-control" type="text"  name="fila"  id="fila"
    value="{{ isset($libro -> fila)?$libro -> fila:old('fila')}}" >
    </div>

<div class="form-group">
<label for="describe_estado"> Estado del libro</label>
<input class="form-control" type="text"  name="describe_estado"  id="describe_estado"
value="{{ isset($libro -> describe_estado)?$libro -> describe_estado:old('describe_estado')}}" >
</div>

<!--<div class="form-group">
<label for="activo"> Activo </label>
<input class="form-control" type="checkbox"  name="activo"  id="activo"
value="{{ isset($libro -> activo)?$libro -> activo:old('activo')}}">
</div>-->

<div class="checkbox form-group">
    <label>
        <input type="hidden" name="activo" value="0" >
    {!! Form::checkbox('activo', 1) !!}
     Activo
    </label>
</div>

<div class="form-group">
<label for="foto"> </label>
@if(isset($libro -> foto))
<img src="{{ asset('storage').'/'.$libro -> foto }}" class="img-thumbnail img-fluid" width="100" alt="" >
@endif
<input class="form-control" type="file"  name="foto"  id="foto" value=""  >
</div>
</div>

<input class="btn btn-success" type="submit"  value="{{ $modo }} datos" >
<br>
<a href="{{ url('libro/') }}" class="btn btn-warning">Cancelar</a>
