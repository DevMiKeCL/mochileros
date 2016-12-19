<?php
    // iniciamos conexion a la bbdd
    include 'conexion.php';
    // se ejecuta consulta sql y capturan resultados en $result
    $sqls = "SELECT * FROM `TIPO_LUGAR`";
    $resultado = $conn->query($sqls);
    //var_dump($resultado);
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
          echo '<tr><td>'.$rows["ID_TIPO"].' </td><td>'.$rows["T_NOMBRE"].'</td></tr>' ;
        }
        echo '</tbody>
          </table>';
    } else {
        echo "0 results";
    }
    $conn->close();
  ?>
