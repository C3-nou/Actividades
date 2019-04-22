<?php

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
include_once("../modelo/conexion.php");
//session_start();
$conexion = new Conn();
if (!$_SESSION['username']) {
    header('Location:index.php');
}
$contador = 1;




?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev, contador) {
            ev.dataTransfer.setData("text", ev.target.id);
            ev.dataTransfer.setData("pruebas", contador);
        }

        function drop(ev, id) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            var lol = ev.dataTransfer.getData("pruebas");
            ev.target.appendChild(document.getElementById(data));

            var dato = ev.target.id;

            var w = document.getElementById('dato' + lol).value;

            prueba(w, dato);
        }

        function prueba(contador, dato) {

            window.location.href = "../controlador/controladorPrincipal.php?id=" + contador + "&estado=" + dato + "";

        }
    </script>

</head>

<body>
    <?php include("header.php") ?>
    <div id="oculkan">
        <h2>Tablero Kanban</h2>
        <div class="contene">
            <div class="kanraba">
                <div id="1" class="porhacer" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h1>Por Hacer</h1>
                    <?php
                    $sql = "SELECT * FROM tarea WHERE estado = 1 AND delete is null";
                    $consulta = $conexion->prepare($sql);
                    $consulta->execute();
                    $prueba = $consulta->rowCount();

                    if ($prueba) :
                        ?>

                    <?php
                    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div  class='cuatas' draggable='true' ondragstart='drag(event, " . $contador . ")' id='drag" . $contador . "'>";
                        echo "<input type='hidden' id='dato" . $contador . "' name='dato' value='" . $row['id'] . "'>";
                        echo '<a>' . $row['nombre'] . '</a>' . "<br>";
                        echo '<a>' . $row['descripcion'] . '</a>' . "<br>";
                        echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                        echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(" . $row['id'] . ")'>";
                        //echo '<a>'.$row['estado'].'</a>'."<br>";
                        echo "</div>";
                        $contador++;
                    }
                    ?>
                    <?php else : ?>

                    <?php echo "<h2>No existen tareas por hacer</h2>"; ?>

                    <?php endif ?>

                </div>
                <div id="2" class="haciendo" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h1>Haciendo</h1>
                    <?php 


                    $sql = "SELECT * FROM tarea WHERE estado = 2 AND delete is null";
                    $consulta = $conexion->prepare($sql);
                    $consulta->execute();
                    $prueba = $consulta->rowCount();
                    if ($prueba) :
                        ?>

                    <?php
                    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div  class='cuatas' draggable='true' ondragstart='drag(event, " . $contador . ")' id='drag" . $contador . "'>";
                        echo "<input type='hidden' id='dato" . $contador . "' name='dato' value='" . $row['id'] . "'>";
                        echo '<a>' . $row['nombre'] . '</a>' . "<br>";
                        echo '<a>' . $row['descripcion'] . '</a>' . "<br>";
                        echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                        echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(" . $row['id'] . ")'>";
                        //echo '<a>'.$row['estado'].'</a>'."<br>";
                        echo "</div>";
                        $contador++;
                    }
                    ?>
                    <?php else : ?>

                    <?php echo "<h2>No se estan haciendo tareas</h2>"; ?>

                    <?php endif ?>

                </div>
                <div id="3" class="hecho" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <h1>Hecho</h1>
                    <?php 
                    $sql = "SELECT * FROM tarea WHERE estado = 3 AND delete is null";
                    $consulta = $conexion->prepare($sql);
                    $consulta->execute();
                    $prueba = $consulta->rowCount();

                    if ($prueba) :
                        ?>

                    <?php
                    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div  class='cuatas' draggable='true' ondragstart='drag(event, " . $contador . ")' id='drag" . $contador . "'>";
                        echo "<input type='hidden' id='dato" . $contador . "' name='dato' value='" . $row['id'] . "'>";
                        echo '<a>' . $row['nombre'] . '</a>' . "<br>";
                        echo '<a>' . $row['descripcion'] . '</a>' . "<br>";
                        echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                        echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(" . $row['id'] . ")'>";
                        //echo '<a>'.$row['estado'].'</a>'."<br>";
                        echo "</div>";
                        $contador++;
                    }
                    ?>
                    <?php else : ?>

                    <?php echo "<h2>No se han realizado tareas</h2>"; ?>

                    <?php endif ?>

                </div>
            </div>
            <form method="POST">
                <input class="bot1" type="button" name="addtarea" Value="Añadir Tarea" onclick="takanba()">
            </form>
        </div>



    </div>

    <div id="añadirtarea">
        <div class="cabe">
            <h4>Añadir Nueva Tarea</h4>
        </div>
        <div class="info">
            <form method="POST">

                <label>Nombre de la tarea:</label><br>
                <input type="text" name="nameTarea">
                <br>


                <label>Descripción</label>
                <textarea name="descripcion" rows="4" cols="50" placeholder="Describe la tarea que estas creando">
            </textarea>
                <br>

                <label>Valor de la tarea</label>
                <input type="number" name="value"><br>

                <input type="submit" value="Cancelar" name="cancelar">
                <input type="submit" value="Siguiente" name="addtareas">
            </form>
        </div>
    </div>
    <script src="../controlador/funciones.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../controlador/rosca.js"></script>
    <link rel="stylesheet" href="../css/kanban.css">
</body>

</html> 