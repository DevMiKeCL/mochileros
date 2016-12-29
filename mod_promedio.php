<?php
  include 'conexion.php';
  $sqlprom = "SELECT ROUND(AVG(`C_VALOR`),1) AS PROMEDIO FROM `CALIFICACION` WHERE `ID_LUGAR` = $lugar";
  $result = $conn->query($sqlprom);
  $row = $result->fetch_assoc();
  $prom = $row["PROMEDIO"];
  echo "$prom";
  $conn->close();
?>
