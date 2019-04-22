<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if(!$_SESSION['username']){
	header('Location:index.php');
}

include_once('../modelo/conexion.php');
$conexion = new Conn();

//var_dump($_SESSION['yeye']);

if (isset($_POST['scrummaster'])) {

        $_SESSION['yeye'] = $_POST['panda'];
}

if (isset($_POST['developer'])) {

    $developer = $_POST['desarrollador'];
    
    for ($i = 0; $i < count($_POST['desarrollador']); $i++) {

        $sql = "SELECT nombre FROM tmp WHERE nombre = :nombre";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':nombre', $developer[$i]);
        $consulta->execute();
        $count = $consulta->rowCount();

        if ($count) {
            //echo "El usuario ya se fue añadido anteriormente";
            header('Location: add-miembros2.php');
            return false;
        } else {
            $sql = "INSERT INTO tmp (nombre, estado)  VALUES (:nombre, 1)";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':nombre', $developer[$i]);
            $consulta->execute();
        }
    }
}

if (isset($_POST['buscarsm'])) {
    $sm = strtolower($_POST['sm']);
    $sql = "SELECT username FROM usuario WHERE username LIKE '$sm%'";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
}

if (isset($_POST['buscardv'])) {
    
    $dv = strtolower($_POST['dv']);
    $sql = "SELECT username FROM usuario WHERE username LIKE '$dv%'";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
}


$contador = 1;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Añadir Miebros a Proyecto</title>
    <link rel="stylesheet" href="../css/miembros.css">
</head>
<?php include("header.php") ?>

<body>
    <div class="contenedor">
        <div class="head">
            <h2>Añade Miembros</h2>
        </div>
        <form method="POST">
            <label>Buscar Scrum Master:</label>
            <input type="text" name="sm" placeholder="Añade Tu Scrum Master">
            <input class="bot"  type="submit" id="ScrumMaster" name="buscarsm" value="Buscar">
        </form>

        <?php if (isset($_POST['buscarsm']) && !isset($_POST['cerrar'])) : ?>
        <form method="Post">
            <?php while ($var = $consulta->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php $username = $var['username'] ?>
            <input type="radio" name='panda' value="<?php echo $username; ?>" /><?php echo $username ?><br>
            <?php $contador++ ?>
            <?php endwhile ?>
            <br>
            <input class="bot" type="submit" name="scrummaster" value="Añadir Scrum Master">
        </form>
        <?php endif ?>


        <!-- Este es el buscador del desarrollador-->

        <form method="POST">
            <label>Buscar Desarroladores:</label>
            <input type="text" name="dv" placeholder="Añade Tus Desarrolladores">
            <input class="bot" type="submit" name="buscardv" value="Buscar">
        </form>

        <?php if (isset($_POST['buscardv']) && !isset($_POST['cerrar'])) : ?>
        <form method="Post">
            <?php while ($var = $consulta->fetch(PDO::FETCH_ASSOC)) : ?>
            <?php $username = $var['username'] ?>
            <input type="checkbox" name='desarrollador[]' value="<?php echo $username; ?>" /><?php echo $username ?><br>
            <?php $contador++ ?>
            <?php endwhile ?>
            <br>
            <input class="bot" type="submit" name="developer" value="Añadir Desarrollador">
        </form>
        <?php endif ?>




        <div class="head">
            <h2>Mis Miembros</h2>
        </div>

        <form method="POST">
            <label>Nombre del Product Owner:</label><br>
            <input type="text" name="productOwner" value="<?php echo $_SESSION['username'] ?>" disabled>
            <br>
            <label>Scrum Master:</label><br />
            <?php if (isset($_SESSION['yeye']) && empty($_SESSION['yeye']) == false) : ?>
            <input type="text" name="scrummaster" value="<?php echo $_SESSION['yeye']; ?>">
            <?php else : ?>
            <input type="text" name="scrummaster">
            <?php endif ?>
            <br>
            <label>Desarrolladores:<label><br>
                    <?php
                    $sql = "SELECT nombre FROM tmp WHERE estado = 1";
                    $consulta = $conexion->prepare($sql);
                    $consulta->execute();

                    $nombres = $consulta->fetchAll(PDO::FETCH_COLUMN);
                    $nombre = implode(',', $nombres);
                    ?>
                    <input type="text" name="desarrollador" value="<?php print($nombre) ?>">

        </form>
        <br>
        <input class="bot" type="submit" name="addmiembro" value="Siguiente">
        <input class="bot" type="submit" name="cancelar" value="Cancelar">
        
    </div>
</body>

</html> 