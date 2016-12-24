<?php
  session_start();
  if (isset($_POST['cerrar'])) {
    session_destroy();
    sleep(3);
    header('Location: index.php');
  }

  if (isset($_SESSION['user'])) {
    //echo "variable cargada";
  }
  if (isset($_POST['iniciar'])) {
    include 'conexion.php';
    //se almacena en $usuario lo capturado en el form
    $usuario = $_POST['usuario'];
    $sql = "SELECT `id`, `nombre`, `pass` FROM `LOGIN` WHERE `nombre` = '$usuario[nombre]' AND `pass` ='$usuario[pass]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    // se crea, ejecuta y captura resultado de consulta sql
    //var_dump($row);
    //echo "<br />";
    // se valida el usuario para acceder al menu
    if ($usuario['nombre'] == $row["nombre"] && $usuario['pass'] == $row["pass"]  ) {
      //echo "tecnico validado";
      $_SESSION['user'] = $row;
      $usr = $_SESSION['user'];
      sleep(1);
      // guardamos nuestra localizacion actual
      $loc = $_POST['geo'];
      $loc['ip'] = $_SERVER['REMOTE_ADDR'];
      //var_dump($loc);
      $sqlub = "INSERT INTO `UBICACION_ACTUAL` (`id_usuario`, `ub_ip`, `ub_latitud`, `ub_longitud`, `ub_exactitud`)
      VALUES ('$usr[id]', '$loc[ip]', '$loc[lat]', '$loc[lon]', '$loc[acu]')";
      $conn->query($sqlub);

      $_SESSION['ubicacion'] = $loc;

      //echo "variable de session: <br />";
      //var_dump($_SESSION['ubicacion']);
      //echo "$sqlub";
      //var_dump($loc);
      //UBICACION ACTUAL
      //echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$loc['lat'].','.$loc['lon'].'&markers=color:red%7Clabel:C%7C'.$loc['lat'].','.$loc['lon'].'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
      //EJEMPLO DESTINO
      //echo '<a href="https://www.google.com/maps/dir/'.$loc['lat'].','.$loc['lon'].'/San+Martin+1138,+coquimbo,+region+de+coquimbo">
      //<img src="https://maps.googleapis.com/maps/api/staticmap?
      //center=San+Martin+1138,+coquimbo,+region+de+coquimbo&markers=color:blue%7Clabel:C%7CSan+Martin+1138,+coquimbo,
      //+region+de+coquimbo&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';
      //header('Location: menu.php');
    } else {
      echo "error $sql";
      session_destroy();
      //header('Location: index.php');
    }
    $conn->close();
  }

  //if (isset($_SESSION['user'])){
  //  $user = $_SESSION['user'];
  //  echo 'Hola '.$user['nombre'];
  //}

  //var_dump($_SESSION['usuario']);


?>
