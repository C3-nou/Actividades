<?php

include_once("../controlador/controladorPrincipal.php");

include_once("../conexion.php");

include_once('../controlador/errores.php');

class Acciones{

    private $conexion;
	private $count;
	private $consultas;

	private $idusuario;
	private $idproyecto;

	function __construct()
	{
		$this->conexion = new Conn();
		$this->sesiones = new Sesiones();
	}

	public function getCount(){
		return $this->count;
	}

	public function setCount($count){
		$this->count = $count;
	}

	public function getConsulta(){
		return $this->consultas;
	}

	public function setConsultas($consulta){
		$this->consultas = $consulta;
	}

	public function getIdproyecto(){
		return $this->idproyecto;
	}

	public function setIdproyecto($idproyecto){
		$this->idproyecto = $idproyecto;
	}

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($idusuario){
		$this->idusuario = $idusuario;
	}

    public function InsertUser($nombre, $apellido, $usuario, $correo, $contrasena){

        $sql = "INSERT INTO usuario (nombre, apellido, username, correo, password) VALUES (:nombre, :apellido, :usuario, :correo, :contrasena)";
    
		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':apellido', $apellido);
		$consulta->bindParam(':usuario', $usuario);
		$consulta->bindParam(':correo', $correo);
		$consulta->bindParam(':contrasena', $contrasena);

		$consulta->execute();
		
    }

    public function SendAction($usuario, $pass, $correo){

		$sql =  "SELECT * FROM usuario WHERE username =  :usuario AND password = :pass OR correo = :correo";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(":usuario", $usuario);
		$consulta->bindParam(":pass", $pass);
		$consulta->bindParam(":correo", $correo);

		$consulta->execute();
		$this->count = $consulta->rowCount();

			$this->setConsultas($consulta);
	}

	public function UpdatePerfil($id, $usuario, $correo, $password, $foto){
		$sql = "UPDATE usuario set password = :password, rutafoto = :foto WHERE idusuario = :id AND username = :usuario AND correo = :correo";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(":id", $id);
		$consulta->bindParam(":usuario", $usuario);
		$consulta->bindParam(":correo", $correo);
		$consulta->bindParam(":password", $password);
		$consulta->bindParam(":foto", $foto);

		$consulta->execute();

	}

	public function InsertProyecto($id, $nombre, $descripcion, $fechaInicio, $estado){
		$sql = "INSERT INTO proyecto (idusuario, nombre, descripcion, fechainicio, estado) VALUES (:id, :nombre, :descripcion, :fecha, :estado)";

		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':id', $id);
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':fecha', $fechaInicio);
		$consulta->bindParam(':estado', $estado);

		$consulta->execute();
		
		$sql2 = "SELECT idproyecto FROM proyecto WHERE idproyecto=(SELECT MAX(idproyecto) FROM proyecto WHERE idusuario = :id)";

		$consultas = $this->conexion->prepare($sql2);

		$consultas->bindParam(':id', $id);

		$consultas->execute();

		$this->InsertMiembro($consultas, $id);
	}

	public function InsertMiembro($consultas, $id){

		$dato = $consultas->fetch(PDO::FETCH_ASSOC);

		$idproyecto = implode($dato);

		$sql = "INSERT INTO miembro (idproyecto, idusuario, idrol, estado) VALUES (:idproyecto, :idusuario, 3, 1)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idproyecto', $idproyecto);
		$consulta->bindParam(':idusuario', $id);

		$this->setIdproyecto($idproyecto);
		$this->setIdusuario($id);

		$consulta->execute();
	}

	public function InsertSprint($id, $nombre,$descripcion, $fechaInicio, $fechafinal){
		$sql = "INSERT INTO sprint (idproyecto , nombre, descripcion, finicio, fechafinal) VALUES (:id, :nombre, :descripcion, :fecha, :fechafinal)";

		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':id', $id);
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':fecha', $fechaInicio);
		$consulta->bindParam(':fechafinal', $fechafinal);

		$consulta->execute();
	
	}

	public function InsertDatos(){
		$sql="INSERT INTO datos (idusuario, idproyecto) VALUES (:idusuario, :idproyecto)";

		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':idusuario', $this->getIdusuario());
		$consulta->bindParam(':idproyecto', $this->getIdproyecto());

		$consulta->execute();
	}

	public function CicloProyectos(){
		$sql = "SELECT idproyecto, nombre, descripcion, fechainicio FROM proyecto WHERE idusuario = :usuario";

		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':usuario', $_SESSION['idusuario']);

		$consulta->execute();

		$this->count = $consulta->rowCount();

		return $consulta;
	}

	public function CicloSprint($variable){
		$sql = "SELECT idsprint, idproyecto, nombre, descripcion, finicio FROM sprint WHERE idproyecto = :id";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':id', $variable);

		$consulta->execute();

		$this->count = $consulta->rowCount();

		return $consulta;
	}

	public function dragdrop($estado, $idsprint){
		$sql = "SELECT * FROM tarea WHERE estado = :estado AND id_sprint = :idsprint";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':estado', $estado);
		$consulta->bindParam(':idsprint', $idsprint);

		$consulta->execute();

		$this->count = $consulta->rowCount();

		return $consulta;
	}

}

?>