// Empty JS for your own code to be here
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-zÑñáéíóúÁÉÍÓÚ\s]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}

function numeros(nu) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
ppatron = /\d/; // Solo acepta números// 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}

function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

    var img = new Image();
    img.src = "https://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

    output.appendChild(img);
  }

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  }

  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});

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

$(document).ready(function() {
  $('#summernote').summernote({
    height: "500px"
  });
});
var postForm = function() {
  var content = $('textarea[name="content"]').html($('#summernote').code());
}
