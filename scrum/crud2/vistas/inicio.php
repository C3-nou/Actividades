<?php

    $controlador = new controlador();
    $resultado = $controlador->index();
?>
<h3>
    Página de inicio
</h3>

<table border='1'>
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Username</th>
        <th>Correo</th>
        <th>Acción</th>
    </thead>
    <tbody>
        <?php foreach ($resultado as $row){
         ?>
            <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['apellido'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td><?php echo $row['correo'] ?></td>
                <td>
                    <a href="?cargar=ver&id= <?php echo $row['idusuario']; ?>">Ver</a>
                    <a href="?cargar=editar&id= <?php echo $row['idusuario']; ?>">Editar</a>
                    <a href="?cargar=eliminar&id= <?php echo $row['idusuario']; ?>">Eliminar</a>
                </td>
            </tr>
    <?php } ?>
    </tbody>
</table>