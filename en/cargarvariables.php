<?php
  include 'session.php';
  echo "Cargando variables: <br />";
  $loc = $_SESSION['ubicacion'];
  var_dump($loc);
  echo "<br />";
  $usr = $_SESSION['user'];
  var_dump($usr);
  echo "<br />";

  $sql = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = '.$usr['id'].' order by `UB_FECHA` desc LIMIT 0, 1';
  echo "$sql";
  //unir variables
  $fusion = array_merge($loc,$usr);
  echo "<br />";
  var_dump($fusion);
  include 'conexion.php';
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  echo "<br />";
  var_dump($row);
  $conn->close();
 ?>
