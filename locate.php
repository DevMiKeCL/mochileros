<?php
  include 'session.php';
 ?>
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php include 'navbar.php'; ?>
			</nav>

		</div>
	</div>
  <!-- aqui escribo > -->

<!-- aqui termino -->
  <div class="container">
    <div class="row">
  		<div class="col-md-4">
        <?php
          if (isset($_POST['localizar'])) {
            sleep(1);
            //obtener datos post y de session
            $locate = $_POST['loc'];
            $usr = $_SESSION['user'];
            echo "<br />";
            echo "consulta sql: <br />";
            $sqlub = "INSERT INTO `UBICACION_ACTUAL` (`id_usuario`, `ub_latitud`, `ub_longitud`, `ub_exactitud`)
            VALUES ('$usr[id]', '$locate[lat]', '$locate[lon]', '$locate[acu]')";
            echo "$sqlub";
            //$conn->query($sqlub);
            //echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center=
            //$locate[lat],$locate[lon]&markers=color:red%7Clabel:C%7C$locate[lat],
            //$locate[lon]&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';

            // en variable de session la ubicacion
            $_SESSION['ubicacion'] = $locate;

            //echo "variable de session: <br />";
            //var_dump($_SESSION['ubicacion']);

          //var_dump($locate);
          echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='
          .$locate['lat'].','.$locate['lon'].'&markers=color:red%7Clabel:C%7C'
          .$locate['lat'].','.$locate['lon'].'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
        }

         ?>
  		</div>

  		<div class="col-md-4">
  		</div>
  		<div class="col-md-4">

  		</div>
  	</div>
  </div>
</div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>SINAPSIS</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisici elit,
              <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
              <br>Ut enim ad minim veniam, quis nostrud</p>
          </div>
          <div class="col-sm-6">
            <p class="text-info text-right">
              <br>
              <br>
            </p>
            <div class="row">
              <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 hidden-xs text-right">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
