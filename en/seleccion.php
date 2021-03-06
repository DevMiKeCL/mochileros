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
      <!-- aqui escribo > -->
    <h2>Seleccion de servicio</h2>
    <?php if (!isset($_POST['submit'])):
      //form:post[action="pizza.php"]>table>tr*11>(td>input:checkbox[name="favorita[]" value=""])+(td>{nombre$})^input:submit[value="enviar" name="submit"]
      ?>
      <form action="seleccion.php" method="post">
        <table>
          <tr>
            <td> <?php include 'checkbox.php' ?></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" value="enviar" name="submit"></td>
          </tr>
        </table>
      </form>
    <?php else:
      $recepcion = $_POST['servicio'];
      // conectamos a la base de datos
      include 'conexion.php';
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
      $sql = $sql1. $sql2;
      // se ejecuta y cierra la bbdd
      echo $sql;
      $conn->query($sql);
      $conn->close();
      ?>
    <?php endif; ?>
  </div>
</div>

</div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
</body>
</html>
