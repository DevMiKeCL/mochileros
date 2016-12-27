<?php
  include 'session.php';
  // validamos si el usuario tiene permisos de cliente
  if (isset($_SESSION['user'])) {
    $usr = $_SESSION['user'];
    $lugar = $_SESSION['lugar'];

    //var_dump($usr);
    //var_dump($lugar);
    //echo "<br />id tipo de usuario: ";
    //echo $usr['ID_TUSUARIO'];
    //echo "usuario puede crear lugares <br />";
  }else {
    header('Location: index.php');
  }

  if (isset($_POST['califica'])) {
    $rating = $_POST['rating'];
    $sqlr ="INSERT INTO `CALIFICACION`(`ID_USUARIO`, `ID_LUGAR`, `C_VALOR`) VALUES ('$usr[ID_USUARIO]','$lugar','$rating')";
    echo "$sqlr";
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
    <div class="container-fluid">

      <?php
        $lugar = 1;
        //echo "$lugar";

       ?>
      <div class="row">
        <div class="alert-info col-md-5 text-center">
          Visitas <span class="badge">42</span>
          Calificacion <span class="badge">4,2</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
        </div>
          <div class="col-md-3">
            <form action="califica.php" method="post">
              <fieldset>
                <span class="star-cb-group">
                  <input type="radio" id="rating-5" name="rating" value="5" /><label for="rating-5">5</label>
                  <input type="radio" id="rating-4" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
                  <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                  <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                  <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                  </span>
              </fieldset>

          </div>
      </div>
      <div class="row">
        <div class="col-md-5 text-center">
          <button class="btn btn-primary btn-xs" type="submit" name="califica">Calificar</button></div>
          </form>
        </div>
      </div>

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
    var logID = 'log',
      log = $('<div id="'+logID+'"></div>');
    $('body').append(log);
      $('[type*="radio"]').change(function () {
        var me = $(this);
        log.html(me.attr('value'));
      });
    </script>

  </body>
</html>
