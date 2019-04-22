<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if (!$_SESSION['username']) {
    header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadísticas</title>

    <script>
        window.onload = inicio;

        var botones = document.getElementById('botones');
        var stats = document.getElementById('stats');
        var finalizados = document.getElementById('finalizados');

        function inicio(){
            document.getElementById('botones').style.display = "block";
            document.getElementById('stats').style.display = "none";
            document.getElementById('finalizados').style.display = "none";
        }

        function mostrar(data){
            if(data == "burn"){
                document.getElementById('botones').style.display = "none";
                document.getElementById('stats').style.display = "block";
                document.getElementById('finalizados').style.display = "none";
            }else{
                document.getElementById('botones').style.display = "none";
                document.getElementById('stats').style.display = "none";
                document.getElementById('finalizados').style.display = "block";
            }
        }

        function regresar(){
            document.getElementById('botones').style.display = "block";
            document.getElementById('stats').style.display = "none";
            document.getElementById('finalizados').style.display = "none";
        }
    </script>
</head>
<body>
    <?php include("header.php") ?>

    <div id="botones">
        <button onclick="mostrar('burn')">BurnUp chart</button>
        <button onclick="mostrar('final')">Sprints finalizados</button>
        <a href="index-proyecto.php">Volver a mis sprints activos</a>
    </div>

<div id="stats">
<?php
    
    $sql = "SELECT SUM(valor_sprint) as valor_sprint FROM sprint WHERE idproyecto = :idproyecto";

    //echo $_SESSION['idproyecto'];
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':idproyecto', $_SESSION['idproyecto']);
    $consulta->execute();

    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);

    //$nombres = array_column($data, 'nombre');
    $valorTotal = array_column($data, 'valor_sprint');

    //$nombre = implode(',', $nombres);
    $valorProyectos = implode(',', $valorTotal);

    //print_r($valorProyectos);
    
    $sql = "SELECT SUM(valor_sprint) as valor_sprint FROM sprint WHERE idproyecto = :idproyecto AND estado = 2";

    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':idproyecto', $_SESSION['idproyecto']);
    $consulta->execute();

    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $final = array_column($data, 'valor_sprint');

    $finalizados = implode(',', $final);

	$cont = "[0, ".$finalizados."]";
	$days = "[0, ".$valorProyectos."]";
	$dios = "[ 0, ".$valorProyectos."]";

?>
  <canvas id = "speedChart" width="40px" height="40px">
  </canvas>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'>
  	

  </script>
	<?php 
  		include 'burnUp.php';
  	?>

    <button onclick="regresar()">Regresar</button>
</div>

    <div id="finalizados">

        <?php
            $sql = "SELECT nombre, descripcion, valor_sprint FROM sprint WHERE idproyecto = :idproyecto AND estado = 2";

            $consulta = $conexion->prepare($sql);

            $consulta->bindParam(':idproyecto', $_SESSION['idproyecto']);

            $consulta->execute();

            $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Valor del sprint</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data as $value) {
                    echo "<tr>";
                        echo "<td>".$value['nombre']."</td>";
                        echo "<td>".$value['descripcion']."</td>";
                        echo "<td>".$value['valor_sprint']."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
        


        <button onclick="regresar()">Regresar</button>
    </div>
</body>
</html>