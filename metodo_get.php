<?php
  include 'session.php';
  // validamos si el usuario tiene permisos de cliente
  if (isset($_SESSION['user'])) {
    $usr = $_SESSION['user'];
    //var_dump($usr);
    //echo "<br />id tipo de usuario: ";
    //echo $usr['ID_TUSUARIO'];
    //echo "usuario puede crear lugares <br />";
  }else {
    header('Location: index.php');
  }
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Lugar</title>
    <!-- <meta name="description" content="Source code generated using layoutit.com">
    <meta name="ElChitoSeLaCome" content="LayoutIt!"> -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="summernote/dist/summernote.css">
    <style type="text/css">
      body {
        padding-top: 0px;
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
    <!-- include summernote -->



  </head>
  <body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php include 'navbar.php'; ?>
      </div>
    </div>
    <div class="container-fluid">

      <?php
        $lugar = $_GET['lugar'];
        //echo "$lugar";
        include 'tabla_lugar.php';
       ?>
       <div class="row">

      <div class="col-md-5">


       <div id="myCarousel" class="carousel slide" data-ride="carousel">
         <!-- Indicators -->
         <ol class="carousel-indicators">
           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
           <li data-target="#myCarousel" data-slide-to="1"></li>
           <li data-target="#myCarousel" data-slide-to="2"></li>
           <li data-target="#myCarousel" data-slide-to="3"></li>
         </ol>

         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
           <div class="item active">
             <img src="img/pataguas/01.jpeg" alt="">
           </div>

           <div class="item">
             <img src="img/pataguas/02.jpeg" alt="">
           </div>

           <div class="item">
             <img src="img/pataguas/03.jpeg" alt="">
           </div>

           <div class="item">
             <img src="img/pataguas/04.jpeg" alt="">
           </div>
         </div>

         <!-- Left and right controls -->
         <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
         </a>
       </div>
      <div class="alert-info text-right">
        Visitas <span class="badge">42</span>
        Calificacion <span class="badge">4,2</span>
      </div>
      <div class="text-right">
        <div class="lead evaluation">
            <div id="colorstar" class="starrr ratable" ></div>
            <span id="count">0</span> star(s) - <span id="meaning"> </span>
                <div class="indicators" style="display:none">
                    <div id='textwr'>What went wrong?</div>
                    <input id="rate[]" name="rate[]" type="text" placeholder="" class="form-control input-md" style="display:none;">
                    <input id="rating[]" name="rating[]" type="text" placeholder="" class="form-control input-md rateval" style="display:none;">
                    <span class="button-checkbox">
                    <button type="button" class="btn criteria" data-color="info">Punctuallity</button>
                     <input type="checkbox" class="hidden"  />
                    </span>
                    <span class="button-checkbox">
                    <button type="button" class="btn criteria" data-color="info">Assistance</button>
                     <input type="checkbox" class="hidden"  />
                    </span>
                    <span class="button-checkbox">
                    <button type="button" class="btn criteria" data-color="info">Knowledge</button>
                     <input type="checkbox" class="hidden"  />
                    </span>
                </div>
    	</div>
			</div>
      </div>

       <?php
        echo '
        <div class="col-md-3">'.base64_decode($datoslugar["L_DESCRIPCION"]).'</div>
        <div class="col-md-3"><h3 style="margin: 5px 0px; padding: 0px;"><strong>Servicios</strong></h3>';
        include 'tabla_servicios.php';
        echo '</div>';
          echo '<div class="col-md-3"><h3 style="margin: 5px 0px; padding: 0px;"><strong>Ubicacion</strong></h3>';
          //$destino = "-30.0307856,-70.6688829";
          //$destino = str_replace(" ", "+", $destino);
          //echo "$destino";
          $u_actual = $_SESSION['ubicacion'];
          //echo $datoslugar["L_LATITUD"];
          //echo $datoslugar["L_LONGITUD"];
          echo '
          <a href="https://www.google.com/maps/dir/'.$u_actual['lat'].','.$u_actual['lon'].'/'.$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'">
          <img src="https://maps.googleapis.com/maps/api/staticmap?center=
          '.$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&markers=color:red%7Clabel:C%7C'
          .$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&zoom=15&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';
          echo '</div>';

       ?>
      </div>
      <div class="row">
        <div class="col-md-5">.col-md-5</div>
      </div>

    </div>
    <div class="container">
      <?php //include 'tabla_servicios.php'; ?>
    </div>
  </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/califica.js"></script>
    <!-- include summernote -->
    <script type="text/javascript" src="summernote/dist/summernote.js"></script>
    <!-- <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> -->
    <script type="text/javascript">

    $(document).ready(function() {
      $('#summernote').summernote({
        height: "500px"
      });
    });
    var postForm = function() {
      var content = $('textarea[name="content"]').php($('#summernote').code());
    }

    </script>

  </body>
</html>
