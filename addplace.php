<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Crear Lugar</title>
    <!-- include jquery -->

    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <!-- include libraries BS3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="summernote/dist/summernote.css">

  </head>
  <body>
    <div class="container">
    <?php if (!isset($_POST['crear_lugar'])): ?>
      <form action="addplace.php" method="POST" id="postForm" enctype="multipart/form-data" onsubmit="return postForm()">
        <div class='row encabezado'>
          <div class='col-md-6'><h3>Crear Lugar</h3></div>
          <div class='col-md-6'></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Nombre</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[nombre]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Tipo</b></div>
          <div class='col-md-3'><?php include 'cbtlugar.php' ?></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Direccion</b></div>
          <div class='col-md-3'><input type="text" class="form-control" name="datos[direccion]" required></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-6'><b>Localidad</b></div>
          <div class='col-md-3'>
            <select name="datos[localidad]" class="form-control">
              <optgroup label="Paihuano">
                <option value="Alcohuáz">Alcohuáz</option>
                <option value="Pisco Elqui">Pisco Elqui</option>
                <option value="Paihuano">Paihuano</option>
                <option value="Monte Grande">Monte Grande</option>
                <option value="Horcón">Horcón</option>
                <option value="Cochiguáz">Cochiguáz</option>
              </optgroup>
              <optgroup label="Vicuña">
                <option value="El Almendral">El Almendral</option>
                <option value="Gualliguaica">Gualliguaica</option>
                <option value="El Tambo">El Tambo</option>
                <option value="Pelícana">Pelícana</option>
                <option value="Qda. de Talca">Qda. de Talca</option>
                <option value="Villaseca">Villaseca</option>
                <option value="Perallilo">Perallilo</option>
                <option value="Andacollito">Andacollito</option>
                <option value="La Campana">La Campana</option>
                <option value="Rivadavia">Rivadavia</option>
                <option value="Vicuña">Vicuña</option>
                <option value="El Molle">El Molle</option>
                <option value="Diaguitas">Diaguitas</option>
                <option value="San Isidro">San Isidro</option>
                <option value="El Arenal">El Arenal</option>
              </optgroup>
              <optgroup label="La Serena">
                <option value="El Arrayan">El Arrayan</option>
                <option value="Las Rojas">Las Rojas</option>
                <option value="Gabriela">Gabriela</option>
                <option value="Altovalsol">Altovalsol</option>
                <option value="Monardez">Monardez</option>
                <option value="Algarrobito">Algarrobito</option>
                <option value="La Serena">La Serena</option>
              </optgroup>
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
          <div class='col-md-3'><?php include 'checkbox.php' ?></div>
        </div>
        <div class='row contenido2'>
          <div class='col-md-12'>
          <label for="contents">Descripcion</label>
          <textarea class="input-block-level" id="summernote" name="content" rows="18" required></textarea>
          </div>
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
      //session_start();
      // capturamos los datos del post
      $lugar = $_POST['datos'];
      $descripcion = base64_encode($_POST['content']);
      //$servicio = $_POST['servicio'];
      echo "<br />";
      var_dump($lugar);
      echo "<br />";
      var_dump($descripcion);
      echo "<br />";
      $sql = "INSERT INTO `Lugar` (`l_nombre`, `id_tipo`, `l_direccion`, `l_localidad`, `l_telefono`, `l_facebook`, `l_twitter`, `l_whatsapp`, `l_descripcion`, `l_comollegar`)
      VALUES ('$lugar[nombre]', '$lugar[tipo]', '$lugar[direccion]', '$lugar[localidad]', '$lugar[telefono]', '$lugar[facebook]', '$lugar[twitter]', '$lugar[whatsapp]', '$descripcion', '$lugar[comollegar]')";
      echo "Usuario igresado";
      echo "<br />";
      echo "$sql";
      echo "<br />";

      $recepcion = $_POST['servicio'];

      //verificamos la integridad de la variable
      //var_dump($recepcion);
      $j = 0;
      foreach ($recepcion as $serv) {
        if (isset($serv)) {
          $recepcion2[$j] = $serv;
          $j++;
          // si hay contenido se imprime el contador j
          //echo "imprime j $j <br />";
        }else {
          echo "no hay contenido <br />";
        }
        // verificamos el contenido
        //echo "$serv <br />";
      }
      //echo "<h3>var_dump final</h3>";
      //var_dump($recepcion2);
      $valores = '1';
      if (count($recepcion2) > 1) {
        $i = 0;
        $str = $recepcion2[$i];
        for ($i=1; $i < count($recepcion2) ; $i++) {
          $str = $str.'`, `'.$recepcion2[$i];
          $valores = $valores. "', '1";
          //echo "imprime i $i <br />";
        }
      }else {
        $i = 0;
        $str = $recepcion2[$i];
      }
      $sql1= 'INSERT INTO `servicio` (`'.$str.'`)';
      $sql2= "VALUES ('$valores')";
      // sql final
      $sql3 = $sql1. $sql2;
      // se ejecuta y cierra la bbdd
      echo $sql3;
      // se ejecuta y cierra la bbdd
      //$conn->query($sql);
      //$conn->close();
      // guardamos la variable de session cliente
      //$_SESSION['cliente'] = $cliente;
      // cargamos el siguiente paso, crear equipo
      //header('Location: crear_equipo.php');
    ?>

    <?php endif; ?>
  </div>
  <!-- <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- include summernote -->
  <script type="text/javascript" src="summernote/dist/summernote.js"></script>
  <script src="js/scripts.js"></script>
  </body>
</html>
