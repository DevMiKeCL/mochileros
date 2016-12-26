<?php
  include 'session.php';
  echo "Cargando variables: <br />";
  $loc = $_SESSION['ubicacion'];
  var_dump($loc);
  echo "<br />";
  $usr = $_SESSION['user'];
  var_dump($usr);
  include 'conexion.php';
  $sql = 'SELECT * FROM `VISITAS` where `ID_USUARIO` = '.$usr['ID_USUARIO'].' AND `ID_LUGAR` = 16 order by `V_FECHA` desc LIMIT 0, 1';
  //$sql2 = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = '.$usr['id'].' order by `UB_FECHA` desc LIMIT 0, 1';
  echo "$sql";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $fvisita = $row["V_FECHA"];
  echo "Fecha y hora de la última visita: $fvisita";
  //calculamos la fecha y hora actual del servidor apache
  $fecha = date("Y-m-d H:i:s");
  $nuevafecha = strtotime ( '-3 hour' , strtotime ( $fecha ) ) ;
  $nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );
  echo "<br />";
  echo "Fecha y hora de la visita actual: ";
  echo $nuevafecha;
  echo "<br />";
  // calcular la diferencia de hora actual con la hora de la visita
  $minutos = ceil((strtotime($nuevafecha) - strtotime($fvisita)) /60 );
  echo 'Tienes '.$minutos.' minuto(s) de diferencia';
  echo "<br />";
  if ($minutos > 60) {
    echo "Es hora de cargar una visita nueva";
    $sql = "INSERT INTO `VISITAS` (`id_usuario`, `id_lugar`)
    VALUES ('$usr[id]', '1')";
    echo "<br />";
    echo "$sql";
    $conn->query($sql);
  }else {
    echo "La proxima visita sera en 1 hora";
  }
  $conn->close();
 ?>
