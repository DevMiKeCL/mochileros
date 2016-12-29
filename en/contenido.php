<?php
  include 'session.php';
  // validamos si el usuario tiene permisos de cliente
  $ip = $_SERVER['REMOTE_ADDR'];

  if (isset($_POST['califica'])) {
    $rating = $_POST['rating'];
    $lugar = $_SESSION['lugar'];
    //echo "Cargando variables: <br />";
    //$loc = $_SESSION['ubicacion'];
    //var_dump($loc);
    //echo "<br />";
    //$usr = $_SESSION['user'];
    //var_dump($usr);
    //$lugar = $_SESSION['lugar'];
    include 'conexion.php';
    $sql = "SELECT * FROM `CALIFICACION` where `C_IP` = '$ip' AND `ID_LUGAR` = '$lugar' order by `C_FECHA` desc LIMIT 0, 1";
    //$sql2 = 'SELECT * FROM `UBICACION_ACTUAL` where `ID_USUARIO` = '.$usr['id'].' order by `UB_FECHA` desc LIMIT 0, 1';
    //echo "<br />";
    //echo "$sql";
    $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fcalifica = $row["C_FECHA"];
        //echo "Fecha y hora de la última calificacion: $fcalifica";
        //calculamos la fecha y hora actual del servidor apache
        $fecha = date("Y-m-d H:i:s");
        $nuevafecha = strtotime ( '-3 hour' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-j H:i:s' , $nuevafecha );
        //echo "<br />";
        //echo "Fecha y hora de la calificacion: ";
        //echo $nuevafecha;
        //echo "<br />";
        // calcular la diferencia de hora actual con la hora de la visita
        $minutos = ceil((strtotime($nuevafecha) - strtotime($fcalifica)) /60 );
        //echo 'Tienes '.$minutos.' minuto(s) de diferencia';
        //echo "<br />";
        if ($minutos > 60) {
          //echo "Es hora de cargar una nueva calificacion";
          $sqlr ="INSERT INTO `CALIFICACION`(`C_IP`, `ID_LUGAR`, `C_VALOR`) VALUES ('$ip','$lugar','$rating')";
          //echo "$sqlr";
          //echo "<br />";
          $conn->query($sqlr);
        }else {
          echo "La proxima calificacion sera en 1 hora";
        }

      } else {
        //echo "<br />";
        //echo "primera calificacion";
        //echo "<br />";
        $sqlr ="INSERT INTO `CALIFICACION`(`C_IP`, `ID_LUGAR`, `C_VALOR`) VALUES ('$ip','$lugar','$rating')";
        //echo "$sqlr";
        //echo "<br />";
        $conn->query($sqlr);
      }
    $conn->close();
  }
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
    <link rel="stylesheet" href="summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="css/ratingstar.css" />
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
  </div>
  <div class="container-fluid">
      <?php
        $lugar = $_GET['lugar'];
        $_SESSION['lugar'] = $lugar;
        //echo "$lugar";
        include 'tabla_lugar.php';
       ?>
       <div class="row">
         <div class="col-md-5">
           <div class=""><h2>
             <?php echo $datoslugar["L_NOMBRE"]; ?></h2>
           </div>
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
           <div class="alert-info text-center">
             Visits <span class="badge"><?php include 'mod_visita.php' ?></span>
             Rating <span class="badge"><?php include 'mod_promedio.php' ?></span>
           </div>
           <div class="col-md-5 col-xs-5">

           </div>
           <?php include 'mod_califica.php' ?>

         </div>
       <?php
        echo '
        <div class="col-md-3">'.base64_decode($datoslugar["L_DESCRIPCION"]).'</div>
        <div class="col-md-3"><h3 style="margin: 5px 0px; padding: 0px;"><strong>Services</strong></h3>';
        include 'tabla_servicios.php';
        echo '</div>';
          echo '<div class="col-md-2"><h3 style="margin: 5px 0px; padding: 0px;"><strong>Location</strong></h3>';
          //$destino = "-30.0307856,-70.6688829";
          //$destino = str_replace(" ", "+", $destino);
          //echo "$destino";

          //echo $datoslugar["L_LATITUD"];
          //echo $datoslugar["L_LONGITUD"];
          if (isset($_SESSION['user'])) {
            $u_actual = $_SESSION['ubicacion'];
            echo '
            <a href="https://www.google.com/maps/dir/'.$u_actual['lat'].','.$u_actual['lon'].'/'.$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'">
            <img src="https://maps.googleapis.com/maps/api/staticmap?center=
            '.$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&markers=color:red%7Clabel:C%7C'
            .$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&zoom=15&size=230x230&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';
            echo '<div class="row">Haz Click en la imagen para ver como llegar!</div>

            ';
          } else {
            echo '
            <img src="https://maps.googleapis.com/maps/api/staticmap?center=
            '.$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&markers=color:red%7Clabel:C%7C'
            .$datoslugar["L_LATITUD"].','.$datoslugar["L_LONGITUD"].'&zoom=15&size=230x230&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';

          }
          echo'</div>';

       ?>
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
