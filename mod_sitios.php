<?php
    // iniciamos conexion a la bbdd
    include 'conexion.php';
    $usr = $_SESSION['user'];
    // se ejecuta consulta sql y capturan resultados en $result
    $sqls = "SELECT `ID_LUGAR`, `ID_TIPO`, `ID_USUARIO`, `L_NOMBRE`, `L_ESTADO`, `L_FECHA` FROM `LUGAR` WHERE `ID_USUARIO` = 4";
    $resultado = $conn->query($sqls);

    //var_dump($resultado);
    if ($resultado->num_rows > 0) {
         //generamos un combobox con el resultado obtenido
        echo '  <div class="table-responsive">
        <table class="table table-hover">
            <thead>
              <tr>';
                //<th>ID_LUGAR</th>
                //<th>ID_TIPO</th>
                //<th>ID_USUARIO</th>
        echo '<th>Nombre</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Calificación</th>
                <th>Visitas</th>
              </tr>
            </thead><tbody>';
        while($rows = $resultado->fetch_assoc()) {
          //echo '<tr><td>'.$rows["ID_LUGAR"].' </td><td>'.$rows["ID_TIPO"].' </td>
          //<td>'.$rows["ID_USUARIO"].' </td><td>'.$rows["L_NOMBRE"].'</td>
          //<td>'.$rows["L_ESTADO"].'</td><td>'.$rows["L_FECHA"].'</td>';

          echo '<tr><td>'.$rows["L_NOMBRE"].'</td>
          <td>';
          if ($rows["L_ESTADO"] == 0) {
            echo '<span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></span>';
          }
          if ($rows["L_ESTADO"] == 1) {
            echo '<span class="label label-warning"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></span>';
          }
          if ($rows["L_ESTADO"] == 2) {
            echo '<span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>';
          }

          echo '</td><td>'.$rows["L_FECHA"].'</td>';

          $lugar = $rows["ID_LUGAR"];
          $sqlprom = "SELECT ROUND(AVG(`C_VALOR`),1) AS PROMEDIO FROM `CALIFICACION` WHERE `ID_LUGAR` = $lugar";
          $result = $conn->query($sqlprom);
          $row = $result->fetch_assoc();
          $prom = $row["PROMEDIO"];
          echo '<td>'.$prom.'</td>';
          $sqlvisit = "SELECT COUNT(`ID_LUGAR`) AS TOTAL_VISITAS FROM `VISITAS` WHERE `ID_LUGAR` = $lugar";
          $result = $conn->query($sqlvisit);
          $row = $result->fetch_assoc();
          $visit = $row['TOTAL_VISITAS'];
          echo '<td>'.$visit.'</td>';
          echo '</tr>';
        }

        echo '</tbody>
          </table>
          </div>';
    } else {
        echo "0 results";
    }
    $conn->close();
  ?>
