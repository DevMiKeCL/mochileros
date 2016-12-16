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
      echo "<h3>Lista</h3>";
      $j = 0;
      foreach ($recepcion as $serv) {
        if (isset($serv)) {
          //echo "hay contenido";
          //echo "<br />";
          $recepcion2[$j] = $serv;
          $j++;
          //echo "imprime j $j <br />";
        }else {
          echo "no hay contenido <br />";
        }
        echo "$serv <br />";
      }

      echo "<h3>var_dump final</h3>";
      var_dump($recepcion2);
      $valores = '1';
      if (count($recepcion2) > 1) {
        $i = 0;
        $str = $recepcion2[$i];
        for ($i=1; $i < count($recepcion2) ; $i++) {
          $str = $str.'`, `'.$recepcion2[$i];
          $valores = $valores. "', '1";
          echo "imprime i $i <br />";
        }
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
