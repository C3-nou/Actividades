<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
    if(!$_SESSION['username']){
        header('Location:index.php');
    }

//$_SESSION['password'] = $_POST['contrasena'];



?>
<!DOCTYPE html>
<html>
<head>
	<title>Logeado</title>
</head>
<header>
</header>
<body>
    <h1>Editar cuenta</h1>
	<form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value = <?php echo $_SESSION['idusuario'] ?>>
        <br>
        <input type="hidden" name="usuario" value = <?php echo $_SESSION['username'] ?>>
        <br>
        <label>Contraseña:</label>
        <input type="text" name="contrasena" value = <?php echo $_SESSION['password'] ?>>
        <br>
        <input type="hidden" name="correo" value = <?php echo $_SESSION['correo'] ?>>
        <br>
        <label>Foto de perfil:</label>
        <img src="../fotos/<?php echo $_SESSION['foto']; ?>" width="64px">
        <br>
        <input type="file" name="foto" accept="image/*">
        <br>
        <input type="submit" name="actualizar" value="Actualizar">
        <a href="index2.php">Regresar</a>
    </form>
</body>
</html>