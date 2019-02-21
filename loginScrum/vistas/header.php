<header>
	<div id="ocultar">
		 <h3><a href="editar.php">Editar cuenta</a></h3>
		<form method="POST">
		<button type="submit" name="cerrarSesion">Cerrar la sesión</button>
		</form>
	</div>
	
	<div>
		 <a href="#"><img src="../img/notificaciones2.svg" width = "75px"></a>
	</div>	
	<?php
		require_once '../conexion.php';
		$conexion = new Conn();
		$sql= $conexion->query("select * from usuario where idusuario = {$_SESSION['idusuario']}");
		while($res= $sql->fetch(PDO::FETCH_ASSOC)){
			echo '<img src="'.$res['rutafoto'].'" width = "64px"><br>';
		 } ?>
</header>