<?php

	//Incluimos la clase de conexión
	include_once('conn.php');

	class source
	{
		//Atributos principales
		private $id;
		private $nombre;
		private $apellido;
		private $username;
		private $pass;
		private $correo;

		private $conexion;

		//Métodos CRUD

		//constructor de la classe conexión
		public function __construct()
		{
			$this->conexion = new conn();
		}

		//Fijamos o establecemos el valor del atributo que venga a partir del formulario
		public function set($atributo, $contenido)
		{
			$this->$atributo = $contenido;
		}

		//Obtenemos el atributo o dato a través del formulario
		public function get($atributo)
		{
			return $this->atributo;
		}

		public function listar()
		{
			$sql="SELECT * FROM usuario";
			$resultado = $this->conexion->consultaCompleja($sql);
			return $resultado;
		}

		public function crear()
		{

			$sql2 = "SELECT * FROM usuario WHERE username = '{$this->username}' OR correo = '{$this->correo}' ";
			$resultado = $this->conexion->consultaCompleja($sql2);
			$num = $resultado->fetch(PDO::FETCH_ASSOC);

			if ($num != 0) {
				return false;
			} else {
				$sql = "INSERT INTO usuario (nombre, apellido, username, password,correo) 
				VALUES ('{$this->nombre}','{$this->apellido}','{$this->username}','{$this->pass}','{$this->correo}')";

				$this->conexion->consultaSimple($sql);
				return true;
				}				
		}

		public function eliminar()
		{
			$sql = "DELETE FROM usuario WHERE idusuario = '{$this->id}' ";
			$this->conexion->consultaSimple($sql);
		}

		public function ver()
		{
			$sql = "SELECT * FROM usuario WHERE idusuario = '{$this->id}' ";
			$resultado = $this->conexion->consultaCompleja($sql);
			$row = $resultado->fetch(PDO::FETCH_ASSOC);

			//Set interno

			$this->id = $row['idusuario'];
			$this->nombre = $row['nombre'];
			$this->apellido = $row['apellido'];
			$this->username = $row['username'];
			$this->pass = $row['password'];
			$this->correo = $row['correo'];

			return $row;
		}

		public function editar()
		{
			echo $sql = "UPDATE usuario SET nombre = '{$this->nombre}', apellido = '{$this->apellido}', username = '{$this->username}', correo = '{$this->correo}', password = '{$this->pass}' 
			WHERE idusuario = '{$this->id}'";

			$this->conexion->consultaSimple($sql);

		}
	}

?>