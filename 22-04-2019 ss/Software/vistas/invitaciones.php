<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if (!$_SESSION['username']) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invitaciones</title>
</head>
<body>
    <?php 
    
        $data = $acciones->Invitacion($_SESSION['idusuario']);
        
        $idemisor = array_column($data, 'idemisor');
        $rol = array_column($data, 'rol');
        $idproyecto = array_column($data, 'idproyecto');

        //print_r($idemisor);
        $infoEmisor = $acciones->ConvertEmisor($idemisor);
        $infoProyecto = $acciones->ConvertProyecto($idproyecto);

        $nombreEmisor = array_column($infoEmisor, 'nombre');
        $nombreProyecto = array_column($infoProyecto, 'nombre');
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Invitaciones</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count($nombreEmisor)){
                    for ($i=0; $i < count($nombreEmisor) ; $i++) { 
                        echo "<tr>";
                            if($rol[$i] == 1){
                                echo "<td>Haz sido invitado por el usuario <b>".$nombreEmisor[$i].
                                        "</b> a participar en el proyecto <b>".$nombreProyecto[$i].
                                        "</b> bajo el rol de Scrum Master ¿Aceptas?</td>";

                                echo "<td><form method='POST'>
                                        <input type='hidden' value=".$idproyecto[$i]." name='idproyecto'>
                                        <input type='hidden' value='1' name='rol'>
                                        <input type='submit' value='Aceptar' name='aceptarInvitacion'>
                                        <input type='submit' value='Declinar' name='declinarInvitacion'>
                                    </form></td>";
                            }else{
                                echo "<td>Haz sido invitado por el usuario <b>".$nombreEmisor[$i].
                                        "</b> a participar en el proyecto <b>".$nombreProyecto[$i].
                                        "</b> bajo el rol de Desarrollador ¿Aceptas?</td>";
                                
                                echo "<td><form method='POST'>
                                        <input type='hidden' value=".$idproyecto[$i]." name='idproyecto'>
                                        <input type='hidden' value='2' name='rol'>
                                        <input type='submit' value='Aceptar' name='aceptarInvitacion'>
                                        <input type='submit' value='Declinar' name='declinarInvitacion'>
                                    </form></td>";
                            }
    

                        echo "</tr>";
                    }
                }else{
                    echo "<td colspan='2'>No tienes invitaciones</td>";
                }

            ?>
        </tbody>
    </table>

    <a href="index2.php">Regresar</a>
</body>
</html>