<?php
  include 'session.php';
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Agregar Usuario</title>

    <!-- <meta name="description" content="Source code generated using layoutit.com">
    <meta name="ElChitoSeLaCome" content="LayoutIt!"> -->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
    <style type="text/css">
      body {
        padding-top: 0px;
        padding-bottom: 40px;
      }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php include 'navbar.php'; ?>
    <div class="container">
    <?php if (!isset($_POST['crear_usuario'])): ?>
      <form action="adduser.php" method="post" class="form-horizontal">
        <div class='row encabezado'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><h3>Crear Usuario</h3></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Nombre</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datosusuario[nombre]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Apellido Paterno</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datosusuario[apaterno]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Apellido Materno</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datosusuario[amaterno]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Fecha de Nacimiento</b></div>
          <div class='col-md-2'><input type="date" class="form-control" min="1930-01-01" max="1998-12-31" name="datosusuario[fnac]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Email</b></div>
          <div class='col-md-2'><input type="email" class="form-control" name="datosusuario[email]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Contraseña</b></div>
          <div class='col-md-2'><input type="password" class="form-control" name="datosusuario[pass]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Telefono</b></div>
          <div class='col-md-2'><input type="number" class="form-control" name="datosusuario[telefono]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Pais</b></div>
          <div class='col-md-2'>
            <?php include'cbcountry.php'; ?>
          </div>
          <div class='col-md-2'></div>
        </div>
        <div class='row pie'>
          <div class='col-md-3'></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="crear_usuario">Crear Usuario</button></div>
          <div class='col-md-2'></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // capturamos los datos del post
      $usuario = $_POST['datosusuario'];
      $sql = "INSERT INTO `USUARIO` (`u_nombre`, `u_apaterno`, `u_amaterno`, `u_pais`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`, `id_tusuario`, `u_estado`)
      VALUES ('$usuario[nombre]', '$usuario[apaterno]', '$usuario[amaterno]', '$usuario[pais]', '$usuario[telefono]', '$usuario[fnac]', '$usuario[email]', '$usuario[pass]', 1, 'TRUE')";
      echo "Usuario igresado";
      echo "<br />";
      //echo $sql;
      //echo "<br />";
      //$latitude = $_POST["latitude"];
      //$longitude = $_POST["longitude"];
      //$accuracy = $_POST["accuracy"];
      //echo "Latitude:".$latitude."</br>";
      //echo "longitude:".$longitude."</br>";
      //echo "Exactitud:".$accuracy."</br>";

      //$sql3 = "INSERT INTO `UBICACION_ACTUAL` (`id_ubicacion`, `ID_USUARIO`, `u_amaterno`, `u_pais`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`, `id_tusuario`, `u_estado`)
      //VALUES ('$usuario[nombre]', '$usuario[apaterno]', '$usuario[amaterno]', '$usuario[pais]', '$usuario[telefono]', '$usuario[fnac]', '$usuario[email]', '$usuario[pass]', 1, 'TRUE')";
      //echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$latitude.','.$longitude.'&markers=color:red%7Clabel:C%7C'.$latitude.','.$longitude.'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
      //echo '<a href="https://www.google.com/maps/dir/'.$latitude.','.$longitude.'/San+Martin+1138,+coquimbo,+region+de+coquimbo">
      //<img src="https://maps.googleapis.com/maps/api/staticmap?
      //center=San+Martin+1138,+coquimbo,+region+de+coquimbo&markers=color:blue%7Clabel:C%7CSan+Martin+1138,+coquimbo,
      //+region+de+coquimbo&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';

      // se ejecuta y cierra la bbdd
      //$conn->query($sql);
      //$conn->close();
      // guardamos la variable de session cliente
      //$_SESSION['usuario'] = $usuario;
      // cargamos el siguiente paso, crear equipo
      //header('Location: crear_equipo.php');
      ?>

    <?php endif; ?>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <!-- include summernote -->
  <script type="text/javascript" src="summernote/dist/summernote.js"></script>
  </body>
</html>
