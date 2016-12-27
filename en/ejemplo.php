<html>
<head></head>
<body>
  <?php if (!isset($_POST['Start'])): ?>

    <form action="ejemplo.php" method="post">
      <input type="hidden" id="latitude" name="latitude" value="" />
      <input type="hidden" id="longitude" name="longitude" value="" />
      <input type="hidden" id="accuracy" name="accuracy" value="" />
      <input type="submit" value="Start" name="Start"/>
    </form>
  <?php else:
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $accuracy = $_POST["accuracy"];
    if ($latitude != "") {
      echo "Latitude:".$latitude."</br>";
      echo "longitude:".$longitude."</br>";
      echo "Exactitud:".$accuracy."</br>";
      var_dump($latitude);
      echo "<br />";
      var_dump($longitude);
      echo "<br />";

      echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$latitude.
      ','.$longitude.'&markers=color:red%7Clabel:C%7C'.$latitude.','.$longitude.
      '&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
    } else {
      echo "no existen datos de ubicacion! revisa si tienes activado el gps de tu dispositivo";
    }

    //echo '<a href="https://www.google.com/maps/dir/'.$latitude.','.$longitude.'/San+Martin+1138,+coquimbo,+region+de+coquimbo">
    //<img src="https://maps.googleapis.com/maps/api/staticmap?
    //center=San+Martin+1138,+coquimbo,+region+de+coquimbo&markers=color:blue%7Clabel:C%7CSan+Martin+1138,+coquimbo,
    //+region+de+coquimbo&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo"></a>';
     ?>

  <?php endif; ?>

</body>
<!-- include jquery -->
<script src="js/jquery.min.js"></script>
<!-- include scripts -->
<script src="js/scripts.js"></script>
</html>
