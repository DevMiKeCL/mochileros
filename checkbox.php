<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM lista_servicio";
  $resultado = $conn->query($sqls);
  //var_dump($resultado);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo 'Inicio del checkbox <br>';
      $i = 0;
      while($rows = $resultado->fetch_assoc()) {
        //if ($row["ID_LSERVICIO"] == $rows["ID_LSERVICIO"] ) {
        //  echo '<input type="checkbox" name="datos['.$rows["LS_NOMBRE"].']" value="'.$rows["NOM_COLUMNA"].'"> '.$rows["LS_NOMBRE"].'<br>';
        //}else {
          echo '<input type="checkbox" name="datos['.$i.']" value="'.$rows["NOM_COLUMNA"].'">'.$rows["LS_NOMBRE"].'<br>';
          $i = $i+1;
        //}
      }
      echo 'FIN';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
