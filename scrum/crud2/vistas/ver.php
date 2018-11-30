<?php

    $controlador = new controlador();

    if(isset($_GET['id']))
    {
        $row = $controlador->ver($_GET['id']);
    }
    else 
    {
        header('Location: index.php');
    }
?>

<b>Nombre:</b> <?php echo $row['nombre']; ?>
<br><br>

<b>Apellido:</b> <?php echo $row['apellido']; ?>
<br><br>

<b>Username:</b> <?php echo $row['username']; ?>
<br><br>

<b>Password:</b> <?php echo $row['password']; ?>
<br><br>

<b>Correo:</b> <?php echo $row['correo']; ?>
<br><br>
