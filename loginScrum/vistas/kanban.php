<?php

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
include_once("../conexion.php");
//session_start();
$consulta = new Conn();
if(!$_SESSION['username']){
	header('Location:index.php');
}
$contador = 1;

if(isset($_GET['idsprint'])){
    $sql = "SELECT idproyecto FROM sprint WHERE idsprint = :idsprint";

$envio = $consulta->prepare($sql);

$envio->bindParam(':idsprint', $idsprint);

$envio->execute();

$pruebas = $envio->fetch(PDO::FETCH_ASSOC);

var_dump($pruebas);
$var = implode($pruebas);
}



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
  background-color:green;
}

.div{
    background-color:white;
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

    window.location.href = "enviar_datos.php?id="+contador+"&estado="+dato+"";

}

</script>
</head>
<body>

<h2>Drag and Drop</h2>
<p>Arrastra tu tarea en los distintos estados en el área verde</p>

<div id="1" class="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <?php  
            /*$acciones->dragdrop($idsprint, 1);

            if($acciones->getCount()):*/
            $sql = "SELECT * FROM tarea WHERE estado = 1 AND id_sprint = :idsprint";

            $datos = $consulta->prepare($sql);
    
            //$datos->bindParam(':estado', 1);
            $datos->bindParam(':idsprint', $idsprint);
    
            $datos->execute();
    
            $count = $datos->rowCount();

            if($count):
    ?>
        <div>
        <?php
            while($row = $datos->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."' class='div'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
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
            $sql = "SELECT * FROM tarea WHERE estado = 2 AND id_sprint = :idsprint";

            $datos = $consulta->prepare($sql);
                
            //$datos->bindParam(':estado', 1);
            $datos->bindParam(':idsprint', $idsprint);
                
            $datos->execute();
                
            $count = $datos->rowCount();
            
            if($count):
        ?>
        <div>
        <?php
            while($row = $datos->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."' class='div'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
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
            $sql = "SELECT * FROM tarea WHERE estado = 3 AND id_sprint = :idsprint";

            $datos = $consulta->prepare($sql);
                
            //$datos->bindParam(':estado', 1);
            $datos->bindParam(':idsprint', $idsprint);
                
            $datos->execute();
                
            $count = $datos->rowCount();
            
            if($count):
    ?>
        <div>
        <?php
            while($row = $datos->fetch(PDO::FETCH_ASSOC)) {
                echo "<div draggable='true' ondragstart='drag(event, ".$contador.")' id='drag".$contador."' class='div'>"; 
                echo "<input type='hidden' id='dato".$contador."' name='dato' value='".$row['id']."'>";
                echo '<a>'.$row['nombre'].'</a>'."<br>";
                echo '<a>'.$row['descripcion'].'</a>'."<br>";
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

<div>
    <form method="POST">
        <input type="submit" name="addtarea" value="Añadir tarea">
    </form>
</div>

    <?php 
        echo "<a href='index-proyecto.php?idproyecto=$var'>Regresar</a>";
    ?>
    <!--<a href="index-proyecto.php?idsprint = ">Regresar</a>-->
</body>
</html>