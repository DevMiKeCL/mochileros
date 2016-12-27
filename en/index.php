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
			<div class="jumbotron">
				<h2>
					¡WELCOME TO MOCHILEROS CHILE!
				</h2>

				<p>
          IN THIS PLACE YOU WILL FIND ALL THE INFORMAATION YOU NEED ABOUT CAMPING SITES, RESTAURANTS AND ANOTHER SERVICES-
				</p>
				<!-- <p>
					<a class="btn btn-primary btn-large" href="#">INGRESAR</a>
				</p> -->
			</div>
      <!-- aqui escribo > -->
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
						<img alt="Carousel Bootstrap First" src="img/slide/01.jpg">
						<div class="carousel-caption">
							<h4>
								LAS GREDAS
							</h4>
							<p class="slide">
								CABINS FOR 2 TO 5 PEOPPLE, DESIGNED FOR FAMILY REST, AN ENVIROMENT F PEACE AND RELAXATION. LOCATED IN PISCO ELQUI TOWN, JUST A CCLOCK AWAY FROM THE PLAZA DE ARMAS.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Second" src="img/slide/02.jpg">
						<div class="carousel-caption">
							<h4>
								MONTAÑAS DE ELQUI
							</h4>
							<p class="slide">
								LOCATED IN THE TOWN OF PAIHUANO, IT OFFERS A BEAUTIFUL PLACE TO REST, WITH OUTDOOR POOL, AND SSURROUNDED BY THE PEACEFUL MOUNTAINS.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="img/slide/03.jpg">
						<div class="carousel-caption">
							<h4>
								LAS PATAGUAS
							</h4>
							<p class="slide">
								Located right in the middle of Arenal, just 6 km away from Vicuña, on the road to Pisco Elqui..
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-922032" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-922032" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
    <!-- aqui termino -->
		</div>
	</div>
  <div class="row">
		<div class="col-md-4">
			<h2>
				Las Gredas
			</h2>
			<p>
				CABINS FOR 2 TO 5 PEOPPLE, DESIGNED FOR FAMILY REST, AN ENVIROMENT F PEACE AND RELAXATION. LOCATED IN PISCO ELQUI TOWN, JUST A CCLOCK AWAY FROM THE PLAZA DE ARMAS.
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
				LOCATED IN THE TOWN OF PAIHUANO, IT OFFERS A BEAUTIFUL PLACE TO REST, WITH OUTDOOR POOL, AND SSURROUNDED BY THE PEACEFUL MOUNTAINS.
			</p>
			<p>
				<a class="btn" href="contenido.php?lugar=2">View details »</a>
			</p>
		</div>
		<div class="col-md-4">
			<h2>
				Las Pataguas
			</h2>
			<p>
				Located right in the middle of Arenal, just 6 km away from Vicuña, on the road to Pisco Elqui.
			</p>
			<p>
				<a class="btn" href="contenido.php?lugar=3">View details »</a>
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
