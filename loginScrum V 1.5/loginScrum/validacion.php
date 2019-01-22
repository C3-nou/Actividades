<?php

//Incluimos la conexi�n
include_once("conexion.php");

//Incluimos el archivo con las funciones
include("validar.php");

include_once("validar-registro.php");

//Creamos el objeto de la Clase Validacion
$prueba = new Validacion();

$registro = new registro();

//Creamos el objeto de la conexi�n a la Base de Datos
$conexion = new Conn();

	//Validamos el envio del formulario
	if(isset($_POST['inicio'])){

		//Guardamos los valores de los campos en variables
		$usuario = $_POST['username'];
		$pass = $_POST['password'];


		//Validamos si alguno de los campos se encuentra vac�o
		if(empty($usuario) || empty($pass)){

			//Llamamos el m�todo nullValue() en caso de que alg�n campo se encuentre vac�o
			$prueba->nullValue();

		}else{
			
			/*Inyectamos los par�metros requeridos para realizar el m�todo SendAction() de la clase Validacion*/
			$prueba->SendAction($usuario,$pass);

			//Obtenemos el valor de la variable $count que nos indica la cantidad de usuarios 
			$count = $prueba->getCount();

			if($count){
				$prueba->CrearSesion();
			}else{
				echo "El usuario o contrase�a no coinciden";
			}

			}
		}elseif (isset($_POST['registro'])) {
			
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			/*$usuario = $_POST['usuario'];
			$correo = $_POST['correo'];
			$contrasena = $_POST['contrasena'];*/

			if(empty($nombre) || empty($apellido) /*|| empty($usuario) || empty($correo) || empty($contrasena)*/){

				$prueba->nullValue();

			}else{
				/*$prueba->SendAction($usuario, $contrasena);

				$count = $prueba->getCount();

				if($count){	
					echo "Este usuario ya existe";
				}else*/if ($registro->Nombre($nombre) && $registro->Apellido($apellido)){
					echo '<script>alert("Exito");</script>';
				}else{
					echo '<script>alert("Jodidos");</script>';
				}
			}

		}

		if(isset($_POST['cerrarSesion'])){
			
			//Cerramos la sesi�n
			$prueba->CerrarSesion();

	}

?>