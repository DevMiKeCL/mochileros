<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MOCHILEROS CHILE</title>

    <!-- <meta name="description" content="Source code generated using layoutit.com">
    <meta name="ElChitoSeLaCome" content="LayoutIt!"> -->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
    <?php if (!isset($_POST['eliminar_servicio'])): ?>
      <form action="deleteservice.php" method="post" id="validacion-live"  class="form-horizontal">
        <div class='row encabezado'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><h3>Eliminar Servicios</h3></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-3'></div>
          <div class='col-md-2'><b>Servicio</b></div>
          <div class='col-md-2'><?php include 'cbservicios.php' ?></div>
          <div class='col-md-2'></div>
        </div>
        <div class='row pie'>
          <div class='col-md-3'></div>
          <div class='col-md-2'></div>
          <div class='col-md-2'><button class="btn btn-primary btn-block" type="submit" name="eliminar_servicio">Eliminar Servicio</button></div>
          <div class='col-md-2'></div>
        </div>
      </form>
    <?php else:
      // conectamos a la base de datos
      include 'conexion.php';
      // iniciamos session
      session_start();
      // capturamos los datos del post
      $servicio = $_POST['datos'];
      $sql = "DELETE FROM `lista_servicio` WHERE `ID_LSERVICIO` = $servicio[id]";
      echo "Servicio eliminado";
      echo "<br />";
      echo $sql;
      // se ejecuta y cierra la bbdd
      $conn->query($sql);
      $conn->close();
      // guardamos la variable de session cliente
      $_SESSION['servicio'] = $servicio;
      // cargamos el siguiente paso, crear equipo
      //header('Location: crear_equipo.php');
      ?>

    <?php endif; ?>
  </div>
  <div class="container">
  <h2>Lista de Servicios</h2>
  <p>Servicios disponibles para el sitio</p>
  <?php include 'tabla.php'; ?>
</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  </body>
</html>
