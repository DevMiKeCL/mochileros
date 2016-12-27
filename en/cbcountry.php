<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM `PAISES`";
  $resultado = $conn->query($sqls);
  //var_dump($resultado);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo '<select name="datosusuario[pais]" class="form-control">';
      while($rows = $resultado->fetch_assoc()) {
        if ($rows["NOMBRE"] == "Chile" ) {
          echo '<option value="'. $rows["NOMBRE"].'" selected>'. $rows["NOMBRE"].'</option>';
        }else {
          echo '<option value="'. $rows["NOMBRE"].'">'. $rows["NOMBRE"].'</option>';
        }
      }
      echo '</select>';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
