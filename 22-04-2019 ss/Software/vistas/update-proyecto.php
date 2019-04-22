<?php

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
include_once('../modelo/conexion.php');

$conexion = new Conn();

$idproyecto = $_GET['idproyecto'];
$codigo = 1;

$sql = "SELECT idusuario, idrol FROM miembro WHERE idproyecto = :idproyecto AND estado = :codigo";

$consulta = $conexion->prepare($sql);
$consulta->bindParam(':idproyecto', $idproyecto);
$consulta->bindParam(':codigo', $codigo);
$consulta->execute();

$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

if (!$_SESSION['username']) {
	header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar Proyecto</title>
    <link rel="stylesheet" href="../css/updapro.css">
</head>
<body>
	<a href="index2.php#proyectos">X</a>
    <div class="contenedor">
        <div class="head">
            <h3>Modificar Proyecto</h3>
        </div>
        <div class="info">
            <form method='POST'>
                <label>Nombre del proyecto:</label><br>
                <input type="text" name="nombreProyecto"><br>
                <label>Descripción del proyecto:</label><br>
                <textarea rows="4" cols="50" name="descripcion"></textarea><br>

                <label for="">Integrantes del proyecto: </label>

                <table border="1">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th colspan="2">Acciones</th>
                </thead>

                <?php

                    $sql = "SELECT nombre, apellido, username FROM usuario WHERE idusuario = :idusuario";
                    for ($i=0; $i < count($datos) ; $i++) {
                        $query = $conexion->prepare($sql);
                        $query->bindParam(':idusuario', $datos[$i]['idusuario']);
                        $query->execute();
                        $value = $query->fetch(PDO::FETCH_ASSOC);
                        echo "<tr>";
                        echo "<td>".$value['nombre']."</td>";
                        echo "<td>".$value['apellido']."</td>";
                        echo "<td>".$value['username']."</td>";
                        if($datos[$i]['idrol'] == 3){
                            echo "<td>Product Owner</td>";
                        }elseif($datos[$i]['idrol'] == 1){
                            echo "<td>Desarrollador</td>";
                        }else{
                            echo "<td>Scrum Master</td>";
                        }
                        echo "<td id='dato".$i."'><a onclick='changeElement($i)'></a></td>";
                        echo "<td>Eliminar</td>";
                        echo "</tr>";
                    }

                ?>

                </table>

                <input type="submit" name="udpateProyecto" value="Modificar">
            </form>
        </div>
    </div>
    <script src="update-proyecto.js"></script>
</body>

</html>