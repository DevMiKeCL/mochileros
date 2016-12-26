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
    <div class="container">
      <?php
        $lugar = $_GET['lugar'];
        //echo "$lugar";
        include 'tabla_lugar.php';

        echo '<div class="row">
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
        echo '</div>';

       ?>

    </div>
    <div class="container">
      <?php //include 'tabla_servicios.php'; ?>
    </div>
  </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
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
