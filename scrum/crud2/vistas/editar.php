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

if(isset($_POST['enviar']))
{
    $controlador->editar($_GET['id'], $_POST['nombre'], $_POST['apellido'], $_POST['username'], $_POST['password'], $_POST['correo']);
    header('Location: index.php');
}
?>

<form action="" method="POST">

    <h3>Nombre:</h3>
    <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
    <br><br>

    <h3>Apellido:</h3>
    <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>">
    <br><br>

    <h3>Nombre de usuario:</h3>
    <input type="text" name="username" value="<?php echo $row['username']; ?>">
    <br><br>

    <h3>Contraseña:</h3>
    <input type="text" name="password" value="<?php echo $row['password']; ?>">
    <br><br>

    <h3>Correo:</h3>
    <input type="text" name="correo" value="<?php echo $row['correo']; ?>">
    <br><br>

    <input type="submit" name="enviar" value="editar">
<form>