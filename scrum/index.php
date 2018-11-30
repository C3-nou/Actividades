<?php
//including the database connection file
include_once("conexion.php");
 
//fetching data in descending order (lastest entry first)
$result = $pdo->query("SELECT * FROM usuario");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php     
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {         
        echo "<tr>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellido']."</td>";
        echo "<td>".$row['correo']."</td>";
        echo "<td>".$row['username']."</td>";    
        echo "<td><a href=\"edit.php?id=$row[idusuario]\">Edit</a> | <a href=\"delete.php?id=$row[idusuario]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
</body>
</html