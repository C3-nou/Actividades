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
</body>
</html>