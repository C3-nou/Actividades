<?php
include_once ("conexion.php");
include_once ("calificaciones_admin.php");

if(isset($_POST['calificacion'])){

    $fecha= date("Y/m/d");
    $rango = $_POST['eleccion'];

    $panda = $_POST['usuario'];

    var_dump ($panda, $rango);


    for ($i=1; $i <= count($rango) && $i <= count($panda) ; $i++) {

        $sql =  "INSERT INTO calificacion_admin (valor,fecha,usuario) VALUES (:valor, :fecha, :usuario)";

        $consulta = $pdo->prepare($sql);

        $consulta->bindParam(':valor',$rango[$i]);
        $consulta->bindParam(':fecha',$fecha);
        $consulta->bindParam(':usuario',$panda[$i]);

        $consulta->execute();

    }

    
}

?>