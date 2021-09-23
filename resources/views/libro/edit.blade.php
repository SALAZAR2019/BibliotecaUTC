@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/libro/'.$libro->ISBN) }}"  method="post"  enctype="multipart/form-data">
{!! Form::model($libro, ['url' => "/libro/{$libro->ISBN}", 'method' =>'PATCH']) !!}
@csrf
{{ method_field('PATCH') }}
@include('libro.form',['modo'=>'Editar']);
</form>
</div>
@endsection