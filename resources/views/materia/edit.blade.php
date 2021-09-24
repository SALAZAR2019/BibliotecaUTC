@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/materia/'.$materia->id_materia) }}"  method="post"  enctype="multipart/form-data">
{!! Form::model($materia, ['url' => "/materia/{$materia->id_materia}", 'method' =>'PATCH']) !!}
@csrf
{{ method_field('PATCH') }}
@include('materia.form',['modo'=>'Editar'])
</form>
</div>
@endsection