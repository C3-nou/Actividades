<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if (!$_SESSION['username']) {
    header('Location:index.php');
}

//$_SESSION['password'] = $_POST['contrasena'];



?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<header>
</header>

<body>
<a href="index2.php">X</a>
    <div class="contenedor">
        <div class="head">
            <h1>Editar cuenta</h1>
        </div>
        <div class="info">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value=<?php echo $_SESSION['idusuario'] ?>>
                <br>
                <input type="hidden" name="usuario" value=<?php echo $_SESSION['username'] ?>>
                <br>
                <label>Contraseña:</label><br>
                <input type="text" name="contrasena" value=<?php echo $_SESSION['password'] ?>>
                <br>
                <input type="hidden" name="correo" value=<?php echo $_SESSION['correo'] ?>>
                <br>
                <label>Foto de perfil:</label><br>
                <img class="fot" src="../fotos/<?php echo $_SESSION['foto']; ?>" width="64px">
                <br>
                <input type="file" name="foto" accept="image/*">
                <br>
                <input type="submit" name="actualizar" value="Actualizar">
            </form>
        </div>
    </div>
</body>

</html> 