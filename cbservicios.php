<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM `LISTA_SERVICIO`";
  $resultado = $conn->query($sqls);
  //var_dump($resultado);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo '<select name="datos[id]" class="form-control">';
      while($rows = $resultado->fetch_assoc()) {
        if ($row["ID_LSERVICIO"] == $rows["ID_LSERVICIO"] ) {
          echo '<option value="'.$rows["ID_LSERVICIO"].'" selected>'.$rows["LS_NOMBRE"].'</option>';
        }else {
          echo '<option value="'.$rows["ID_LSERVICIO"].'">'.$rows["LS_NOMBRE"].'</option>';
        }
      }
      echo '</select>';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
