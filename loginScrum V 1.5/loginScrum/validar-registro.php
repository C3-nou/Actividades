<?php

include_once("conexion.php");

include_once("validar.php");

class registro extends Conn
{
    private $conexion;
    private $funciones;

    function __Construct(){
        $this->conexion = new Conn();
        $this->funciones = new Validacion();
    }

    public function Nombre($nombre){
        if($this->CantidadCaracteres($nombre) && $this->SoloLetras($nombre)){
            return true;
        }else{
            return false;
        }
    }

    public function Apellido($apellido){
        if($this->CantidadCaracteres($apellido) && $this->SoloLetras($apellido)){
            return true;
        }else{
            return false;
        }
    }

    public function Usuario($usuario){
        if(CantidadCaracteres($usuario) && ValidaUsuario($usuario)){
            return true;
        }else{
            return false;
        }
    }

    public function Correo($correo){
        if(CantidadCaracteres($correo) && ValidaUsuario($correo)){
            return true;
        }else{
            return false;
        }
    }

    public function Contrasena($contrasena){
        if(CantidadCaracteres($contrasena) && validaCorreo($contrasena)){
            return true;
        }else{
            return false;
        }
    }

    public function CantidadCaracteres($variable){
        if(strlen($variable) > 20){
            echo "La cantidad de caracteres son muchos".$variable;
            return false;
        }else{
            return true;
        }
    }

    public function SoloLetras($variable){
        $metadato = "/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+[+a-zA-ZáéíóúÁÉÍÓÚ]|[a-zA-ZáéíóúÁÉÍÓÚ]/";

        if(preg_match($metadato, $variable)){
            return true;
        }else{
            echo "Valor invalido del campo".$variable;
            return false;
        }
    }

    public function validaCorreo($variable){
        $metadato = "\w+@+\w+\.+[a-z]{2,6}";
        if(preg_match($metadato, $variable)){
            return true;
        }else{
            return false;
        }
    }

    public function ValidaUsuario($variable){
        $metadato = "/^[\w]{5,20}/";
        if(preg_match($metadato, $variable)){
            return true;
        }else{
            return false;
        }
    }

    public function InsertUser($nombre, $apellido, $usuario, $correo, $contrasena){

        $sql = "INSERT INTO usuario VALUES ('$nombre','$apellido','$usuario','$correo','$contrasena')";
    
        $consulta = $this->conexion->prepare($sql);
    
        $consulta->execute();
    
    }
}

?>