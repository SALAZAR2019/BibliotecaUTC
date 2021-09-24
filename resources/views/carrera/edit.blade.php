@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/carrera/'.$carrera->id_carrera) }}"  method="post"  enctype="multipart/form-data">
{!! Form::model($carrera, ['url' => "/carrera/{$carrera->id_carrera}", 'method' =>'PATCH']) !!}
@csrf
{{ method_field('PATCH') }}
@include('carrera.form',['modo'=>'Editar'])
</form>
</div>
@endsection