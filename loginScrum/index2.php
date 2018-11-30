<?php 

include("validacion.php");

session_start();



if($_SESSION['usuario'] != true){
	header('Location:index.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Logeado</title>
</head>
<header>
	<form method="POST">
		<button type="submit" name="cerrarSesion">Cerrar la sesión</button>
	</form>
</header>
<body>
	<h1>Bienvenido <?php $usuario ?></h1>
</body>
</html>