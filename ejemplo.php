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
    echo "Latitude:".$latitude."</br>";
    echo "longitude:".$longitude."</br>";
    echo "Exactitud:".$accuracy."</br>";
    echo '<img src="https://maps.googleapis.com/maps/api/staticmap?center='.$latitude.','.$longitude.'&markers=color:red%7Clabel:C%7C'.$latitude.','.$longitude.'&zoom=17&size=300x300&key=AIzaSyCqcJU-uy_Clf9DD1DQ4ROyTEzQf-UWuLo">';
     ?>

  <?php endif; ?>



</body>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    function getLocation() {

         var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
         };

        function success(pos) {
           successFunction(pos);
        };

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error,options);
        } else {
            //x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function successFunction(position) {
       var lat = position.coords.latitude;
       var longi = position.coords.longitude;
       var acu = position.coords.accuracy;

        $('#latitude').val(lat);
        $('#longitude').val(longi);
        $('#accuracy').val(acu);
    }
    getLocation();
</script>
</html>
