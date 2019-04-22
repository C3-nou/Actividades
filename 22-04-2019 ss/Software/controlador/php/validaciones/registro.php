<?php

class RegistroValidaciones{

    /*Functiones Generales, aquí chequeamos que la información del formulario de registro 
    cumpla con las características requeridas.*/

    //En esta función validamos que el valor escrito en el input nombre cumpla con las características deseadas.
    public function Nombre($nombre){
        if ($this->CamposVacios($nombre) && $this->CantidadCaracteres($nombre) && $this->CaracteresAlfanumericosNombres($nombre) && $this->SoloLetras($nombre)) {
            # code...
        }else{
            return false;
        }
    }

    //En esta función validamos que el valor escrito en el input apellido cumpla con las características deseadas.
    public function Apellido($apellido){
        if ($apellido) {
            # code...
        }else{
            return false;
        }
    }

    //En esta función validamos que el valor escrito en el input username cumpla con las características deseadas.
    public function Username($username){
        if ($username) {
            # code...
        }else{
            return false;
        }
    }

    //En esta función validamos que el valor escrito en el input password cumpla con las características deseadas.
    public function Password($password){
        if ($password) {
            # code...
        }else{
            return false;
        }
    }

    //En esta función validamos que el valor escrito en el input correo cumpla con las características deseadas.
    public function Correo($correo){
        if ($correo) {
            # code...
        }else{
            return false;
        }
    }

    //En esta función validamos que el checkbox haya sido chequeado (aceptando los terminos y condiciones del aplicativo).
    public function Checkbox($data){
        if ($correo) {
            # code...
        }else{
            return false;
        }
    }

    /*Funciones de depuramiento de los datos*/

    //Esta function quitará las mayúsculas a todos los campos
    public function QuitarMayuscula($data){
        $result = strtolower($data);
		return $result;
    }

    //Eliminar los espacios que tenga el valor al inicio y el final
	public function QuitarEspacios($data){
		$result = trim($data);
		return $result;
    }
    
    //Reemplazar los espacios entre contenido
	public function EliminarEspaciado($data){
		$result = str_replace(" ","_", $data);
        return $result;
    }
    
    /*Funciones para la validación de los campos*/

    //Validación de campos vacíos
	public function CamposVacios($data){
		if(!empty($data)){
			return true;
		}else{
			$this->errores->GenerarAlertas('vacio');
		}
	}

    //Validación sobre la cantidad de caracteres
	public function CantidadCaracteres($data){

        $result = strlen($data);

		if($result < 30){
			return true;
		}else{
			$this->errores->GenerarAlertas('caracteresNombre');
		}
	}

	//Validación de que la data sea solo alfanumerica con una cantidad mínima de caracteres de 5 y máximo 20
	public function CaracteresAlfanumericosNombres($data){

		$metadato = "/^[\w]{5,20}/";

        if(preg_match($metadato, $data)){
            return true;
        }else{
            $this->errores->GenerarAlertas('alfanumericosNombre');
        }
    }
    
    //Función encargada de validar el correo
    public function ValidarCorreo($data){

		$metadato = "/misena.edu.co/";

		if(preg_match($metadato, $data)){
            return true;
        }else{
            $this->errores->GenerarAlertas('validaciónCorreo');
        }
    }

    //Validación de caracteres numericos solo enteros
	public function SoloEnteros($data){
		if(ctype_digit($data)){
			return true;
		}else{
			$this->errores->GenerarAlertas('validarEnteros');
		}
    }
    
    //Función encargado de verificar que no hayan numeros en los campos
    public function SoloLetras($data){
        $metadato = "/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]+[+a-zA-ZáéíóúÁÉÍÓÚ]|[a-zA-ZáéíóúÁÉÍÓÚ]/";

        if(preg_match($metadato, $variable)){
            return true;
        }else{
            Errores($mensaje = "letras");
            return false;
        }
    }
    
    //Función encargada de validar que los caracteres no cuenten con caracteres especiales
    public function CaracteresEspeciales($data){

    }
}

?>