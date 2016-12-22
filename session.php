<?php
  session_start();
  if (isset($_POST['cerrar'])) {
    session_destroy();
    sleep(3);
    header('Location: index.php');
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
      //header('Location: menu.php');
    } else {
      echo "error $sql";
      //header('Location: index.php');
    }
    $loc = $_POST['geo'];
    var_dump($loc);

    echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$loc['lat'].','.$loc['lon'].'&markers=color:red%7Clabel:C%7C'.$loc['lat'].','.$loc['lon'].'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
    echo '<a href="https://www.google.com/maps/dir/'.$latitude.','.$longitude.'/San+Martin+1138,+coquimbo,+region+de+coquimbo">
    <img src="https://maps.googleapis.com/maps/api/staticmap?
    center=San+Martin+1138,+coquimbo,+region+de+coquimbo&markers=color:blue%7Clabel:C%7CSan+Martin+1138,+coquimbo,
    +region+de+coquimbo&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';
    $conn->close();
  }

  //if (isset($_SESSION['user'])){
  //  $user = $_SESSION['user'];
  //  echo 'Hola '.$user['nombre'];
  //}

  //var_dump($_SESSION['usuario']);


?>
