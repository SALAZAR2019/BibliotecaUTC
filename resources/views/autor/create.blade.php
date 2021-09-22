@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/autor') }}"  method="post"  enctype="multipart/form-data">
@csrf
@include('autor.form',['modo'=>'Crear'])

</form>
</div>
@endsection