<header>
    <link rel="stylesheet" href="../css/index2.css">

    <div class="head2">

        <img class="logo" src="../img/logo.png" height="100rem">
        <div class="bienv">
            <h6>Bienvenido: <?php echo $_SESSION['username']; ?></h6>
        </div>
        <div class="figcen">
            <figure class="figura_center">
                <a href="index-proyecto.php" class="carpe"> <img src="../img/fondo.svg" height="40rem"> <br>Regresar</a>
                <a href="dashboard.php" class="grafica"> <img src="../img/grafica.svg" height="40rem"> <br>Dashboard </a>
                <a href="kanban.php" class="planificacion"> <img src="../img/planificacion.svg" height="40rem"> <br>Planificación</a>
                <a href="documentacion.php" class="documentacion"> <img src="../img/documentacion.svg" height="40rem"> <br>Documentación</a>
            </figure>
        </div>
        <div class="rig">
            <div class="fotuser">
                <?php
                require_once '../modelo/conexion.php';
                $conexion = new Conn();
                $sql = $conexion->query("select * from usuario where idusuario = {$_SESSION['idusuario']}");
                while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
                    echo '<img src="' . $res['rutafoto'] . '" width="60"><br>';
                }
                ?>
            </div>
            <a href="editar.php"> <img src="../img/config.png" width="30"> </a>
            <label class="dropdown">
                <div class="dd-button">
                    <img src="../img/flecha.svg" width="40">
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul class="dd-menu">
                    <div id="ocultar">
                        <form method="POST">
                            <button class="foot" type="submit" name="cerrarSesion">Cerrar Sesión</button>
                        </form>
                    </div>
                </ul>

            </label>

        </div>
    </div>
</header> 