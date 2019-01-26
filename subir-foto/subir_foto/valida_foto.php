<?php
require_once 'conexion.php';
if(isset($_POST['enviar'])){
$nom=$_REQUEST ["txtnom"];
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);


$sql =  "INSERT INTO foto (nombre,foto) VALUES (:nombre, :foto)";
$consulta = $pdo->prepare($sql);
$consulta->bindparam(':nombre', $nom);
$consulta->bindparam(':foto', $destino);
$consulta->execute();
header("Location:index.php");
}
?>
