<?php

include_once("conexion.php");

class Validacion extends Conn
{
	
	private $conexion;
	private $count;

	function __construct()
	{
		$this->conexion = new Conn();
	}

	public function getCount(){
		return $this->count;
	}

	public function setCount($count){
		$this->count = $count;
	}

	public function SendAction($usuario, $pass){
		
		//$sql =  "SELECT * FROM usuario WHERE username =  '$usuario'  AND password = '$pass'";

		$sql =  "SELECT * FROM usuario WHERE username =  :usuario  AND password = :pass";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(":usuario", $usuario);
		$consulta->bindParam(":pass", $pass);

      	$consulta->execute();

      	$this->count = $consulta->rowCount();
      	
	}

	public function Errores($variable, $mensaje){
		switch ($mensaje) {
			case 'nulo':
				echo "El campo se encuentra vacío.";
				break;
			
			default:
				# code...
				break;
		}
	}

	public function Camponull($variable){
		if(empty($variable)){
			$this->Errores($variable, $mensaje = "nulo");
			return false;
		}else{
			return true;
		}
	}
	/*public function nullValue(){

		echo '<script>alert("No puedes ingresar valores nulos");</script>';

	}*/

	public function CrearSesion(){
		session_start();
			$_SESSION['usuario'] = true;
			header('Location:index2.php');	
        	exit();
	}

	public function CerrarSesion(){
		session_start();
		$_SESSION['usuario'] = false;
		header('Location:index.php');
		exit();
	}

}

?>