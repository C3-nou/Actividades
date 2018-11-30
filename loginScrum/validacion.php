<?php

include("conexion.php");

$conexion = new Conn();


	if(isset($_POST['enviado'])){

		$usuario = $_POST['username'];
		$pass = $_POST['password'];

		if(empty($usuario) || empty($pass)){
			echo '<script>alert("No puedes ingresar valores nulos");</script>';
		}else{
			$sql =  "SELECT * FROM usuario WHERE username =  :username  AND password = :password";

			$consulta = $conexion->prepare($sql);

			
			$consulta->execute(array('username' => $usuario, 'password' => $pass));
			
			$count = $consulta->rowCount();
			
			if($count){
				session_start();
				$_SESSION['usuario'] = true;
				header('Location:index2.php');					
			}else{
				echo "El usuario o contraseña no coincide";	
			}

			}
		}

		if(isset($_POST['cerrarSesion'])){
			session_start();
			$_SESSION['usuario'] = false;
			header('Location:index.php');
		}

	




?>