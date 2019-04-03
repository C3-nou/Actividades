<?php

include_once("errores.php");

class Validaciones
{

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
        if($this->CantidadCaracteres($usuario) && $this->ValidaUsuario($usuario)){
            return true;
        }else{
            return false;
        }
    }

    public function Correo($correo){
        if($this->CantidadCaracteres($correo) && $this->validaCorreo($correo)){
            return true;
        }else{
            return false;
        }
    }

    public function Contrasena($contrasena){
        if($this->CantidadCaracteres($contrasena) && $this->ValidaContrasena($contrasena)){
            return true;
        }else{
            return false;
        }
    }

    public function Camponull($variable){
		if(empty($variable)){
			Errores($mensaje = "nulo");
			return false;
		}else{
			return true;
		}
	}

    public function CantidadCaracteres($variable){
        if(strlen($variable) > 20){
            Errores($mensaje = "cantidad");
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
            Errores($mensaje = "letras");
            return false;
        }
    }

    public function validaCorreo($variable){
        $metadato = "/\w+@+\w+\.+[a-z]{2,6}/";
        if(preg_match($metadato, $variable)){
            return true;
        }else{
            Errores($mensaje = "correo");
            return false;
        }
    }

    public function ValidaUsuario($variable){
        $metadato = "/^[\w]{5,20}/";
        if(preg_match($metadato, $variable)){
            return true;
        }else{
            Errores($mensaje = "usuario");
            return false;
        }
    }

    public function ValidaContrasena($variable){
        $metadato = "/^[\w]{5,20}/";
        if(preg_match($metadato, $variable)){
            return true;
        }else{
            Errores($mensaje = "contrasena");
            return false;
        }
    }


}

?>