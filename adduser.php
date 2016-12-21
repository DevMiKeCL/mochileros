<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <title>Formulario</title>
    <!-- include jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->
    <!-- include scripts -->
    <script src="js/scripts.js"></script>
    <!-- include libraries BS3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

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
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
             <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button> <a class="navbar-brand" href="index.html">MOCHILEROS</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
              <a href="#">Acerca de</a>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">Cámpines</a>
                </li>
                <li>
                  <a href="#">Restaurantes</a>
                </li>
                <li>
                  <a href="#">Locomoción</a>
                </li>
                <li>
                  <a href="#">Sitios de Interes</a>
                </li>
                <!-- <li class="divider">
                </li>
                <li>
                  <a href="#">One more separated link</a>
                </li> -->
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input placeholder="Busca tu sitio"type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-default">
              Buscar
            </button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="index.html"> <img class="flag" src="img/Chile.png"> </a>
            </li>
            <li>
              <a href="index.html"> <img  class="flag" src="img/United States.png"> </a>
            </li>
            <li>
              <a href="index.html"> <img class="flag" src="img/Brazil.png"> </a>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa/Registrate<strong class="caret"></strong></a>
              <ul class="dropdown-menu">
                <li>
                  <input type="text" placeholder="Nombre">
                </li>
                <li>
                  <input type="password" placeholder="Contraseña">
                </li>
                <li>
                  <button type="submit" class="btn btn-default">
                    Aceptar
                  </button>
                  <button type="submit" class="btn btn-default">
                    Cancelar
                  </button>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="adduser.php">Registro Usuarios Nuevos</a>
                </li>
                <li class="divider">
                </li>
                <li>
                  <a href="#">Ingreso Administrador</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

      </nav>
    <div class="container">
    <?php if (!isset($_POST['crear_usuario'])): ?>
      <form action="adduser.php" method="post" id="validacion-live"  class="form-horizontal">
        <div class='row encabezado'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><h3>Crear Usuario</h3></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Nombre</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[nombre]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Apellido Paterno</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[apaterno]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Apellido Materno</b></div>
          <div class='col-md-2'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[amaterno]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Fecha de Nacimiento</b></div>
          <div class='col-md-2'><input type="date" class="form-control" min="1930-01-01" max="1998-12-31" name="datos[fnac]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Email</b></div>
          <div class='col-md-2'><input type="email" class="form-control" name="datos[email]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Contraseña</b></div>
          <div class='col-md-2'><input type="text" class="form-control" name="datos[pass]" required></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Telefono</b></div>
          <div class='col-md-2'><input type="number" class="form-control" name="datos[telefono]" required></div>
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
          <input type="hidden" id="latitude" name="latitude" value="" />
          <input type="hidden" id="longitude" name="longitude" value="" />
          <input type="hidden" id="accuracy" name="accuracy" value="" />
          <div class='col-md-3'></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="crear_usuario">Crear Usuario</button></div>
          <div class='col-md-2'></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // iniciamos session
      //session_start();
      // capturamos los datos del post
      $usuario = $_POST['datos'];
      $sql = "INSERT INTO `USUARIO` (`u_nombre`, `u_apaterno`, `u_amaterno`, `u_pais`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`, `id_tusuario`, `u_estado`)
      VALUES ('$usuario[nombre]', '$usuario[apaterno]', '$usuario[amaterno]', '$usuario[pais]', '$usuario[telefono]', '$usuario[fnac]', '$usuario[email]', '$usuario[pass]', 1, 'TRUE')";
      echo "Usuario igresado";
      echo "<br />";

      echo $sql;
      echo "<br />";
      $latitude = $_POST["latitude"];
      $longitude = $_POST["longitude"];
      $accuracy = $_POST["accuracy"];
      echo "Latitude:".$latitude."</br>";
      echo "longitude:".$longitude."</br>";
      echo "Exactitud:".$accuracy."</br>";

      $sql3 = "INSERT INTO `UBICACION_ACTUAL` (`id_ubicacion`, `ID_USUARIO`, `u_amaterno`, `u_pais`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`, `id_tusuario`, `u_estado`)
      VALUES ('$usuario[nombre]', '$usuario[apaterno]', '$usuario[amaterno]', '$usuario[pais]', '$usuario[telefono]', '$usuario[fnac]', '$usuario[email]', '$usuario[pass]', 1, 'TRUE')";
      //echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$latitude.','.$longitude.'&markers=color:red%7Clabel:C%7C'.$latitude.','.$longitude.'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
      echo '<a href="https://www.google.com/maps/dir/'.$latitude.','.$longitude.'/San+Martin+1138,+coquimbo,+region+de+coquimbo">
      <img src="https://maps.googleapis.com/maps/api/staticmap?
      center=San+Martin+1138,+coquimbo,+region+de+coquimbo&markers=color:blue%7Clabel:C%7CSan+Martin+1138,+coquimbo,
      +region+de+coquimbo&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';

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

  </body>
</html>
