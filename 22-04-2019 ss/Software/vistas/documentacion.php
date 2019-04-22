<?php
include_once('../controlador/controladorPrincipal.php');
include_once('../modelo/conexion.php');

$conexion = new Conn();
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
    <title>Documentación</title>
</head>

<body>
    <?php include("header.php") ?>
    <div class="contenedor">

        <div id="oculta" class="left">
            <form method="POST">
                <img class="icon2" src="../img/pdficon.png" height="25%"><br>
                <input class="button1" type="submit" name="reuniones" value="Reuniones"><br>
                <img class="icon2" src="../img/reuniones.png" height="25%"><br>
                <input class="button1" type="submit" name="plantilla" value="Plantillas">
            </form>
        </div>
        <div id="oculta" class="right">
            <?php
            $sql = "SELECT idreunion,nombre, rutaarchivo, fecha FROM reunion WHERE idproyecto = :idproyecto AND idsprint = :idsprint AND idusuario = :idusuario";
            $consulta = $conexion->prepare($sql);

            $consulta->bindParam(':idproyecto', $_SESSION['idproyecto']);
            $consulta->bindParam(':idsprint', $_SESSION['idsprint']);
            $consulta->bindParam(':idusuario', $_SESSION['idusuario']);

            $consulta->execute();

            $count = $consulta->rowCount();
            ?>
            <?php if (!isset($_POST['plantilla']) || isset($_POST['regresar']) || isset($_POST['reuniones'])) : ?>
            <?php if ($count) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ruta del archivo</th>
                        <th>Fecha</th>
                        <th>Modificaciones</th>
                    </tr>
                </thead>
                <?php $value = $consulta->fetchAll(PDO::FETCH_ASSOC) ?>
                <?php for ($i = 0; $i < $count; $i++) : ?>
                <tr>
                    <td><?php echo $value[$i]['nombre'] ?></td>
                    <td><?php echo $value[$i]['rutaarchivo'] ?></td>
                    <td><?php echo $value[$i]['fecha'] ?></td>
                    <td>
                    <input class="but2" type="button" name="eliminar" onclick="actualizarDocumento(<?php echo $value[$i]['idreunion']; ?>)" value="Eliminar">
                    <a href="../controlador/descargar.php?document=<?php echo $value[$i]['rutaarchivo']; ?>"><input class="but2" type="button" value="Descargar"></a>
                    </td>
                </tr>
                <?php endfor ?>

                <form method="POST">
                    <input type="submit" name="ok" onclick="documentaña()" value="Añadir documento">
                </form>

                <?php if (isset($_POST['ok']) && !isset($_POST['cancelarDocumento'])) : ?>

                <div class="añarchi" >

                    <form method="POST" enctype="multipart/form-data">
                        <input id="aña1" type="text" name="name">
                        <input type="file" name="archivo"><br><br>
                        <input id="bot" type="submit" name="hola">
                        <input id="bot1" type="submit" name="cancelarDocumento" value="Cancelar">
                    </form>
                </div>

                <?php endif ?>
            </table>
            <?php else : ?>
            <h3>¡¡ No cuentas con reuniones subidas !! </h3>
            <p> Comienza a subir tus actas y guarda todo en un solo sitio</p>
            <form method="POST" enctype="multipart/form-data">
                <input id="na3" type="text" name="name">
                <input type="file" name="archivo"><br>
                <input class="envi" type="submit" name="hola">
            </form>

        </div>
        <?php endif ?>
        <?php endif ?>

        <?php if (isset($_POST['plantilla']) && !isset($_POST['cancelar']) && !isset($_POST['reuniones'])) : ?>
        <?php
        $sql = "SELECT nombre, descripcion FROM documentacion";

        $consulta = $conexion->prepare($sql);

        $consulta->execute();

        $count = $consulta->rowCount();
        ?>
        <?php if ($count) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <?php $row = $consulta->fetchAll(PDO::FETCH_ASSOC) ?>
            <?php for ($i = 0; $i < $count; $i++) : ?>
            <tr>

                <td><?php echo $row[$i]['nombre'] ?></td>
                <td><?php echo $row[$i]['descripcion'] ?></td>

                <td><a href="../documentacion/<?php echo $row[$i]['nombre'] ?>" download="<?php echo $row[$i]['nombre']; ?>">Descargar el archivo</a></td>

            </tr>
            <?php endfor ?>
            <?php endif ?>
            <?php endif ?>



        </table>

    </div>

    <script src="../controlador/funciones.js"></script>

    <link rel="stylesheet" href="../css/document.css">
</body>

</html> 