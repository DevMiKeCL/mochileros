// Empty JS for your own code to be here
function validar(e) { // 1
tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s]/; // 4
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

var x = document.getElementById("ubicacion");
function myUbicacion() {
        navigator.geolocation.getCurrentPosition(showPosition);
}
function showPosition(position) {
    x.innerHTML = "Latitud: " + position.coords.latitude +
                  "<br>Longitud: " + position.coords.longitude;
}
