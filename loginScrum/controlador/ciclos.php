<?php 

include_once("session.php");
include_once("../modelo/acciones.php");

class Ciclos{

    private $acciones;

    public function __construct(){
        $this->acciones = new Acciones();
    }
    
    public function CicloProyectos($variable){
        while ($proyecto =$variable->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='div'>";
            echo "<div><a href=\"index-proyecto.php?idproyecto=$proyecto[idproyecto]\">";
            echo '<h3>'.$proyecto['nombre'].'</h3>';
            echo '<p>'.$proyecto['fechainicio'].'</p>';
            echo '<p>'.$proyecto['descripcion'].'</p>';
            echo '</a>';
            $rol = $this->acciones->cicloRol($_SESSION['idusuario'], $proyecto['idproyecto']);
            if($rol == 3){
                echo "<a href=\"update-proyecto.php?idproyecto=$proyecto[idproyecto]\"><h5>Modificar proyecto</h5></a>";
                echo "<input type='button' name='eliminar' value='Eliminar Proyecto' onclick='deleteProyecto(".$proyecto['idproyecto'].")'>";
                //echo "<a href=\"eliminar-proyecto.php?idproyecto=$proyecto[idproyecto]\"><h5>Eliminar proyecto</h5></a>";
                echo "<input type='button' name='finalizar' value='Finalizar Proyecto' onclick='finalizarProyecto(".$proyecto['idproyecto'].")'>";
                //echo "<a href=\"finalizar-proyecto.php?idproyecto=$proyecto[idproyecto]\"><h5>Finalizar proyecto</h5></a>";
            }
            if($rol != 3){
                echo "<input type='button' name='abandonar' value='Adandonar Proyecto' onclick='abandonarProyecto(".$proyecto['idproyecto'].")'>";
                //echo "<a href=\"abandonar-proyecto.php?idproyecto=$proyecto[idproyecto]\"><h5>Abandonar proyecto</h5></a>";
            }
            echo '</div>';
            echo "</div>";
        }
    }

    public function CicloSprint($variable){
        while ($sprint =$variable->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="div">'; 
            echo "<div><a href=\"kanban.php?idsprint=$sprint[idsprint]\">";
            echo '<h3>'.$sprint['nombre'].'</h3>';
            echo '<img src = "../img/fondo.svg" width = "64px">';
            echo '<p>Fecha de inicio: '.$sprint['finicio'].'</p>';
            echo '<p>'.$sprint['descripcion'].'</p>';
            echo '</a>';
            echo "<a href=\"update-sprint.php?idsprint=$sprint[idsprint]\"><h5>Modificar sprint</h5></a>";
            echo "<input type='button' name='eliminar' value='Eliminar Sprint' onclick='deleteSprint(".$sprint['idsprint'].")'>";
            echo "<input type='button' name='finalizar' value='Finalizar Sprint' onclick='finalizarSprint(".$sprint['idsprint'].")'>";
            echo '</div>';
            echo '</div>';
        }
    }

}


?>