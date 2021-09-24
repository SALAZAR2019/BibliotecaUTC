@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/editorial/'.$editorial->id_editorial) }}"  method="post"  enctype="multipart/form-data">
{!! Form::model($editorial, ['url' => "/editorial/{$editorial->id_editorial}", 'method' =>'PATCH']) !!}
@csrf
{{ method_field('PATCH') }}
@include('editorial.form',['modo'=>'Editar'])
</form>
</div>
@endsection