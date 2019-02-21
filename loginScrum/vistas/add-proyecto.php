<?php 

include_once('../controlador/controladorPrincipal.php');

include_once("../controlador/session.php");
//session_start();
if(!$_SESSION['username']){
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear proyecto</title>
</head>
    <?php include("header.php") ?>
<body>
	<h1>Crear proyecto</h1>

    <form method="POST">
    <label>Nombre del proyecto:</label><br>
    <input type="text" name="nombreProyecto" placeholder="Nombre del proyecto">
    <br>
    <label>descripción:</label><br>
    <textarea rows="4" cols="50" name="descripcion" placeholder="Añade una descripción a tu proyecto">
    </textarea>
    <br>
    <input type="submit" value="Cancelar" name="cancelarProyecto">
    <input type="submit" value="Siguiente" name="crearProyecto">
    </form>
</body>
</html>