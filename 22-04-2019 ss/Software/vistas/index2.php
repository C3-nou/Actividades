<?php 

include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if (!$_SESSION['username']) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Logeado</title>
    <link rel="stylesheet" href="../css/plantilla_inde2.css">
    <script>
        window.onload = inicio;

        function inicio(){
            document.getElementById('finalizados').style.display = "none";
        }

        function cambiar(){
            if(document.getElementById('finalizados').style.display == "none"){

                document.getElementById('finalizados').style.display = "block";
                document.getElementById('ciclo').style.display = "none";
                document.getElementById('boton').innerHTML = "Proyectos en progreso";
            }else{
                document.getElementById('finalizados').style.display = "none";
                document.getElementById('ciclo').style.display = "block";
                document.getElementById('boton').innerHTML = "Proyectos finalizados";
            }
        }
    </script>
</head>
<?php include("header.php") ?>

<body>
    <div class="contenedor">
        <article class="menu_izquierdo">
            <figure class="proyectos">
                <a><img src="../img/guia.png" onclick="boton()"></a>
                <h1> Guia de Funcionalidad</h1>
                <a href="#openModalpro"><img src="../img/newproyecto.png" onclick="crearProbtn()"></a>
                <h1> Crea un Proyecto </h1>
                <a href="#proyectos"><img src="../img/proyectos.png" onclick="proyectosbtn()"></a>
                <h1> Tus Proyectos </h1>

            </figure>
        </article>
        <div class="contenidointer">
            <div id="guia">
                <h2>Guía de Funcionalidad</h2>
                <iframe id="video" src="https://www.youtube.com/embed/v_zZmsFZDaM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

            </div>
            <div id="proyectos">
                <h2> Tus Proyectos </h2>
                <div class="proye">
                    
                    <div id="ciclo">
                        <?php
                            $id = $acciones->cicloMiembro($_SESSION['idusuario']);
                            //echo $_SESSION['idusuario'];
                            $idproyecto = implode(',', $id);

                            if ($acciones->getCount()) {
                                echo $ciclos->CicloProyectos($acciones->CicloProyectos($idproyecto));
                            } else {
                                echo "No Tienes proyectos";
                            }
                        ?>
                    </div>

                <div id="finalizados">

                <?php
                    $estado = 2;

                    $sql = "SELECT nombre, descripcion FROM proyecto WHERE idusuario = :idusuario AND estado = :estado";

                    $consulta = $conexion->prepare($sql);

                    $consulta->bindParam(':idusuario', $_SESSION['idusuario']);
                    $consulta->bindParam(':estado', $estado);

                    $consulta->execute();

                    $data = $consulta->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($data as $value) {
                            echo "<tr>";
                                echo "<td>".$value['nombre']."</td>";
                                echo "<td>".$value['descripcion']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
                </div>

                <div>
                        <button onclick="cambiar()" id="boton">Proyectos finalizados</button>
                </div>
            </div>
            <!--codigo del modal para craer un proyecto
                -->
            <div id="openModalpro" class="modalDialog">
                <a href="#close" title="Close" class="close">X</a>
                <div class="txt">
                    <form method='POST'>
                        <input class="añapro" type="submit" name="addproyecto" value="Crear Proyecto">
                    </form>

                    <?php if (isset($_POST['addproyecto']) && !isset($_POST['cancelar'])) : ?>

                    <form method='POST'><br>
                        <label>Nombre del proyecto:</label><br>
                        <input type="text" name="nombreProyecto"><br>
                        <label>Descripción del proyecto:</label><br>
                        <textarea rows="4" cols="50" name="descripcion"></textarea><br>

                        <input class="bot" type="submit" name="crearProyecto" value="Ingresar">
                        <input class="bot" type="submit" name="regresar" value="Regresar">
                    </form>
                    <?php endif ?>

                </div>
            </div>
        </div>
        <script src="../controlador/funciones.js"></script>
        <script src="../controlador/jquery-3.3.1.js"></script>
        <script src="../controlador/mostrarocul.js"></script>
</body>

</html> 