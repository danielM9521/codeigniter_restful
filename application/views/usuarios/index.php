<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
</head>
<body>

<h1><?= $titulo?></h1>

<!-- Formulario para garegar -->
<div id="frm">
    <input type="hidden" id="id">
    <label for="txtNombre">Nombre</label>
    <input type="text" id="txtNombre"><br><br>
    <label for="txtApellido">Apellido</label>
    <input type="text" id="txtApellido">
    <button id="btnAgregar" value="ingresar">Agregar</button>
</div>

<br>

<div>
<table border="1">

<thead>
    <tr>
        <th >ID</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th colspan="2">ACCIÓN</th>
    </tr>
</thead>


<tbody id="cuerpo">

</tbody>

</table>

</div>

</body>
</html>