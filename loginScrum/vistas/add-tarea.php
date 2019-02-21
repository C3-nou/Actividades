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
	<h1>Crear Sprint</h1>

    <form method="POST">

    <label>Nombre de la tarea:</label><br>
    <input type="text" name="nameTarea">
    <br>

    <label>Horas estimadas:</label><br>
    <input type="number" name="horasE">
    <br>

    <label>Responsable de la tarea:</label><br>
    <select name="select">
        <option value="" selected>Escoge una opción</option>
        <option value="1">1 semana</option>
        <option value="2">2 semanas</option>
        <option value="3">3 semanas</option>
        <option value="4">4 semanas</option>
    </select>

    <label>Descripción</label>
    <textarea name="descripcion" rows="4" cols="50" placeholder="Describe la tarea que estas creando">
    </textarea>
    <br>

    <input type="submit" value="Cancelar" name="cancelar">
    <input type="button" value="Siguiente" name="siguiente">
    </form>
</body>
</html>