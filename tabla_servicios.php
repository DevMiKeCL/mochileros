<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM `LISTA_SERVICIO`";
  $resultado = $conn->query($sqls);
  $sqlserv = "SELECT * FROM `SERVICIO` WHERE ID_LUGAR = $lugar order by `S_FECHA` desc LIMIT 0, 1";
  $resultado2 = $conn->query($sqlserv);
  //var_dump($resultado2);
  $estado = $resultado2->fetch_assoc();
  //echo "<br />";
  //var_dump($estado);
  //echo "<br />";
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      //echo 'Inicio del checkbox <br>';
      echo '<ul>';
      while($rows = $resultado->fetch_assoc()) {
        //if ($row["ID_LSERVICIO"] == $rows["ID_LSERVICIO"] ) {
        //  echo '<input type="checkbox" name="datos['.$rows["LS_NOMBRE"].']" value="'.$rows["NOM_COLUMNA"].'"> '.$rows["LS_NOMBRE"].'<br>';
        //}else {
        //echo $rows["LS_NOMBRE"].' '.$rows["NOM_COLUMNA"].' '.$estado["$rows[NOM_COLUMNA]"];
        if ($estado["$rows[NOM_COLUMNA]"] == 1) {
          echo '<li>'.$rows["LS_NOMBRE"].'</li>';
        }

        //}
      }
      echo '</ul>';
      //echo 'FIN';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
