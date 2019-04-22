<?php

include_once("../controlador/controladorPrincipal.php");

include_once("conexion.php");

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

	public function InsertTmpProyecto($nombre, $descripcion, $idusuario){
		$sql = "INSERT INTO proyectotmp (nombre, descripcion, idusuario) VALUES (:nombre, :descripcion, :idusuario)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':nombre',$nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':idusuario', $idusuario);

		$consulta->execute();
	}

	public function selectProyecto($idusuario){
		$sql="SELECT nombre, descripcion FROM proyectotmp WHERE idusuario = :idusuario";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idusuario', $idusuario);

		$consulta->execute();

		return $consulta->fetchAll(PDO::FETCH_ASSOC);
	}

	public function InsertMiembro($consultas, $id){

		$dato = $consultas->fetch(PDO::FETCH_ASSOC);

		$idproyecto = implode($dato);

		$sql = "INSERT INTO miembro (idproyecto, idusuario, idrol, estado) VALUES (:idproyecto, :idusuario, 3, 1)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idproyecto', $idproyecto);
		$consulta->bindParam(':idusuario', $id);

		/*$this->setIdproyecto($idproyecto);
		$this->setIdusuario($id);*/

		$consulta->execute();
	}

	public function InsertSprint($id, $nombre,$descripcion, $fechaInicio, $fechafinal, $duracion){
		$sql = "SELECT valor FROM conversor WHERE semanas = :semanas";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':semanas', $duracion);

		$consulta->execute();

		$valor = $consulta->fetch(PDO::FETCH_COLUMN);

		
		$sql = "INSERT INTO sprint (idproyecto , nombre, descripcion, finicio, fechafinal, valor_sprint) VALUES (:id, :nombre, :descripcion, :fecha, :fechafinal, :valor)";

		$consulta = $this->conexion->prepare($sql);
		
		$consulta->bindParam(':id', $id);
		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':fecha', $fechaInicio);
		$consulta->bindParam(':fechafinal', $fechafinal);
		$consulta->bindParam(':valor', $valor);

		$consulta->execute();
	
	}

	public function CicloMiembro($idusuario){

		$estado = 1;
		$sql = "SELECT idproyecto FROM miembro WHERE idusuario = :usuario AND estado = :estado";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':usuario', $idusuario);
		$consulta->bindParam(':estado', $estado);

		$consulta->execute();

		$this->count = $consulta->rowCount();

		return $consulta->fetchAll(PDO::FETCH_COLUMN);
	}

	public function cicloRol($idusuario, $idproyecto){
		$sql="SELECT idrol FROM miembro WHERE idusuario = :usuario AND idproyecto = :proyecto";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':usuario', $idusuario);
		$consulta->bindParam(':proyecto', $idproyecto);

		$consulta->execute();

		return $consulta->fetch(PDO::FETCH_COLUMN);
	}

	public function CicloProyectos($idproyecto){

		$estado = 1;

			$sql = "SELECT idproyecto, nombre, descripcion, fechainicio FROM proyecto WHERE delete is null AND estado = :estado AND idproyecto in ({$idproyecto})";

			$consulta = $this->conexion->prepare($sql);

			$consulta->bindParam(':estado', $estado);
				
			$consulta->execute();
	
			$this->count = $consulta->rowCount();
	
			return $consulta;
	}

	public function CicloSprint($variable){
		$estado = 1;
		$sql = "SELECT idsprint, idproyecto, nombre, descripcion, finicio FROM sprint WHERE delete is null AND estado = :estado AND idproyecto = :id";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':id', $variable);
		$consulta->bindParam(':estado', $estado);

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

	public function datoProyecto($idusuario){
		$sql = "SELECT idproyecto FROM proyecto WHERE idusuario = :id AND idproyecto = (SELECT MAX(idproyecto) FROM proyecto WHERE idusuario = :id)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':id', $idusuario);

		$consulta->execute();

		return $consulta->fetch(PDO::FETCH_ASSOC);
	}

	public function Usuariosm($usuario){
		$sql = "SELECT idusuario FROM usuario WHERE username = :username";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':username', $usuario);

		$consulta->execute();

		return $consulta->fetch(PDO::FETCH_ASSOC);

	}

	public function Usuariodv($usuario){
		$sql = "SELECT idusuario FROM usuario WHERE username = :username";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':username', $usuario);

		$consulta->execute();

		return $consulta->fetch(PDO::FETCH_COLUMN);

	}

	public function InvitacionSm($id, $proyecto){

		$sql = "INSERT INTO invitacion (idemisor, idreceptor, rol, estado, idproyecto) VALUES (:idemisor, :idreceptor, 1, 1, :proyecto)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idemisor', $_SESSION['idusuario']);
		$consulta->bindParam(':proyecto', $proyecto);
		$consulta->bindParam(':idreceptor', $id);

		$consulta->execute();
	}

	public function InvitacionDv($usuario, $proyecto){
		for ($i=0; $i < count($usuario); $i++) { 
			$sql = "INSERT INTO invitacion (idemisor, idreceptor, rol, estado, idproyecto) VALUES (:idemisor, :idreceptor, 2, 1, :proyecto)";

			$consulta = $this->conexion->prepare($sql);

			$consulta->bindParam(':idemisor', $_SESSION['idusuario']);
			$consulta->bindParam(':proyecto', $proyecto);
			$consulta->bindParam(':idreceptor', $usuario[$i]);
	
			$consulta->execute();
		}
	}

	public function Invitacion($id){
		$sql = "SELECT idemisor, rol, idproyecto FROM invitacion WHERE idreceptor = :idreceptor AND estado = 1";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idreceptor', $id);

		$consulta->execute();

		return $consulta->fetchAll(PDO::FETCH_ASSOC);
	}

	public function ConvertEmisor($idemisor){
		$nombre = array();

		for ($i=0; $i < count($idemisor); $i++) { 
			$sql = "SELECT nombre FROM usuario WHERE idusuario = :idusuario";

			$consulta = $this->conexion->prepare($sql);
			$consulta->bindParam(':idusuario', $idemisor[$i]);
			$consulta->execute();

			array_push($nombre, $consulta->fetch(PDO::FETCH_ASSOC));
		}

		return $nombre;
	}

	public function ConvertProyecto($idproyecto){
		$nombre = array();

		for ($i=0; $i < count($idproyecto); $i++) { 
			$sql = "SELECT nombre FROM proyecto WHERE idproyecto = :idproyecto";

			$consulta = $this->conexion->prepare($sql);
			$consulta->bindParam(':idproyecto', $idproyecto[$i]);
			$consulta->execute();

			array_push($nombre, $consulta->fetch(PDO::FETCH_ASSOC));
		}

		return $nombre;
	}

	public function InsertSm($id, $proyecto, $rol){

		$sql = "INSERT INTO miembro (idproyecto, idusuario, idrol, estado) VALUES (:proyecto, :idusuario, :rol, 1)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':proyecto', $proyecto);
		$consulta->bindParam(':idusuario', $id);
		$consulta->bindParam(':rol', $rol);

		$consulta->execute();

		$sql = "UPDATE invitacion SET estado = 3 WHERE idreceptor = :idreceptor AND idproyecto = :idproyecto AND rol = :rol";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idreceptor', $idusuario);
		$consulta->bindParam(':idproyecto', $idproyecto);
		$consulta->bindParam(':rol', $rol);

		$consulta->execute();
	}

	public function DeclinarInvitacion($idusuario, $idproyecto, $rol){

		$sql = "UPDATE invitacion SET estado = 2 WHERE idreceptor = :idreceptor AND idproyecto = :idproyecto AND rol = :rol";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idreceptor', $idusuario);
		$consulta->bindParam(':idproyecto', $idproyecto);
		$consulta->bindParam(':rol', $rol);

		$consulta->execute();

	}

	/*public function InsertDv($usuario, $proyecto){
		for ($i=0; $i < count($usuario); $i++) { 
			$sql = "INSERT INTO miembro (idproyecto, idusuario, idrol, estado) VALUES (:proyecto, :idusuario, 1, 1)";

			$consulta = $this->conexion->prepare($sql);

			$consulta->bindParam(':proyecto', $proyecto);
			$consulta->bindParam(':idusuario', $usuario[$i]);
	
			$consulta->execute();
		}
	}*/

	public function Obtenertmp(){
		$sql = "SELECT nombre FROM tmp WHERE estado = 1";
		$consulta = $this->conexion->prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_COLUMN);
	}

	public function Deletetmp(){
		$sql = "DELETE FROM tmp";
		$consulta = $this->conexion->prepare($sql);
		$consulta->execute();
	}

	public function DeleteProyectotmp(){
		$sql = "DELETE FROM proyectotmp";
		$consulta = $this->conexion->prepare($sql);
		$consulta->execute();
	}

	public function EliminarProyecto($idproyecto){
		$fecha = date('d-m-Y');
		$sql = "UPDATE proyecto SET delete = :fecha where idproyecto = :idproyecto";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':fecha',$fecha);
		$consulta->bindParam(':idproyecto',$idproyecto);

		$consulta->execute();

		$sql = "DELETE FROM invitacion where idproyecto = :idproyecto";

		$consulta = $this->conexion->prepare($sql);
		$consulta->bindParam(':idproyecto',$idproyecto);

		$consulta->execute();
	}

	public function FinalizarProyecto($idproyecto){
		$sql = "UPDATE proyecto SET estado = 2 where idproyecto = :idproyecto";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idproyecto',$idproyecto);

		$consulta->execute();
	}

	public function AbandonarProyecto($idusuario,$idproyecto){
		$sql="UPDATE miembro SET estado = 2 WHERE idproyecto = :idproyecto AND idusuario = :idusuario";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idproyecto',$idproyecto);
		$consulta->bindParam(':idusuario', $idusuario);

		$consulta->execute();
	}

	public function DeleteSprint($idsprint){
		$fecha = date('d-m-Y');
		$sql = "UPDATE sprint SET delete = :fecha WHERE idsprint = :idsprint";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':fecha',$fecha);
		$consulta->bindParam(':idsprint',$idsprint);

		$consulta->execute();
	}

	public function DeleteTarea($idtarea){

		$fecha = date('d-m-Y');
		$sql = "UPDATE tarea SET delete = :fecha WHERE id = :idtarea";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':fecha',$fecha);
		$consulta->bindParam(':idtarea',$idtarea);

		$consulta->execute();
	}

	public function FinalizarSprint($idsprint){
		$sql = "UPDATE sprint SET estado = 2 WHERE idsprint = :idsprint";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':idsprint',$idsprint);

		$consulta->execute();
	}

	public function InsertTarea($nombre, $descripcion, $valor, $idsprint){
		//var_dump($nombre, $descripcion, $valor, $idsprint);
		$sql = "INSERT INTO tarea (nombre, descripcion, valor,id_sprint, estado) VALUES (:nombre, :descripcion, :valor, :idsprint, 1)";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':valor', $valor);
		$consulta->bindParam(':idsprint', $idsprint);

		$consulta->execute();
	}

	public function UpdateSprint($nombre, $descripcion, $idsprint){

		$nombres = $nombre;

		$sql = "UPDATE sprint SET (nombre,descripcion) = (:nombre, :descripcion) WHERE idsprint = :idsprint";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':nombre', $nombres);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':idsprint', $idsprint);

		$consulta->execute();
	}

	public function UpdateProyecto($nombre,$descripcion,$idproyecto){

		$sql = "UPDATE proyecto SET (nombre,descripcion) = (:nombre, :descripcion) WHERE idproyecto = :idproyecto";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':nombre', $nombre);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':idproyecto', $idproyecto);

		$consulta->execute();
	}

	public function UpdateTarea($nombre, $descripcion, $idtarea){
		$nombres = (string) $nombre;

		$sql = "UPDATE tarea SET (nombre,descripcion) = (:nombre, :descripcion) WHERE id = :idtarea";

		$consulta = $this->conexion->prepare($sql);

		$consulta->bindParam(':nombre', $nombres);
		$consulta->bindParam(':descripcion', $descripcion);
		$consulta->bindParam(':idtarea', $idtarea);

		$consulta->execute();
	}

	public function UpdateEstadosTarea($estado, $id){
		$sql =  "UPDATE tarea SET estado = :estado WHERE id = :id ";

		$consulta = $this->conexion->prepare($sql);
	
		$consulta->bindParam(':estado',$estado);
		$consulta->bindParam(':id',$id);
	
		
		$consulta->execute();
	}

	public function InsertDocument($nombre, $fecha, $idproyecto, $idsprint, $idusuario, $rutaarchivo){
		$sql = "INSERT INTO reunion (nombre, fecha, idproyecto, idsprint, idusuario, rutaarchivo) VALUES (:nombre, :fecha, :idproyecto, :idsprint, :idusuario, :rutaarchivo)";
	
		$consulta = $this->conexion->prepare($sql);
	
		$consulta->bindParam(':nombre',$nombre);
		$consulta->bindParam(':fecha', $fecha);
		$consulta->bindParam(':idproyecto', $idproyecto);
		$consulta->bindParam(':idsprint', $idsprint);
		$consulta->bindParam(':idusuario', $idusuario);
		$consulta->bindParam(':rutaarchivo', $rutaarchivo);
	
		$consulta->execute();
	}
	
	public function DeleteDocument($idreunion){
		$sql = "DELETE FROM reunion WHERE idreunion = :idreunion";
	
		$consulta = $this->conexion->prepare($sql);
	
		$consulta->bindParam(':idreunion', $idreunion);
	
		$consulta->execute();
	}

}



?>