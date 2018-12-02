<?php 

include("enviar.php");
//validamos que exista una session
session_start();
if($_SESSION['usuario'] != true){
	header('Location:index.php');
}

?>
<!DOCTYPE html>
 <html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <header>
            <form method="POST" action="">
                <input type="submit" name="cerrarSesion" value="Cerrar Sesión">
            </form>
        <header>
        <h1> Bienvenido <?php $username ?></h1>   
    </body>
</html>