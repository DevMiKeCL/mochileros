
<?php
  $servername = "localhost";
  $username = "mochile_moch2017";
  $password = "m0ch1l3r0";
  $dbname = "mochile_mochileros";
  // Crear conexion
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Revisa conexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
  }
?>
