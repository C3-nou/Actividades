<?php
//including the database connection file
    include_once("modulos/enrutador.php");

    include_once("modulos/controlador.php");
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD SCRUM</title>
</head>
<body>
    <h1>
        Bienvenidos
    </h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="?cargar=crear">Registrar</a></li>
        </ul>
    </nav>
    <section>
        <?php
        $enrutador = new enrutador();
        if($enrutador->validarGET(isset($_GET['cargar'])))
        { 
            $enrutador->cargarVista($_GET['cargar']);
        }
        ?>
    </section>

</body>
</html>