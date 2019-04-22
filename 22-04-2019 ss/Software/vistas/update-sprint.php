<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if (!$_SESSION['username']) {
	header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Actualizar Sprint</title>
    <link rel="stylesheet" href="../css/sprintup.css">
</head>

<body>
<a href="index-proyecto.php">X</a>
    <div class="contenedor" >
		<div class="head">
			<h3>Modifica Tu Sprint</h3>
		</div>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $_SESSION['idproyecto'] ?>">

            <label>Nombre del sprint:</label><br>
            <input type="text" name="nameSprint">
            <br>

            <label>Descripción del sprint:</label><br>
            <textarea rows="4" cols="50" name="descripcion" placeholder="Añade una descripción al sprint">
    		</textarea><br>

            <input type="submit" value="Modificar" name="updateSprint">
        </form>
    </div>
</body>

</html> 