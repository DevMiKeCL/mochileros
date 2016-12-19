
<?php
  $servername = "localhost";
  $username = "mochile_moch2017";
  //$username = "mochileros";
  $password = "m0ch1l3r0";
  //$dbname = "mochileros";
  $dbname = "mochile_mochileros";
  // Crear conexion servidor
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Revisa conexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
  }
    mysqli_set_charset( $conn, 'utf8');
?>
