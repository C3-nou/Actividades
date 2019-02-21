<?php 

include_once("../controlador/controladorPrincipal.php");
include_once("../controlador/session.php");
//session_start();
  
if(isset($_SESSION['username'])){
	header('Location:index2.php');
  exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login de prueba</title>
	
	<style>
        .error {
            border: solid 2px #FF0000;
        }
    </style>
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
		<input type="submit" name="inicio" value="Ingresar">

	</form>



	<h2>Registro</h2>

	<form action="" method="POST">
		<label>Nombre</label>
			<input type="text" id="nombres" name="nombre" placeholder="Nombre" required>
			<br>
		<label>Apellido</label>
			<input type="text" id="apellidos" name="apellido" placeholder="Apellido" required/>
		    <br>
		<label>Nombre de usuario</label>    
            <input type="text" id="usuarios" name="usuario" placeholder="Nombre de usuario"  required/>
            <br>
        <label>Correo</label>
            <input type="email" id="correos" name="correo"   placeholder="Correo"    required/>
            <br>
        <label>Contraseña</label>
            <input type="password" id="password" name="contrasena" placeholder="Contraseña" required/>     
            <br>

        <input type="submit" name="registro" value="registrar" />

	</form>

	<div id="mensaje"></div>

	<!--<script type="text/javascript" src="validacionFrontend.js"></script>-->
</body>
</html>