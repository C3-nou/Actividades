
<div class="d-flex justify-content-around  text-center light-items-center mt-3 pl-5">
  <div class=" big h-25 text-light">
     <h5 class="m-2">Fecha: </h5>
     <h5 class="m-2"><div id="prueba"></div></h5>
  </div>
  <div class="h-25">
       <a href ="inicio.php"type="submit"class="btn btn-danger form-control mb-3 mt-3" value="#">Volver</a>
  </div>
  </div>
  <div class='tamaÃ±o'> 
    <div class="d-flex justify-content-center aling-items-center mt-5">
 <table class="table table-light  w-50">
 <thead class="thead-dark">
    <tr>
      <th scope="col">Nº</th> 
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Usuario</th>
      <th scope="col">input</th>
      
      </tr>
  </thead>
  <tbody>
  <?php 
    while($row = $result->fetch(PDO::FETCH_ASSOC)) { 
        echo "<tr>";
        echo "<form id='CalifiForm' class=''  method='POST'>";
        echo "<td>".$contador."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>".$row['apellido']."</td>";
        echo "<td>".$row['usuario']."</td>";
        echo "<td><select name='eleccion[$contador]' id='numero' class='form-control'>
        <option selected enable> Seleccionar</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        </select></td>";
        echo "<td><input name='usuario[$contador]' type='hidden' value=".$row['usuario']."></td>";

        $contador++;
    }

    
    ?>
     
  </tbody>
  <td><input id='accion' name='calificacion' type='submit' value='Calificar'></td>
     </form>
</table>
</div>

  </div>