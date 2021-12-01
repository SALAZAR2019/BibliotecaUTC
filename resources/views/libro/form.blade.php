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
value="{{ isset($libro -> ISBN)?$libro -> ISBN:old('ISBN') }}" required>
</div>

<div class="form-group">
<label for="titulo"> Titulo </label>
<input class="form-control" type="text"  name="titulo"  id="titulo" 
value="{{ isset($libro -> titulo)?$libro->titulo:old('titulo')}}" required>
</div>





<div class="form-group">
    <label for="">Autores</label>
    <select name="id_autor" id="id_autor" class="form-control" required>
        <option value="">--Elige un autor--</option>
        @foreach ($autores as $autor)
        <option value="{{ $autor-> id_autor }}"
            @if (!is_null(old('id_autor'))) 
            {{ old('id_autor') == $autores -> id_autor ? 'selected' : ''}}
            @else
            @if(isset($libro))
            {{$libro ->id_autor ==$autor->id_autor ? 'selected' : '' }}
            @endif
            @endif
            >{{$autor->nom_autor}}</option>
        @endforeach
    </select>
</div>




<!--<div class="form-group">
<label for="id_editorial"> Editorial </label>
<input class="form-control" type="text"  name="id_editorial"  id="id_editorial" 
value="{{ isset($libro -> id_editorial)?$libro -> id_editorial:old('id_editorial')}}">
</div>-->
<div class="form-group">
    <label for="">Editorial</label>
    <select name="id_editorial"  class="form-control" required>
    <option value="">--Elige una editorial--</option>
        @foreach ($editoriales as $editorial)
        <option value="{{ $editorial-> id_editorial }}"
            @if (!is_null(old('id_editorial'))) 
            {{ old('id_editorial') == $editoriales -> id_editorial ? 'selected' : ''}}
            @else
            @if(isset($libro))
            {{$libro ->id_editorial ==$editorial->id_editorial ? 'selected' : '' }}
            @endif
            @endif
            >{{$editorial->nom_editorial}}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
<label for="edicion"> Edición</label>
<input class="form-control" type="number"  name="edicion"  id="edicion" 
value="{{ isset($libro -> edicion)?$libro->edicion:old('edicion')}}" required>
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
    <label for="">Carreras</label>
    <select name="id_carrera"  class="form-control" required>
    <option value="">--Elige una carrera--</option>
        @foreach ($carreras as $carrera)
        <option value="{{ $carrera-> id_carrera }}"
            @if (!is_null(old('id_carrera'))) 
            {{ old('id_carrera') == $carreras -> id_carrera ? 'selected' : ''}}
            @else
            @if(isset($libro))
            {{$libro ->id_carrera ==$carrera->id_carrera ? 'selected' : '' }}
            @endif
            @endif
            >{{$carrera->nom_carrera}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Materias</label>
    <select name="id_materia"  class="form-control" required>
    <option value="">--Elige una materia--</option>
        @foreach ($materias as $materia)
        <option value="{{ $materia-> id_materia }}"
            @if (!is_null(old('id_materia'))) 
            {{ old('id_materia') == $materias -> id_materia ? 'selected' : ''}}
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
<input class="form-control" type="number"  name="id_clasifidewey"  id="id_clasifidewey" 
value="{{ isset($libro -> id_clasifidewey)?$libro -> id_clasifidewey:old('id_clasifidewey') }}">
</div>

<div class="form-group">
<label for="paginas"> Paginas </label>
<input class="form-control" type="number"  name="paginas"  id="paginas" 
value="{{ isset($libro -> paginas)?$libro -> paginas:old('paginas')}}" required>
</div>

<div class="form-group">
<label for="ejemplar_total"> Ejemplar </label>
<input class="form-control" type="number"  name="ejemplar_total"  id="ejemplar_total" 
value="{{ isset($libro -> ejemplar_total)?$libro->ejemplar_total:old('ejemplar_total')}}" required>
</div>
</div>



<div class="col-sm-4">
<div class="form-group">
<label for="resenia"> Reseña </label>
<input class="form-control" type="text"  name="resenia"  id="resenia" 
value="{{ isset($libro -> resenia)?$libro -> resenia:old('resenia') }}" >
</div>

<div class="form-group">
<label for="ubicacion"> Ubicación </label>
<input class="form-control" type="text"  name="ubicacion"  id="ubicacion" 
value="{{ isset($libro -> ubicacion)?$libro -> ubicacion:old('ubicacion')}}" required>
</div>

<div class="form-group">
<label for="describe_estado"> Estado </label>
<input class="form-control" type="text"  name="describe_estado"  id="describe_estado" 
value="{{ isset($libro -> describe_estado)?$libro -> describe_estado:old('describe_estado')}}" required>
</div>

<!--<div class="form-group">
<label for="activo"> Activo </label>
<input class="form-control" type="checkbox"  name="activo"  id="activo" 
value="{{ isset($libro -> activo)?$libro -> activo:old('activo')}}">
</div>-->

<div class="checkbox form-group">
    <label>
        <input type="hidden" name="activo" value="0" required>
    {!! Form::checkbox('activo', 1) !!}
     Activo
    </label>
</div>

<div class="form-group">
<label for="foto"> </label>
@if(isset($libro -> foto))
<img src="{{ asset('storage').'/'.$libro -> foto }}" class="img-thumbnail img-fluid" width="100" alt="">
@endif
<input class="form-control" type="file"  name="foto"  id="foto" value="" required>
</div>
</div>

<input class="btn btn-success" type="submit"  value="{{ $modo }} datos" required>
<br>
<a href="{{ url('libro/') }}" class="btn btn-warning">Cancelar</a>