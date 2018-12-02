<!DOCTYPE html>

<?php include_once "enviar.php";
//validamos que si existe una session lo direcciona al idex2
session_start();
if($_SESSION['usuario'] == true){
	header('Location:index2.php');
}

?>
 
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
           
            <h2> registrate </h2>

            <form  method="POST" action="">

                <input type="text"    name="nombre"   placeholder="nombre"   required=""/>     <br>
                   <br>
                <input type="text"    name="apellido" placeholder="apellido" required=""/>     <br>
                    <br>    
                <input type="text"    name="username" placeholder="username"  required=""/>     <br>
                    <br>
                <input type="email"   name="correo"   placeholder="correo"    required=""/>     <br>
                    <br>
                <input type="password" name="password" placeholder="password" required=""/>     <br>
                    <br>
                <input type="submit" name="enviar" value="registrar"/>
            </form>
    </body>
</html>