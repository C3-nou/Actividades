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
	<title>Logeado</title>
</head>
	<?php include("header.php") ?>
<body>

	<div>
		 <h3>Modificar proyecto</h3>
	</div>
	<div>
		<form method='POST'>
            <label>Nombre del proyecto:</label><br>
            <input type="text" name="nombreProyecto"><br>
            <label>Descripción del proyecto:</label><br>
            <textarea rows="4" cols="50" name="descripcion"></textarea><br>

			<input type="submit" name="regresarProyecto" value="Regresar"> 
            <input type="submit" name="udpateProyecto" value="Editar">
        </form>
	</div>
</body>
</html>