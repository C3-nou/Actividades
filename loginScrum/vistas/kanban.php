<?php

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
include_once("../conexion.php");
//session_start();
$conexion = new Conn();
if(!$_SESSION['username']){
	header('Location:index.php');
}
$contador = 1;




?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.div1, .div2, .div3 {
display:flex;
  float: left;
  width: 100px;
  height: auto;
  margin: 10px;
  padding: 5rem;
  border-style: solid;
  border-width: 1px;
}
</style>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev, contador) {
  ev.dataTransfer.setData("text", ev.target.id);
  ev.dataTransfer.setData("pruebas", contador);
}

function drop(ev,id) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  var lol = ev.dataTransfer.getData("pruebas");
  ev.target.appendChild(document.getElementById(data));

  var dato = ev.target.id;

  var w = document.getElementById('dato'+lol).value;

    prueba(w,dato);
}

function prueba(contador, dato){

    window.location.href = "../controlador/controladorPrincipal.php?id="+contador+"&estado="+dato+"";

}

</script>
</head>
<body>

<h2>Este es tu kaban</h2>

<a>Gráficas</a>
<a>Reuniones</a>

<div id="1" class="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php
            $sql="SELECT * FROM tarea WHERE estado = 1 AND delete is null";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $prueba = $consulta->rowCount();  

            if($prueba):
    ?>
        <div>
        <?php
            while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
                echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(".$row['id'].")'>";
                //echo '<a>'.$row['estado'].'</a>'."<br>";
                echo "-----------------";
                echo "</div>";
                $contador++;

            }  
            ?>
        <?php else: ?>

        <?php echo "No existen datos"; ?>

        <?php endif ?>
        </div>
</div>

<div id="2" class="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php  
            $sql="SELECT * FROM tarea WHERE estado = 2 AND delete is null";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $prueba = $consulta->rowCount(); 
            if($prueba):
    ?>
        <div>
                <?php
            while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
                echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(".$row['id'].")'>";
                //echo '<a>'.$row['estado'].'</a>'."<br>";
                echo "-----------------";
                echo "</div>";
                $contador++;

            }  
            ?>
        <?php else: ?>

        <?php echo "No existen datos"; ?>

        <?php endif ?>
        </div>
</div>

<div id="3" class="div3" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php  
            $sql="SELECT * FROM tarea WHERE estado = 3 AND delete is null";
            $consulta = $conexion->prepare($sql);
            $consulta->execute();
            $prueba = $consulta->rowCount(); 

            if($prueba):
    ?>
        <div>
                <?php
            while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
                echo "<a href=\"update-tarea.php?idtarea=$row[id]\"><h5>Modificar Tarea</h5></a>";
                echo "<input type='button' name = 'eliminarT' value='Eliminar Tarea' onclick='eliminarT(".$row['id'].")'>";
                //echo '<a>'.$row['estado'].'</a>'."<br>";
                echo "-----------------";
                echo "</div>";
                $contador++;

            }  
            ?>
        <?php else: ?>

        <?php echo "No existen datos"; ?>

        <?php endif ?>
        </div>
</div>

    <form method="POST">
            <input type="submit" name="addtarea" Value="Añadir Tarea">
    </form>

<?php if(isset($_POST['addtarea'])): ?>
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
<?php endif ?>
<br>
<form method="Post">
    <input type="submit" name="regresarSprint" value="Regresar">
</form>

<script src="../controlador/funciones.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>