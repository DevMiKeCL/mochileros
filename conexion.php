
<?php
  $servername = "localhost";
  $username = "mochileros";
  $password = "m0ch1l3r0";
  $dbname = "mochileros";
  // Crear conexion
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Revisa conexion
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else {
    echo "conexion exitosa";
  }
?>
