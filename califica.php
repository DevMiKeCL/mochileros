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
  if (isset($_POST['confirmar'])) {
    $rate = $_POST['rate'];
    $rating = $_POST['rating'];
    var_dump($rate);
    var_dump($rating);

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
        $lugar = 1;
        //echo "$lugar";

       ?>
       <div class="row">

      <div class="col-md-5">
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
                    <form class="" action="califica.php" method="post">
                      <input id="contador" name="rate[]" type="text" placeholder="" class="form-control input-md" style="display:none;">
                      <?php  ?>
                      <input id="rating[]" name="rating[]" type="text" placeholder="" class="form-control input-md rateval" style="display:none;">
                      <span class="button">
                      <button type="submit" class="btn" name="confirmar">confirmar</button>
                      </span>
                    </form>
                </div>

    	</div>
			</div>
      </div>


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
