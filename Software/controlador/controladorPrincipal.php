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
		//$fecha = date('d-m-Y');
		$descripcion = $_POST['descripcion'];

		if($validaciones->Camponull($nombre)||
			$validaciones->Camponull($descripcion)){
			$acciones->InsertTmpProyecto($nombre, $descripcion, $_SESSION['idusuario']);
			/*$acciones->InsertProyecto($_SESSION['idusuario'], $nombre, $descripcion, $fecha, 1);
			$acciones->InsertDatos();*/
			header('Location:add-miembros2.php');
		}else{
			return false;
		}
	}



	//Valido el evento de la vista add-miembros2.php
	if(isset($_POST['addmiembro'])){

		$proyecto = $acciones->selectProyecto($_SESSION['idusuario']);

		$nombreProyecto = $proyecto[0]['nombre'];
		$descripcionProyecto = $proyecto[0]['descripcion'];
		$fecha = date('d-m-Y');

		$acciones->InsertProyecto($_SESSION['idusuario'], $nombreProyecto, $descripcionProyecto,$fecha, 1);
		//$acciones->InsertDatos();
		
		//Consigo el valor del id del proyecto que se esta creando mediante el usuario que esta creando el proyecto.
		$idproyecto = $acciones->datoProyecto($_SESSION['idusuario']);
		//Convierto al array idproyecto y guardo su valor en idproyecto2
		$idproyecto2 = implode($idproyecto);

		$_SESSION['idproyecto'] = $idproyecto2;

		//Obtengo el listado de desarrolladores
		$datos = $acciones->Obtenertmp();

		//Obtengo el id del scrum master
		$idsm = $acciones->Usuariosm($_SESSION['yeye']);
		//Guardo el valor del array idsm en la variabl sm
		$sm = implode($idsm);

		//creo el array idsv
		$idsv = array();

		//ciclo para obtener el id de cada desarrollador
		for ($i=0; $i < count($datos); $i++) {
			//añado el id al array creado en la línea 124 
			array_push($idsv, $acciones->Usuariodv($datos[$i]));
		}

		$acciones->InsertSm($sm, $idproyecto2);

		//Ciclo para añadir a los desarrolladores
			//envío cada uno de los id de los desarrolladores 

		$acciones->InsertDv($idsv, $idproyecto2);

		$acciones->Deletetmp();
		$acciones->DeleteProyectotmp();

		header('Location:add-sprint.php');
	}


	//Cóigo para añadir un sprint
	if(isset($_POST['addSprint'])){
		$id = $_SESSION['idproyecto'];
		$nombre = $_POST['nameSprint'];
		$fecha = date('d-m-Y');
		$descripcion = $_POST['descripcion'];
		$duracion = $_POST['select'];
		$fechaFin = date('d-m-Y', strtotime($fecha.'+'.$duracion.' days'));

		if($validaciones->Camponull($id)||
			$validaciones->Camponull($nombre)||
			$validaciones->Camponull($fecha)||
			$validaciones->Camponull($duracion)){
			$acciones->InsertSprint($id, $nombre, $descripcion, $fecha, $fechaFin, $duracion);
			//header("Location:index-proyecto.php");
		}else{
			return false;
		}
	}

	if(isset($_POST['cancelar'])){
		header('Location:index2.php');
	}

	if(isset($_POST['regresarProyecto'])){
		header('Location: index2.php');
	}

	if(isset($_POST['regresarSprint'])){
		header('Location: index-proyecto.php');
	}

	if(isset($_POST['regresarTarea'])){
		header('Location: kanban.php');
	}

	if(isset($_GET) && isset($_GET['idproyecto'])){
		$_SESSION['idproyecto'] = $_GET['idproyecto'];
	}

	if(isset($_GET) && isset($_GET['idsprint'])){
		$_SESSION['idsprint'] = $_GET['idsprint'];
	}

	if(isset($_GET) && isset($_GET['idtarea'])){
		$_SESSION['idtarea'] = $_GET['idtarea'];
	}

	if(isset($_GET) && isset($_GET['eliminar'])){
		$acciones->EliminarProyecto($_GET['eliminar']);
		header('Location: ../vistas/index2.php');
	}

	if(isset($_GET) && isset($_GET['finalizar'])){
		$acciones->FinalizarProyecto($_GET['finalizar']);
		header('Location: ../vistas/index2.php');
	}

	if(isset($_GET) && isset($_GET['abandonar'])){
		$acciones->AbandonarProyecto($_SESSION['idusuario'], $_GET['abandonar']);
		header('Location: ../vistas/index2.php');
	}

	if(isset($_GET) && isset($_GET['deleteSprint'])){
		$acciones->DeleteSprint($_GET['deleteSprint']);
		header('Location: ../vistas/index-proyecto.php');
	}

	if(isset($_GET) && isset($_GET['finalizarSprint'])){
		$acciones->FinalizarSprint($_GET['finalizarSprint']);
		header('Location: ../vistas/index-proyecto.php');
	}

	if(isset($_GET) && isset($_GET['deleteTarea'])){
		$acciones->DeleteTarea($_GET['deleteTarea']);
		header('Location: ../vistas/kanban.php');
	}

	if(isset($_POST['addtareas'])){
		$nombre = $_POST['nameTarea'];
		$descripcion = $_POST['descripcion'];
		$valor = $_POST['value'];

		$acciones->InsertTarea($nombre, $descripcion, $valor, $_SESSION['idsprint']);

		header('Location:kanban.php');
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

	if(isset($_POST['updateTarea'])){
		$nombre = $_POST['nameTarea'];
		$descripcion = $_POST['descripcion'];

		$acciones->UpdateTarea($nombre, $descripcion, 1);
	}

	if(isset($_POST['updateSprint'])){
		$nombre = $_POST['nameSprint'];
		$descripcion = $_POST['descripcion'];

		$acciones->UpdateSprint($nombre, $descripcion, $_SESSION['idsprint']);

		header('Location: index-proyecto.php');
	}

	if(isset($_GET) && isset($_GET['id']) && isset($_GET['estado'])){
		$id = $_GET['id'];
		$estado = $_GET['estado'];

		if(!empty($estado)){
			$acciones->UpdateEstadosTarea($estado, $id);
		}

		header('Location: ../vistas/kanban.php');
	}

	if(isset($_POST['udpateProyecto'])){
		$nombre = $_POST['nombreProyecto'];
		$descripcion = $_POST['descripcion'];

		$acciones->UpdateProyecto($nombre, $descripcion, $_SESSION['idproyecto']);

		header('Location: index2.php');
	}

	if(isset($_POST['cerrarSesion'])){
		//Cerramos la sesi�n
		$sesiones->CerrarSesion();
	}


	//Subir archivo
	if (isset($_POST['hola'])) 
    {
		//variable
		$name = $_POST['name'];
		$elemento =strtolower($name);
		$dato = str_replace(' ','_',$elemento);
		$fecha = date('d-m-Y');
        $ruta = "../documentos/";
		$nombre = $_FILES['archivo']['name'];
		$nombres = strtolower($nombre);
		$dato2 = str_replace(' ','_',$nombres);
		//nombre del archivo
        // $nom_temporal = $_FILES['documento']['tmp_name']; //nombre archivo temporal
		//$tipo = stristr($nombre,'.');
		//$type = $_FILES['archivo']['type'];
		$url = $_FILES['archivo']['tmp_name'];
		$N = 1;
		
		$direccion = $ruta.$dato2;

            if (copy($url, $direccion)) {
				$acciones->InsertDocument($dato, $fecha, $_SESSION['idproyecto'], $_SESSION['idsprint'], $_SESSION['idusuario'],$dato2);
                header('location: ../vistas/documentacion.php');

            }else{
                echo "error, revise de nuevo";
                
            }
	}
	
	if(isset($_GET['borrarDocumento'])){
		$acciones->DeleteDocument($_GET['borrarDocumento']);
		header('Location: ../vistas/documentacion.php');
	}


?>