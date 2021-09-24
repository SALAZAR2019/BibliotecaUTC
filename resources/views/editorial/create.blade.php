@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ url('/editorial') }}"  method="post"  enctype="multipart/form-data">
@csrf
@include('editorial.form',['modo'=>'Crear'])

</form>
</div>
@endsection