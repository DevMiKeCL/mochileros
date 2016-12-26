<?php
    // iniciamos conexion a la bbdd
    include 'conexion.php';
    // se ejecuta consulta sql y capturan resultados en $result
    $sqls = "SELECT * FROM `LUGAR`";
    $resultado = $conn->query($sqls);
    //var_dump($resultado);
    if ($resultado->num_rows > 0) {
        // generamos un combobox con el resultado obtenido
        echo '  <table class="table table-hover">
            <thead>
              <tr>
                <th>ID_LUGAR</th>
                <th>ID_TIPO</th>
                <th>ID_USUARIO</th>
                <th>L_NOMBRE</th>
                <th>L_DIRECCION</th>
                <th>L_LOCALIDAD</th>
                <th>L_TELEFONO</th>
                <th>L_FACEBOOK</th>
                <th>L_WHATSAPP</th>
                <th>L_DESCRIPCION</th>
              </tr>
            </thead><tbody>';
        while($rows = $resultado->fetch_assoc()) {
          echo '<tr><td>'.$rows["ID_LUGAR"].' </td><td>'.$rows["ID_TIPO"].
          ' </td><td>'.$rows["ID_USUARIO"].' </td><td>'.$rows["L_NOMBRE"].
          '</td><td>'.$rows["L_DIRECCION"].'</td><td>'.$rows["L_LOCALIDAD"].
          '</td><td>'.$rows["L_TELEFONO"].'</td><td>'.$rows["L_FACEBOOK"].
          '</td><td>'.$rows["L_WHATSAPP"].'</td><td>'.base64_decode($rows["L_DESCRIPCION"]).'</td></tr>' ;
        }
        echo '</tbody>
          </table>';
    } else {
        echo "0 results";
    }
    $conn->close();
  ?>
