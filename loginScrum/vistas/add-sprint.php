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

    <input type="hidden" name="id" value="<?php echo $idproyecto ?>">

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
    <input type="submit" value="Regresar" name="cancelarSprint">
    <input type="submit" value="Siguiente" name="addSprint">
    </form>
</body>
</html>