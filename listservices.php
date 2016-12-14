<?php
  // iniciamos conexion a la bbdd
  include 'conexion.php';
  // se ejecuta consulta sql y capturan resultados en $result
  $sqls = "SELECT * FROM lista_servicio";
  $resultado = $conn->query($sqls);
    var_dump($resultado);
  if ($resultado->num_rows > 0) {
      // generamos un combobox con el resultado obtenido
      echo '  <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
            </tr>
          </thead><tbody>';
      while($rows = $resultado->fetch_assoc()) {
        if ($row["id_lservicio"] == $rows["id_lservicio"] ) {
          echo '<tr><td>'. $rows[id_lservicio].'</td> <td>'. $rows["ls_nombre"].'</td>';
        }
      }
      echo '</tr>
          </tbody>
        </table>';
  } else {
      echo "0 results";
  }
  //$conn->close();
?>
