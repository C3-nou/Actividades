<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>SS</title>
</head>

<body>

<form action="" method="post">
<fieldset>
	<legend>Crear sprint</legend>
	<input type="text" name="nombre">
	<input type="text" name="descripcion">
	<select name="fechas" id="">
		<option value="7">1 semana</option>
		<option value="14">2 semanas</option>
		<option value="21">3 semanas</option>
		<option value="28">4 semanas</option>
	</select>
	<input type="submit" value="Crear sprint" name="enviar">
	</fieldset>
</form>

<form action="" method="post">
	<fieldset>
		<legend>Añadir tarea</legend>
		<input type="text" name="nombre">
		<input type="number" name="valor">
	</fieldset>
</form>

<?php



?>

<?php
	$top = 200;
	$fecha3 = new DateTime("29-03-2019");
	$fecha2 = new DateTime("1-03-2019");
	$diff = $fecha2->diff($fecha3);
	$rendimiento = $top;
	$graficam = "";

	echo $diff->days . ' days<br> ';
	$day = $diff->days."";

	require 'src/dataSource.php';
	require 'src/config.php';

	use ss\dataSource;

	//generamos la conexion
	$db = new dataSource($host, $user, $pass, $database, $port);

	//instruccion SQL.	
	$sql = "SELECT * 
			FROM tareas";

	//Estructura de muestra.
	$db->query($sql);

	$arreglo = array();
	$contarray = 0;

	while($user = $db->getData()){ 
		$f = $user['fecha']; 
		$p = $f[8].$f[9]."-".$f[5].$f[6]."-".$f[0].$f[1].$f[2].$f[3];
		
		$fecha1 = new DateTime($p);
 		
 		$nose = $fecha2->diff($fecha1);

      echo $user['nombre']. $user['valor'] . $user['fecha'] . $user['estado'] . " = " . $nose->days."<br>";  
     
      $arreglo[$contarray][0] = $user['nombre'];
      $arreglo[$contarray][1] = $user['valor'];
      $arreglo[$contarray][2] = $user['fecha'];
      $arreglo[$contarray][3] = $user['estado'];
      $arreglo[$contarray][4] = $nose->days."";

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
  		include 'js/index.php';
  	?>
  <script  src="js/index.js"></script>
</body>

</html>