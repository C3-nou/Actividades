<?php

include_once('../conexion.php');
$conexion = new Conn();

if(isset($_GET) && isset($_GET['id']) && isset($_GET['estado'])){

    $id = $_GET['id'];
    $estado = $_GET['estado'];

    //var_dump($id, $estado);

    $sql =  "UPDATE tarea SET estado = :estado WHERE id = :id ";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':estado',$estado);
    $consulta->bindParam(':id',$id);

    
    $consulta->execute();

    header('Location: kanban.php');
}

?>