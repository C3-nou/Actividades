<?php 

/*include_once('../controlador/controladorPrincipal.php');
include_once("../controlador/session.php");
//session_start();
if(!$_SESSION['username']){
	header('Location:index.php');
}*/

/*include_once("database.php");

$connexion = new Conn();*/
//var_dump($connexion);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
  <title>Crear proyecto</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
<!--</head>
    <?php //include("header.php") ?>
<body>-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Tasks App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0">
          <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>

          <!-- TABLE  -->
          <div class="col-md-7">
            <div class="card my-4" id="task-result">
              <div class="card-body">
                <!-- SEARCH -->
                <ul id="container"></ul>
              </div>
            </div>

            <div id="selector">
              <input type="text" name="" id="ejemplo">
            </div>
    <!--<label>Añadir Desarrolladores:</label>
    <input type="search" id="developer" placeholder="Añade desarrolladores">

    <label>Desarrolladores :</label>
    <div id="dv">
    
    </div>-->

    <!--<input type="submit" value="Cancelar" name="cancelar">
    <input type="button" value="Siguiente" name="siguiente">
    </form>-->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <!-- Frontend Logic -->
<script src="app.js"></script>
</body>
</html>