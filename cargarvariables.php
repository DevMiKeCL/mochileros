<?php
  include 'session.php';
  echo "Cargando variables: <br />";
  $loc = $_SESSION['ubicacion'];
  var_dump($loc);
  echo "<br />";
  $usr = $_SESSION['user'];
  var_dump($usr);
  echo "<br />";
  
  $sql = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = 1 order by `UB_FECHA` desc LIMIT 0, 1';


 ?>
