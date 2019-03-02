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
	<style>
		.div {
		display:flex;
  		float: left;
  		width: auto;
  		height: auto;
  		margin: 10px;
  		border-style: solid;
  		border-width: 1px;
}
	</style>
</head>
	<?php include("header.php") ?>
<body>
	<h1>Bienvenido <?php  echo $_SESSION['username']; ?></h1>
	<br>

	<div>
		 <h3>Guía sobre la aplicación</h3>
	</div>
	<div>
		<?php
		$id = $acciones->cicloMiembro($_SESSION['idusuario']);
		
		$idproyecto = implode(',',$id);
		
		if($acciones->getCount()){
			echo $ciclos->CicloProyectos($acciones->CicloProyectos($idproyecto));
		}else{
			echo "No Tienes proyectos";
		}
		?>
	<form method='POST'>
        <input type="submit" name="addproyecto" value="Añadir proyecto"> 
    </form>

		<?php if(isset($_POST['addproyecto']) && !isset($_POST['cancelar'])): ?>

		<form method='POST'>
            <label>Nombre del proyecto:</label><br>
            <input type="text" name="nombreProyecto"><br>
            <label>Descripción del proyecto:</label><br>
            <textarea rows="4" cols="50" name="descripcion"></textarea><br>

            <input type="submit" name="crearProyecto" value="Ingresar">
            <input type="submit" name="regresar" value="Regresar"> 
        </form>
		<?php endif ?>
	</div>
	<script src="../controlador/funciones.js"></script>
</body>
</html>