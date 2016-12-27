<?php
  include 'session.php';
  echo "Cargando variables: <br />";
  $loc = $_SESSION['ubicacion'];
  var_dump($loc);
  echo "<br />";
  $usr = $_SESSION['user'];
  var_dump($usr);
  $lugar = $_SESSION['lugar'];
  include 'conexion.php';
  $sql = 'SELECT * FROM `CALIFICACION` where `ID_USUARIO` = '.$usr['ID_USUARIO'].' AND `ID_LUGAR` = '.$lugar.' order by `C_FECHA` desc LIMIT 0, 1';
  //$sql2 = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = '.$usr['id'].' order by `UB_FECHA` desc LIMIT 0, 1';
  echo "$sql";
  $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $fcalifica = $row["C_FECHA"];
      echo "Fecha y hora de la última visita: $fcalifica";
      //calculamos la fecha y hora actual del servidor apache
      $fecha = date("Y-m-d H:i:s");
      $nuevafecha = strtotime ( '-3 hour' , strtotime ( $fecha ) ) ;
      $nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );
      echo "<br />";
      echo "Fecha y hora de la visita actual: ";
      echo $nuevafecha;
      echo "<br />";
      // calcular la diferencia de hora actual con la hora de la visita
      $minutos = ceil((strtotime($nuevafecha) - strtotime($fcalifica)) /60 );
      echo 'Tienes '.$minutos.' minuto(s) de diferencia';
      echo "<br />";
      if ($minutos > 60) {
        echo "Es hora de cargar una nueva calificacion";
        $rating = $_POST['rating'];
        $sqlr ="INSERT INTO `CALIFICACION`(`ID_USUARIO`, `ID_LUGAR`, `C_VALOR`) VALUES ('$usr[ID_USUARIO]','$lugar','$rating')";
        echo "$sqlr";
        echo "<br />";
        //$conn->query($sql);
      }else {
        echo "La proxima calificacion sera en 1 hora";
      }

    } else {
      echo "primera visita";
      $sqlr ="INSERT INTO `CALIFICACION`(`ID_USUARIO`, `ID_LUGAR`, `C_VALOR`) VALUES ('$usr[ID_USUARIO]','$lugar','$rating')";
      echo "$sqlr";
      echo "<br />";
      //$conn->query($sql);
    }
  $conn->close();
 ?>
