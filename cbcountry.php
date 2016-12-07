
<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM paises";
  $resultado = $conn->query($sqls);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo '<select name="datos[pais]" class="form-control">';
      while($rows = $resultado->fetch_assoc()) {
        if ($row["id"] == $rows["id"] ) {
          echo '<option value="'. $rows["id"].'" selected>'. $rows["nombre"].'</option>';
        }else {
          echo '<option value="'. $rows["id"].'">'. $rows["nombre"].'</option>';
        }
      }
      echo '</select>';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
