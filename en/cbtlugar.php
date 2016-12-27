<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM `TIPO_LUGAR`";
  $resultado = $conn->query($sqls);
  //var_dump($resultado);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo '<select name="lugar[tipo]" class="form-control">';
      while($rows = $resultado->fetch_assoc()) {
        if ($row["ID_TIPO"] == $rows["ID_TIPO"] ) {
          echo '<option value="'.$rows["ID_TIPO"].'" selected>'.$rows["T_NOMBRE"].'</option>';
        }else {
          echo '<option value="'.$rows["ID_TIPO"].'">'.$rows["T_NOMBRE"].'</option>';
        }
      }
      echo '</select>';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
