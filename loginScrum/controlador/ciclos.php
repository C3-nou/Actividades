<?php 

include_once("session.php");

class Ciclos{
    
    public function CicloProyectos($variable){
        while ($proyecto =$variable->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='div'>";
            
            echo "<div><a href=\"index-proyecto.php?id=$proyecto[idproyecto]\">";
            echo '<h3>'.$proyecto['nombre'].'</h3>';
            echo '<p>'.$proyecto['fechainicio'].'</p>';
            echo '<p>'.$proyecto['descripcion'].'</p>';
            echo '</a>';
            echo '<h5>Modificar proyecto</h5>';
            echo '<h5>Eliminar proyecto</h5>';
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
            echo '<h5>Modificar sprint</h5>';
            echo '<h5>Eliminar sprint</h5>';
            echo '</div>';
            echo '</div>';
        }
    }

}


?>