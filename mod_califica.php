<?php
    $rating = $_POST['rating'];
    $lugar = $_SESSION['lugar'];
    //$loc = $_SESSION['ubicacion'];
    //$lugar = $_SESSION['lugar'];
    include 'conexion.php';
    $sql = "SELECT * FROM `CALIFICACION` where `C_IP` = '$ip' AND `ID_LUGAR` = '$lugar' order by `C_FECHA` desc LIMIT 0, 1";
    //$sql2 = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = '.$usr['id'].' order by `UB_FECHA` desc LIMIT 0, 1';
    //echo "<br />";
    //echo "$sql";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fcalifica = $row["C_FECHA"];
        //echo "Fecha y hora de la última calificacion: $fcalifica";
        //calculamos la fecha y hora actual del servidor apache
        $fecha = date("Y-m-d H:i:s");
        $nuevafecha = strtotime ( '-3 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );
        //echo "<br />";
        //echo "Fecha y hora de la calificacion: ";
        //echo $nuevafecha;
        //echo "<br />";
        // calcular la diferencia de hora actual con la hora de la visita
        $minutos = ceil((strtotime($nuevafecha) - strtotime($fcalifica)) /60 );
        //echo 'Tienes '.$minutos.' minuto(s) de diferencia';
        //echo "<br />";
        if ($minutos > 60) {
          echo '<div class="">
            <form action=';
            echo '"contenido.php?lugar='.$lugar.'"method="post">
              <fieldset>
                <span class="star-cb-group">
                  <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                  <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
                  <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                  <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                  <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                  </span>
              </fieldset>
          </div>
          <div class="text-center">
            <button class="btn btn-primary btn-xs" type="submit" name="califica">Calificar</button></form>
            </div>';
        }else {
          echo '<div class="text-center alert-warning">
            Ya has calificado este sitio, gracias!
            </div>';
        }
      } else {
        echo '<div class="">
          <form action=';
          echo '"contenido.php?lugar='.$lugar.'"method="post">
            <fieldset>
              <span class="star-cb-group">
                <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
                <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                </span>
            </fieldset>
        </div>
        <div class="text-center">
          <button class="btn btn-primary btn-xs" type="submit" name="califica">Calificar</button></form>
          </div>';
      }
  $conn->close();
?>
