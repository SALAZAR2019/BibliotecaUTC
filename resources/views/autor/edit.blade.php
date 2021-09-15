@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url ('/autor/'.$autor->id_autor) }}"  method="post"  enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}
@include('autor.form',['modo'=>'Editar']);
</form>
</div>
@endsection