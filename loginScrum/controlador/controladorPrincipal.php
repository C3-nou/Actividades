<?php

include_once("valorCampos.php");

include_once("validacionCampos.php");

include_once("../modelo/acciones.php");

include_once("sesiones.php");

include_once("errores.php");

include_once("ciclos.php");

include_once("session.php");

$campos = new Campos();
$validaciones = new Validaciones();
$acciones = new Acciones();
$sesiones = new Sesiones();
$ciclos = new Ciclos();

	if(isset($_POST['inicio'])){

		$campos->setUsuario($_POST['username']);
		$campos->setContrasena($_POST['password']);

		if($validaciones->Camponull($campos->getUsuario()) || $validaciones->Camponull($campos->getContrasena())){

			$acciones->sendAction($campos->getUsuario(), $campos->getContrasena(), $correo = null);

			if($acciones->getCount()){
				$sesiones->CrearSesion($acciones->getConsulta());
			}else{
				Errores($mensaje = "errorU");
			}

		}


	}
	
	if (isset($_POST['registro'])) {
			
			$campos->setNombre($_POST['nombre']);
			$campos->setApellido($_POST['apellido']);
			$campos->setUsuario($_POST['usuario']);
			$campos->setCorreo($_POST['correo']);
			$campos->setContrasena($_POST['contrasena']);

			if($validaciones->Camponull($campos->getNombre()) || 
				$validaciones->Camponull($campos->getApellido()) ||
				$validaciones->Camponull($campos->getUsuario()) ||
				$validaciones->Camponull($campos->getCorreo()) ||
				$validaciones->Camponull($campos->getContrasena())){
				
				$acciones->SendAction($campos->getUsuario(), $campos->getContrasena(), $campos->getCorreo());
				
				if($acciones->getCount()){
					Errores($mensaje = "usuarioE");
				}else{
					if($validaciones->Nombre($campos->getNombre()) && 
							$validaciones->Apellido($campos->getApellido()) &&
							$validaciones->Usuario($campos->getUsuario()) &&
							$validaciones->Correo($campos->getCorreo()) && 
							$validaciones->Contrasena($campos->getContrasena())){

						$acciones->InsertUser($campos->getNombre(),
												 $campos->getApellido(),
												 $campos->getUsuario(),
												 $campos->getCorreo(),
												 $campos->getContrasena());
						
						$acciones->SendAction($campos->getUsuario(),
												$campos->getContrasena(),
												$campos->getCorreo());
		
						if($acciones->getCount()){
							$sesiones->CrearSesion($acciones->getConsulta());
						}
						
					}
				}		
			}
	}

	if(isset($_POST['crearProyecto'])){
		$nombre = $_POST['nombreProyecto'];
		$fecha = date('d-m-Y');
		$descripcion = $_POST['descripcion'];

		if($validaciones->Camponull($nombre)||
			$validaciones->Camponull($fecha)||
			$validaciones->Camponull($descripcion)){
			$acciones->InsertProyecto($_SESSION['idusuario'], $nombre, $descripcion, $fecha, 1);
			$acciones->InsertDatos();
			header('Location:add-miembros.php');
		}else{
			return false;
		}
	}

	if(isset($_POST['cancelarProyecto'])){
		header('Location:index2.php');
	}

	if(isset($_POST['addSprint'])){
		$id = $_POST['id'];
		$nombre = $_POST['nameSprint'];
		$fecha = date('d-m-Y');
		$descripcion = $_POST['descripcion'];
		$duracion = $_POST['select'];
		$fechaFin = date('d-m-Y', strtotime($fecha.'+'.$duracion.' days'));

		if($validaciones->Camponull($id)||
			$validaciones->Camponull($nombre)||
			$validaciones->Camponull($fecha)||
			$validaciones->Camponull($duracion)){
			$acciones->InsertSprint($id, $nombre, $descripcion, $fecha, $fechaFin);
			header("Location:index-proyecto.php?id=$id");
		}else{
			return false;
		}
	}

	if(isset($_POST['cancelarSprint'])){
		$id = $_POST['id'];
		header("Location:index-proyecto.php?id=$id");
	}

	if(isset($_GET) && isset($_GET['id'])){
		$idproyecto = $_GET['id'];
	}

	if(isset($_GET) && isset($_GET['idsprint'])){
		$idsprint = $_GET['idsprint'];
	}

	if(isset($_POST['actualizar'])){
		
		$campos->setId($_POST['id']);
		$campos->setUsuario($_POST['usuario']);
		$campos->setCorreo($_POST['correo']);
		$campos->setContrasena($_POST['contrasena']);

		$foto = $_FILES["foto"]["name"];

		$ruta=$_FILES["foto"]["tmp_name"];
		$destino="../fotos/".$foto;
		copy($ruta,$destino);

		if($validaciones->Camponull($campos->getContrasena()) || $validaciones->Camponull($foto)){
			$acciones->UpdatePerfil($campos->getId(),
									$campos->getUsuario(),
									$campos->getCorreo(),
									$campos->getContrasena(),
									$destino);
			$sesiones->UpdateSession($campos->getContrasena(), $foto);
		} 
	}

	if(isset($_POST['cerrarSesion'])){
			
		//Cerramos la sesi�n
		$sesiones->CerrarSesion();
	
	}



?>