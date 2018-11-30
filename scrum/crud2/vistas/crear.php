<?php 
    $controlador = new controlador();
    if(isset($_POST['enviar']))
    {
        $resultado = $controlador->crear($_POST['nombre'],$_POST['apellido'],$_POST['username'],$_POST['pass'],$_POST['correo']);
        if($resultado)
        {
            echo "Se ha registrado exitosamente a un nuevo usuario";
        }else
        {
            echo "El usuario que intenta ingresar, ya existe en el sistema";
        }
    }
?>
<h1>
    <b>
        Registro de un nuevo usuario
    </b>
</h1>

<hr>

<form action="" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required="">
    <br><br>
    <label>Apellido:</label>
    <input type="text" name="apellido" required="">
    <br><br>
    <label>Nombre de usuario:</label>
    <input type="text" name="username" required="">
    <br><br>
    <label>Contraseña:</label>
    <input type="password" name="pass" required="">
    <br><br>
    <label>Correo:</label>
    <input type="email" name="correo" required="">
    <br><br>
    <input type="submit" name="enviar" value="crear">
</form>