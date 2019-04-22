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
    <title>Añadir Sprint</title>
</head>
<?php include("header.php") ?>
<link rel="stylesheet" href="../css/addsprint.css">

<body>
    <div class="contenedor">
        <div class="head">
            <h1>Crear Sprint</h1>
        </div>
        <div class="info">

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
                <input type="submit" value="Cancelar" name="cancelar">
                <input type="submit" value="Siguiente" name="addSprint">
            </form>
        </div>
    </div>
</body>

</html> 