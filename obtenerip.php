<?php
  $ip = $_SERVER['REMOTE_ADDR'];
  echo "tu ip es: ";
  echo "$ip";
  echo "<br/>";

  $fecha1 = '2012-10-24 14:01:00';
  $fecha2 = '2012-10-24 14:00:00';
  $minutos = ceil((strtotime($fecha1) - strtotime($fecha2)) /60 );
  echo "tienes $minutos";
  if ($minutos > 15) {
       echo 'Más de 15 minutos de diferencia';
  }else {
    echo 'solo tienes '.$minutos.' de diferencia';
  }
 ?>
