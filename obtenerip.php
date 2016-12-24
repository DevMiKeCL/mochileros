<?php
  $ip = $_SERVER['REMOTE_ADDR'];
  echo "tu ip es: ";
  echo "$ip";
  echo "<br/>";

  $fecha1 = '2012-10-24 14:46:00';
  $fecha2 = '2012-10-24 14:00:00';
  $minutos = ceil((strtotime($fecha1) - strtotime($fecha2)) /60 );
  //echo "tienes $minutos";
  if ($minutos > 45) {
       echo 'tienes '.$minutos.' minuto(s) esto registra como una nueva visita';
  }else {
    echo 'solo tienes '.$minutos.' minuto(s)' ;
  }
 ?>
