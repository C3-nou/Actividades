<?php 
include('database.php');
$search = $_POST['search'];
$connexion = new Conn();
if(!empty($search)) {
  echo 'hola';
  $query = "SELECT * FROM username WHERE name LIKE '$search%'";
  $consulta = $connexion->query($query);
  
  if(!$connexion) {
    die('Query Error');
  }
  
  $json = array();
  while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $json[] = array(
      'name' => $row[0]['username'],
      'description' => $row['description'],
      'id' => $row['id']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>