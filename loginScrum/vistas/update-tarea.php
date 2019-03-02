<?php

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
include_once("../conexion.php");
//session_start();
$conexion = new Conn();
if(!$_SESSION['username']){
	header('Location:index.php');
}
$contador = 1;




?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Actualizar Tarea</title>
</head>
<body>
<form method="POST">

<label>Nombre de la tarea:</label><br>
<input type="text" name="nameTarea">
<br>


<label>Descripción</label><br>
<textarea name="descripcion" rows="4" cols="50" placeholder="Describe la tarea que estas creando">
</textarea>
<br>

<label>Valor de la tarea</label>
<input type="number" name="value"><br>

<input type="submit" value="Regresar" name="regresarTarea">
<input type="submit" value="Siguiente" name="addtareas">
</form>
<br>
</body>
</html>
