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
        <h3>Reseña de la cabaña</h3>
        <br />
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  		</div>

  		<div class="col-md-4">
        <h4>Ubicacion</h4>
        <?php
          $destino = "-30.0307856,-70.6688829";
          $destino = str_replace(" ", "+", $destino);
          echo "$destino";
          $u_actual = $_SESSION['ubicacion'];
          echo '
          <a href="https://www.google.com/maps/dir/'.$u_actual['lat'].','.$u_actual['lon'].'/'.$destino.'">
          <img src="https://maps.googleapis.com/maps/api/staticmap?center=
          '.$destino.'&markers=color:red%7Clabel:C%7C'.$destino.'&zoom=15&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';

         ?>
        </form>
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
