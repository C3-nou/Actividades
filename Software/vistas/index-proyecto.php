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
    <title>Sprints</title>
</head>
<?php include("header.php") ?>



<body>
    <div class="contenedor">
        <div id="proyect" class="enci">
            <?php
            $acciones->CicloSprint($_SESSION['idproyecto']);
            if ($acciones->getCount()) {
                echo $ciclos->CicloSprint($acciones->CicloSprint($_SESSION['idproyecto']));
            } else {
                echo "<h1> ¡¡ Este proyecto no cuenta con sprints !!</h1>";
            }
            ?>


        </div>
        <div id="boto" class="boto">
            <form method='POST'>
                <input class="añaspri" type="button" name="add" value="Añadir sprint" onclick="addsprint()">
                <a href="index2.php#proyectos">
                    <h3 class="regre">Regresar</h3>
                </a>
            </form>
        </div>


        <div id="sprintadd" class="aba">
            <div class="head">
                <h2>Añadir Sprint</h2>
            </div>
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
                <input type="submit" value="Añadir" name="addSprint">
            </form>



        </div>

    </div>
    <script src="../controlador/funciones.js"></script>
    <link rel="stylesheet" href="../css/proyecto.css">
    <script src="../controlador/rosca.js"></script>
</body>

</html> 