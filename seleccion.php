<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Seleccion de servicio</title>
  </head>
  <body>
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
      $recepcion = $_POST['datos'];
      // conectamos a la base de datos
      include 'conexion.php';
      var_dump($recepcion);
      //echo "<hr />";
      //echo "<h3>Usted seleccionó:</h3>";

      //Creacion del sql string
      $i = 0;
      $str = $recepcion[$i];
      $valores = '1';
      for ($i=1; $i < count($recepcion) ; $i++) {
        //if ($recepcion[$i]!="") {
        //  $str = $recepcion[$i];
        //}else {
          $str = $str.'`, `'.$recepcion[$i];
          $valores = $valores. "', '1";
        //}

        //echo $recepcion[$i];
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
  </body>
</html>
