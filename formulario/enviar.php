<?php
include_once "conexion.php";
//creamos un odbjeto de la clase conexion
$conexion = new Conn();

//validamos que se haya hecho la accion enviar
if(isset($_POST['enviar']))
{
    //guardamos los datos en variables
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['username'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    //validamos desde el lado del servidor que los datos no se encuentren vacios
    if(empty($nombre) || empty($apellido) || empty($username) || empty($correo) || empty($password))
    {
            echo 'No puedes enviar campos vacíos';
    }else
    {
        //validamos que no exista un usuario con los mismos datos
        $sql =  "SELECT * FROM usuario WHERE username =  :username  OR correo = :correo";

        $consulta = $conexion->prepare($sql);

        $consulta->bindParam(":username", $username);
        $consulta->bindParam(":correo", $correo);
    
        $consulta->execute();
    
        $count = $consulta->rowCount();
    
        //validamos que la variable count traiga algun valor
        if($count)
        {
            echo 'Este usuario ya existe';					
        }else
        {
            //insertams los datos
            $sql = "INSERT INTO usuario  (nombre, apellido, username, correo, password) VALUES (:nombre, :apellido, :username, :correo, :password)";

            $insert = $conexion->prepare($sql);

            $insert->bindParam(":nombre",$nombre);
            $insert->bindParam(":apellido",$apellido);
            $insert->bindParam(":username",$username);
            $insert->bindParam(":correo",$correo);
            $insert->bindParam(":password",$password);

            $insert->execute();
            //creamos la session al index2 si es verdadera
            session_start();
            $_SESSION['usuario'] = true;
            header('Location:index2.php');       
        }
    }
}
//cerra session
if(isset($_POST['cerrarSesion']))
{
    session_start();
    $_SESSION['usuario'] = false;
    header('Location:index.php');
}


?>