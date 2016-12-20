<html>
<head></head>
<body>
  <?php if (!isset($_POST['Start'])): ?>

    <form action="ejemplo.php" method="post">
      <input type="hidden" id="latitude" name="latitude" value="" />
      <input type="hidden" id="longitude" name="longitude" value="" />
      <input type="submit" value="Start" name="Start"/>
    </form>
  <?php else:
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    echo "Latitude:".$latitude."</br>";
    echo "longitude:".$longitude;
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

        $('#latitude').val(lat);
        $('#longitude').val(longi);
    }
    getLocation();
</script>
</html>
