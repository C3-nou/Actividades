<?php


	function Errores($mensaje){
		switch ($mensaje) {
			case 'nulo':
				echo "El campo se encuentra vacío.";
				break;
			case 'cantidad':
				echo "La cantidad de caracteres no puede ser mayor a 20";
				break;
			case 'letras':
				echo "El campo solo debe contener letras";
				break;
			case 'correo':
				echo "El tipo de correo no es valido";
				break;
			case 'usuario':
				echo "El usuario es invalido";
				break;
			case 'contrasena':
				echo "La contraseña es invalida";
				break;
			case 'errorU':
				echo "El usuario o contraseña no coinciden";
				break;
			case 'usuarioE':
				echo "Este usuario ya existe";
			break;
		}
	}


?>