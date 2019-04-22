<?php 

class Sesiones{

	public function __construct(){
		include_once("session.php");
	}

    public function CrearSesion($variable){
		//var_dump($variable);
		if($user = $variable->fetch(PDO::FETCH_ASSOC)){
				//session_start();
				$_SESSION['idusuario'] = $user['idusuario'];
				$_SESSION['nombre'] = $user['nombre'];
				$_SESSION['apellido'] = $user['apellido'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['correo'] = $user['correo'];
				$_SESSION['password'] = $user['password'];
				$_SESSION['foto'] = $user['rutafoto'];
				header('Location:../vistas/index2.php');
		}
		
	}

	public function CerrarSesion(){
		//session_start();
		if($_SESSION['username']){
			session_destroy();
			header('Location:../vistas/index.php');
		}
	}

	public function UpdateSession($contrasena, $foto){
		//session_start();
		$_SESSION['password'] = $contrasena;
		$_SESSION['foto'] = $foto;

		echo $_SESSION['password']." ".$_SESSION['foto'];
	}

}

?>