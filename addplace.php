<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Crear Lugar</title>

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
    <?php if (!isset($_POST['crear_lugar'])): ?>
      <form action="addplace.php" method="post">
        <div class='row encabezado'>
          <div class='col-md-6'><h3>Crear Lugar</h3></div>
          <div class='col-md-6'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Nombre</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[nombre]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Direccion</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[direccion]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Localidad</b></div>
          <div class='col-md-3'>
            <select name="datos[localidad]" class="form-control">
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
        <div class='row contenido2'>
          <div class='col-md-6'><b>Telefono</b></div>
          <div class='col-md-3'><input type="number" class="form-control" name="datos[telefono]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Facebook</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[facebook]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Twitter</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[twitter]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Whatsapp</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[whatsapp]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Servicios</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[servicios]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Descripcion</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[descripcion]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Cómo Llegar</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[comollegar]" required></div>
        </div>
        <div class='row pie'>
          <div class='col-md-6'><b></b></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="crear_lugar">Crear Lugar</button></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // iniciamos session
      session_start();
      // capturamos los datos del post
      $cliente = $_POST['datos'];
      $sql = "INSERT INTO `Lugar` (`u_rut`, `u_nombre`, `u_apaterno`, `u_amaterno`, `u_ciudad`, `u_comuna`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`)
      VALUES ('$cliente[rut]', '$cliente[nombre]', '$cliente[apaterno]', '$cliente[amaterno]', '$cliente[ciudad]', '$cliente[comuna]', '$cliente[telefono]', '$cliente[fnac]', '$cliente[email]', '$cliente[pass]')";
      echo "Usuario igresado";
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
