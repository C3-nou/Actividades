<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
/*if(!$_SESSION['username']){
	header('Location:index.php');
}*/


if(isset($_GET['sm'])){
    include_once('../conexion.php');
    $conexion = new Conn();

    if($_SESSION['username'] == $_GET['sm']){
        echo 'no puedes añadirte como scrum master siendo product owner';
        unset($_GET['sm']);
    }else{
        $sql = "INSERT INTO tmp (nombre, estado) VALUES (:nombre, 1)";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':nombre', $_GET['sm']);

        $_SESSION['sm'] = $_GET['sm'];
    
        $consulta->execute();
    }


}


if(isset($_GET['dv'])){
    include_once('../conexion.php');
    $conexion = new Conn();

    $sql = "INSERT INTO tmp (nombre, estado) VALUES (:nombre, 2)";
    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(':nombre', $_GET['dv']);

    $consulta->execute();
}

if(isset($_POST['buscarsm'])){
    include_once('../conexion.php');
    $conexion = new Conn();
    $sm = $_POST['sm'];

    $sql = "SELECT username FROM usuario WHERE username LIKE '$sm%'";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
}

if(isset($_POST['buscardv'])){
    include_once('../conexion.php');
    $conexion = new Conn();
    $dv = $_POST['dv'];

    $sql = "SELECT username FROM usuario WHERE username LIKE '$dv%'";
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
}


$contador = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear proyecto</title>
</head>
    <?php include("header.php") ?>
<body>

    <form method="POST">
        <label>Buscar Scrum Master:</label>
        <input type="text" name="sm" placeholder="Añade tu Scrum Master">
        <input type="submit" id="ScrumMaster" name="buscarsm" value="Buscar">
    </form>

    <?php if(isset($_POST['buscarsm']) && !isset($_POST['cerrar'])): ?>
        <?php while($var = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                    <?php $username = $var['username'] ?>
                    <form method="Post">
                    <input type='button' id='sm<?php echo $contador ?>' name='usuariosm' onclick="sm(<?php echo $contador ?>)" value="<?php echo $username; ?>">
                    <?php $contador++ ?>
                    </form>
        <?php endwhile ?>
    <?php endif ?>

    <form method="POST">
        <label>Buscar desarrolladores:</label>
        <input type="text" name="dv" placeholder="Añade tu Scrum Master">
        <input type="submit" id="ScrumMaster" name="buscardv" value="Buscar">
    </form>

    <?php if(isset($_POST['buscardv'])): ?>
    <?php while($var = $consulta->fetch(PDO::FETCH_ASSOC)): ?>
                    <?php $username = $var['username'] ?>
                    <form method="Post">
                    <input type='button' id='dv<?php echo $contador ?>' name='usuariodv' onclick="desarrollador(<?php echo $contador ?>)" value="<?php echo $username; ?>">
                    <?php $contador++ ?>
                    </form>
        <?php endwhile ?>
    <?php endif ?>



	<h1>Añadir miembros</h1>

    <form method="POST">
    <label>Nombre del Product Owner:</label><br>
    <input type="text" name="productOwner" value="<?php echo $_SESSION['username']?>" disabled>
    <br>

    <label>Scrum Master:</label>
    <?php 
            include_once('../conexion.php');
            $conexion = new Conn();
        
            $sql = "SELECT nombre, estado FROM tmp order by estado asc";
            // WHERE estado = 1 AND id = (SELECT MAX(id) FROM tmp WHERE estado = 1)";
            $consulta = $conexion->prepare($sql);       
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            $contador = $consulta->rowCount();


            while($var = $consulta->fetch(PDO::FETCH_ASSOC)): 
                
                echo $var['nombre']. " ";
                if ($var['estado']==1){
                    echo "Scrum Master ";
                }
                if ($var['estado']==2){
                    echo "desarrollador ";
                }
                if ($var['estado']==3){
                    echo "mansito ";
                }
                echo "<br>";  
          
            endwhile 
            //var_dump($contador);
    ?>
    <?php if($contador && isset($_GET['sm'])): ?>    
    <input type="text" id="scrumM" name="scrumMaster" placeholder="Nombre Scrum Master" value="<?php echo $_SESSION['sm'] ?>">
    <?php else: ?>
    <input type="text" id="scrumM" name="scrumMaster" placeholder="Nombre Scrum Master" >
    <?php endif ?>
    <br>

    <label>Desarrolladores :</label>
    <?php 
            include_once('../conexion.php');
            $conexion = new Conn();
        
            $sql = "SELECT nombre FROM tmp ";
            //AND id = (select max(id) from tmp WHERE estado = 2);";
            $consulta = $conexion->prepare($sql);       
            $consulta->execute();
            $datos = $consulta->fetch(PDO::FETCH_ASSOC);
            $contador = $consulta->rowCount();

            //var_dump($contador);
    ?>
    <?php if($contador && isset($_GET['dv'])): ?> 
            <input type="text" id="desarrollador" name="desarrollador" placeholder="Nombre desarrolladores" value="<?php echo $datos['nombre']; ?>">
        <?php else: ?>
            <input type="text" id="desarrollador" name="desarrollador" placeholder="Nombre desarrolladores">
        <?php endif ?>
    <br>

    <input type="submit" value="Cancelar" name="cancelar">
    <input type="button" value="Siguiente" name="siguiente">
    </form>
    
    <script type="text/javascript" src="text.js"></script>
</body>
</html>