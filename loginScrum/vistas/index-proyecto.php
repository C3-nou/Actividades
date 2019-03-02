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
	<div>
		<?php
			$acciones->CicloSprint($_SESSION['idproyecto']); 
			if($acciones->getCount()){
				echo $ciclos->CicloSprint($acciones->CicloSprint($_SESSION['idproyecto']));
			}else{
				echo "Este proyecto no cuenta con sprints";
			}
		?>
		<form method='POST'>
        	<input type="submit" name="add" value="Añadir sprint"> 
		</form>
		
		<?php if(isset($_POST['add']) && !isset($_POST['regresar'])): ?>
		<form method="POST">
    		<input type="hidden" name="id" value="<?php echo $_SESSION['idproyecto'] ?>">

    		<label>Nombre del sprint:</label><br>
    		<input type="text" name="nameSprint">
    		<br>

    		<label>Descripción del sprint:</label><br>
    		<textarea rows="4" cols="50" name="descripcion" placeholder="Añade una descripción al sprint">
    		</textarea><br>

    		<label>Duración del sprint:</label><br>
    		<select name="select">
        		<option value="" selected disabled>Escoge una opción</option>
        		<option value="7">1 semana</option>
        		<option value="14">2 semanas</option>
        		<option value="21">3 semanas</option>
        		<option value="28">4 semanas</option>
    		</select>
    		<br>
    		<input type="submit" value="Cancelar" name="regresar">
    		<input type="submit" value="Siguiente" name="addSprint">
    	</form>
		<?php endif ?>
	</div>
		<a href="index2.php"><h3>Regresar</h3></a>
	<script src="../controlador/funciones.js"></script>
</body>
</html>