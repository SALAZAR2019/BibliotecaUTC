creacion de formulari
<form action="{{ url('/empleado') }}"  method="post"  enctype="multipart/form-data">
@csrf

<label for="nombre"> Nombre </label>
<input type="text" name="nombre"  id="nombre">
<br><br>

<label for="apellidop"> Apellido Paterno </label>
<input type="text"  name="apellidop"  id="apellidop">
<br><br>

<label for="apellidom"> Apellido Materno </label>
<input type="text"  name="apellidom"  id="apellidom">
<br><br>

<label for="correo"> Correo </label>
<input type="text"  name="correo"  id="correo">
<br><br>

<label for="foto"> Fotografía </label>
<input type="file"  name="foto"  id="foto">
<br><br>


<input type="submit"  value="Guardar datos">
<br><br>

</form>