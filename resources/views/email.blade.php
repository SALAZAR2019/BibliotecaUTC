<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>Login</title>
  </head>
<body>
<div >
    <h1>prestamo de libros </h1>
    <p>su folio es {{$folio}}</p>
    <p>Libros prestados</p>
    @foreach ($detalles as $detalle)
        <li>{{$detalle['titulo']}}</li>
    @endforeach
    

</div>
</body>
</html>