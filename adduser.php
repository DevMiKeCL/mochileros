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

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
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
    <div class="container">
    <?php if (!isset($_POST['crear_usuario'])): ?>
      <form action="adduser.php" method="post" id="validacion-live"  class="form-horizontal">
        <div class='row encabezado'>
          <div class='col-md-6'><h3>Crear Usuario</h3></div>
          <div class='col-md-6'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>RUT </b></div>
            <div class="control-group">
              <div class="controls">
                <div class='col-md-3'><input type="text" placeholder="12.345.678-9" id="txt_rut" class="form-control" name="datos[rut]" required/></div>
            </div>
          </div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Nombre</b></div>
          <div class='col-md-3'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[nombre]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Apellido Paterno</b></div>
          <div class='col-md-3'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[apaterno]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Apellido Materno</b></div>
          <div class='col-md-3'><input type="text" class="form-control" onkeypress="return validar(event)" name="datos[amaterno]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Fecha de Nacimiento</b></div>
          <div class='col-md-3'><input type="date" class="form-control" name="datos[fnac]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Email</b></div>
          <div class='col-md-3'><input type="email" class="form-control" name="datos[email]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Contraseña</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[pass]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Telefono</b></div>
          <div class='col-md-3'><input type="number" class="form-control" name="datos[telefono]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Pais</b></div>
          <div class='col-md-3'>
            <?php include'cbcountry.php'; ?>
          </div>
        </div>
        <div class='row pie'>
          <div class='col-md-6'><b></b></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="crear_usuario">Crear Usuario</button></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // iniciamos session
      session_start();
      // capturamos los datos del post
      $cliente = $_POST['datos'];
      $sql = "INSERT INTO `Usuario` (`u_rut`, `u_nombre`, `u_apaterno`, `u_amaterno`, `u_ciudad`, `u_comuna`, `u_telefono`, `u_fnac`, `u_email`, `u_pass`)
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/jquery.rut.js"></script>
  <script type="text/javascript">
    $(function(){
      $("form#basico input").rut();
      $("form#multiple-objetos input").rut({formatOn: 'keyup'});
      $("form#formato-live input").rut({formatOn: 'keyup'});
      $("form#validacion-live input#txt_rut").rut({formatOn: 'keyup', validateOn: 'keyup'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("error")}).on('rutValido', function(){ $(this).parents(".control-group").removeClass("error")});
      $("form#extraer-cuerpo input").rut().on('rutValido', function(e, rut){alert("Su RUT sin DV es " + rut);});
      $("form#multiple-events input").rut({validateOn: 'keyup change'}).on('rutInvalido', function(){ $(this).parents(".control-group").addClass("error") }).on('rutValido', function(){ $(this).parents(".control-group").removeClass("error") });
    });
  </script>
  </body>
</html>
