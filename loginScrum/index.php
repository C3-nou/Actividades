<?php include_once "validacion.php"; 

session_start();


if($_SESSION['usuario'] == true){
	header('Location:index2.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login de prueba</title>
</head>
<body>

	<h2>Login</h2>

	<form action="" method="POST">
		<label>Nombre de usuario:</label>
			<input type="text" name="username" required="">
		<br>
		<label>Contraseña:</label>
			<input type="password" name="password" required="">
		<br>
		<input type="submit" name="enviado" value="Ingresar">

	</form>


</body>
</html>