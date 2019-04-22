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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<?php include("header.php") ?>

<?php

$data = "SELECT finicio, fechafinal, valor_sprint FROM sprint WHERE idsprint = :idsprint";

$consul = $conexion->prepare($data);

$consul->bindParam(':idsprint', $_SESSION['idsprint']);

$consul->execute();

$fechas = $consul->fetch(PDO::FETCH_ASSOC);

$finicio = date("d/m/Y", strtotime($fechas['finicio']));
$fechafinal = date("d/m/Y", strtotime($fechas['fechafinal']));
$value = $fechas['valor_sprint'];

//echo $finicio.'<br>'.$fechafinal.'<br>'.$value;

$sql = "SELECT * FROM tarea WHERE estado = 3 AND id_sprint = :idsprint";
$consulta = $conexion->prepare($sql);

$consulta->bindParam(':idsprint', $_SESSION['idsprint']);

$consulta->execute();

$data = $consulta->fetchAll(PDO::FETCH_ASSOC);

//var_dump($data);

$i = 0;

foreach($data as $valor){

	echo $valor['nombre'];
	echo "<br>";
	$i++;

}

?>

<?php
	$top = $value;
	$fecha3 = $fechafinal;
    $fecha2 = $finicio;
    
    //echo (int) $fecha3- (int) $fecha2;
	$diff = (int) $fecha3 - (int) $fecha2;
	$rendimiento = $top;
	$graficam = "";

	//echo $diff->days . ' days<br> ';
	$day = $diff;

	//instruccion SQL.
	$sql = "SELECT * FROM tarea";

	//Estructura de muestra.
	$consulta = $conexion->prepare($sql);
	$consulta->execute();

	$arreglo = array();
	$contarray = 0;

	while($user = $consulta->fetch(PDO::FETCH_ASSOC)){ 
        $f = date("d/m/Y", strtotime($user['fecha']));
		/*$p = $f[8].$f[9]."-".$f[5].$f[6]."-".$f[0].$f[1].$f[2].$f[3];
		
		$fecha1 = new DateTime($p);*/
 		
 		$nose = (int) $fecha2- (int) $f;

      //echo $user['nombre']. $user['valor'] . $user['fecha'] . $user['estado'] . " = " . $nose->days."<br>";  
     
      $arreglo[$contarray][0] = $user['nombre'];
      $arreglo[$contarray][1] = $user['valor'];
      $arreglo[$contarray][2] = $user['fecha'];
      $arreglo[$contarray][3] = $user['estado'];
      $arreglo[$contarray][4] = $nose;

      $contarray++;

    }

	$division = round($top / $day);
	
	$d = "";
	$linea = "";
	for ($i = 0; $i <= $day; $i++) { 
		if ($i == 0){
			$linea = $top ;	
			$d = $i; 
		}else{ 
			$linea =  $linea.", ". $top ;
			$d = $d . ", ". $i; 
		}
		$top = $top - $division;

		for ($j = 0; $j < $contarray; $j++){
			if ($arreglo[$j][4] == $i && $arreglo[$j][3] == 3){
				$rendimiento = $rendimiento - $arreglo[$j][1];
			}
		}
		if ($graficam == ""){
	      	$graficam = $rendimiento;
	    }else{
	      	$graficam = $graficam .", ". $rendimiento;
	    }

	}
	$cont = "[ ". $linea . " ]";
	$days = "[ ". $d . " ]";
	$dios = "[ ". $graficam . " ]";

?>
  <canvas id = "speedChart">
  </canvas>
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'>
  	

  </script>
	<?php 
  		include 'burndown.php';
  	?>
</body>
</html>