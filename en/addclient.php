<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Formulario</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <?php if (!isset($_POST['crear_cliente'])): ?>
      <form action="addclient.php" method="post">
        <div class='row encabezado'>
          <div class='col-md-6'><h3>Crear Cliente</h3></div>
          <div class='col-md-6'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>RUT</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[rut]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Nombre</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[nombre]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Apellido Paterno</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[apaterno]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Apellido Materno</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[amaterno]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Fecha de Nacimiento</b></div>
          <div class='col-md-3'><input type="date" class="form-control" name="datos[fnac]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Direccion</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[direccion]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Email</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[email]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Contraseña</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[pass]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Telefono</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[telefono]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Ciudad</b></div>
          <div class='col-md-3'>
            <select name="datos[ciudad]" class="form-control">
              <option value="Coquimbo">Coquimbo</option>
              <option value="La Serena">La Serena</option>
              <option value="Ovalle">Ovalle</option>
            </select>
          </div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Comuna</b></div>
          <div class='col-md-3'>
            <select name="datos[comuna]" class="form-control">
              <option value="Coquimbo">Coquimbo</option>
              <option value="La Serena">La Serena</option>
              <option value="Ovalle">Ovalle</option>
            </select>
          </div>
        </div>
        <div class='row pie'>
          <div class='col-md-6'><b></b></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="crear_cliente">Crear Cliente</button></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // iniciamos session
      session_start();
      // capturamos los datos del post
      $cliente = $_POST['datos'];
      $sql = "INSERT INTO `Cliente` (`c_rut`, `c_nombre`, `c_apaterno`, `c_amaterno`, `c_direccion`, `c_ciudad`, `c_comuna`, `c_telefono`, `c_fnac`, `c_email`, `c_pass`)
      VALUES ('$cliente[rut]', '$cliente[nombre]', '$cliente[apaterno]', '$cliente[amaterno]', '$cliente[direccion]', '$cliente[ciudad]', '$cliente[comuna]', '$cliente[telefono]', '$cliente[fnac]', '$cliente[email]', '$cliente[pass]')";
      echo "Cliente igresado";
      // se ejecuta y cierra la bbdd
      $conn->query($sql);
      $conn->close();
      // guardamos la variable de session cliente
      $_SESSION['cliente'] = $cliente;
      // cargamos el siguiente paso, crear equipo
      //header('Location: crear_equipo.php');
      ?>

    <?php endif; ?>
  </div>
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
