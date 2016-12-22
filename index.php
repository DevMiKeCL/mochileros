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
    $conn->close();
  }

  //if (isset($_SESSION['user'])){
  //  $user = $_SESSION['user'];
  //  echo 'Hola '.$user['nombre'];
  //}

  //var_dump($_SESSION['usuario']);


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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
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
              <a href="index.html"> <img class="flag" src="img/United States.png"> </a>
            </li>
            <!-- <li>
              <a href="index.html"> <img class="flag" src="img/Brazil.png"> </a>
						</li> -->
            <?php if (isset($_SESSION['user'])):
              $user = $_SESSION['user'];
              echo '<li class="dropdown">
  							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola '.$user['nombre'].'<strong class="caret"></strong></a>
  							<ul class="dropdown-menu">
                  <form action="index.php" method="post">
                    <li>
                      <button class="btn btn-block" type="submit" id="cerrar" name="cerrar">Cerrar Sesion</button>
                    </li>
                  </form>
                    ';
              ?>

            <?php else:
              echo '
              <li class="dropdown">
  							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa/Registrate<strong class="caret"></strong></a>
  							<ul class="dropdown-menu">
                  <form action="index.php" method="post">
                    <li>
                      <input type="text" class="form-control" placeholder="Nombre" name="usuario[nombre]" required>
                    </li>
                    <li>
                      <input type="password" class="form-control" placeholder="Contraseña" name="usuario[pass]" required>
                    </li>
                    <li>
                      <button class="btn btn-primary btn-block" type="submit" id="iniciar" name="iniciar">
                        Aceptar
                      </button>
                  </form>
                      <!-- <button type="submit" class="btn btn-default">
                        Cancelar
                      </button> -->
                    </li>';
              ?>

            <?php endif; ?>
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
			<div class="jumbotron">
				<h2>
					¡BIENVENIDO A MOCHILEROS CHILE!
				</h2>
				<p>
          En éste lugar encontrarás toda la información que necesitas acerca de sitios de camping, restaurantes u otros servicios.
				</p>
				<!-- <p>
					<a class="btn btn-primary btn-large" href="#">INGRESAR</a>
				</p> -->
			</div>
			<div class="carousel slide" id="carousel-922032">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-922032">
					</li>
					<li data-slide-to="1" data-target="#carousel-922032">
					</li>
					<li data-slide-to="2" data-target="#carousel-922032">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="Carousel Bootstrap First" src="http://imageshack.com/a/img923/2666/stAm18.png">
						<div class="carousel-caption">
							<h4>
								LAS GREDAS
							</h4>
							<p class="slide">
								Cabañas de dos a cinco personas diseñadas para el descanso familiar, en un ambiente de tranquilidad, paz y relajación. Ubicadas en el poblado de Pisco Elqui a solo una cuadra de la Plaza de Armas.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Second" src="http://imageshack.com/a/img921/83/zxamMn.png">
						<div class="carousel-caption">
							<h4>
								MONTAÑAS DE ELQUI
							</h4>
							<p class="slide">
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="http://imageshack.com/a/img921/5909/sQ8O8t.png">
						<div class="carousel-caption">
							<h4>
								LAS PATAGUAS
							</h4>
							<p class="slide">
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-922032" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-922032" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h2>
				Las Gredas
			</h2>
			<p>
				Cabañas de dos a cinco personas diseñadas para el descanso familiar, en un ambiente de tranquilidad, paz y relajación. Ubicadas en el poblado de Pisco Elqui a solo una cuadra de la Plaza de Armas.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
				Montañas de Elqui
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
				Las Pataguas
			</h2>
			<p>
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
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
