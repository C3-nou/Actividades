<?php
//including the database connection file
include_once("../models/conexion.php");
include_once("../models/insert_calificacion.php");
 
//fetching data in descending order (lastest entry first)
$result = $pdo->query("SELECT * FROM usuario1 WHERE rol=3");
$contador = 1;
$count=1;
?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/calificaciones.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/bio.ico">
    <title>Restaurante_bio_prueba</title>
</head>
  <body> 
  <!-- vista del header -->
  <?php include_once('resources/header.php') ?>
  <!-- vista calificar -->
  <?php include_once('resources/calificar_admin.php') ?>
  <!-- vista del footer -->
 <?php include_once('resources/footer.php')?>

    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper/dist/popper.min.js"></script>
    <script src="js/login.js"></script>
    
  </body>
</html>