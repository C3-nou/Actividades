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
		<form method="POST">
    		<input type="hidden" name="id" value="<?php echo $_SESSION['idproyecto'] ?>">

    		<label>Nombre del sprint:</label><br>
    		<input type="text" name="nameSprint">
    		<br>

    		<label>Descripción del sprint:</label><br>
    		<textarea rows="4" cols="50" name="descripcion" placeholder="Añade una descripción al sprint">
    		</textarea><br>

    		<input type="submit" value="Regresar" name="regresarSprint">
    		<input type="submit" value="Editar" name="updateSprint">
    	</form>
	</div>
</body>
</html>