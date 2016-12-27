<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
       <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
    </button><a class="navbar-brand" href="index.php">MOCHILEROS</a>
  </div>

  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active">
        <a href="#">Acerca de</a>
      </li>
      <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorias<strong class="caret"></strong></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#">Cámpines</a>
          </li>
          <li>
            <a href="#">Restaurantes</a>
          </li>
          <li>
            <a href="#">Locomoción</a>
          </li>
          <li>
            <a href="#">Sitios de Interes</a>
          </li>
          <!-- <li class="divider">
          </li>
          <li>
            <a href="#">One more separated link</a>
          </li> -->
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input placeholder="Busca tu sitio"type="text" class="form-control">
      </div>
      <button type="submit" class="btn btn-default">
        Buscar
      </button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="index.html"> <img class="flag" src="img/Chile.png"> </a>
      </li>
      <li>
        <a href="index.html"> <img class="flag" src="img/United States.png"> </a>
      </li>
      <!-- <li>
        <a href="index.html"> <img class="flag" src="img/Brazil.png"> </a>
      </li> -->
      <?php if (isset($_SESSION['user'])):
        $user = $_SESSION['user'];
        echo '<li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hola '.$user['U_NOMBRE'].'<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
            <li class="divider">
            </li>';
            if ($user['ID_TUSUARIO'] == 2) {
              echo '<li>
                <a href="addplace.php">Crear Lugar</a>
              </li>';
            }
            echo '<li>
              <a href="close.php">Cerrar sesion</a>
            </li></ul>';
        ?>

      <?php else:
        echo '
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingresa/Registrate<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
            <form action="index.php" method="post">
              <li>
                <input type="hidden" id="latitude" name="geo[lat]" value="" />
                <input type="hidden" id="longitude" name="geo[lon]" value="" />
                <input type="hidden" id="accuracy" name="geo[acu]" value="" />
                <input type="email" class="form-control" placeholder="correo electronico" name="usuario[email]" required>
              </li>
              <li>
                <input type="password" class="form-control" placeholder="Contraseña" name="usuario[pass]" required>
              </li>
              <li>
                <button class="btn btn-primary btn-block" type="submit" id="iniciar" name="iniciar">
                  Aceptar
                </button>
            </form>
                <!-- <button type="submit" class="btn btn-default">
                  Cancelar
                </button> -->
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="adduser.php">Registro Usuarios Nuevos</a>
              </li>
              <li class="divider">
              </li>
              <li>
                <a href="#">Ingreso Administrador</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>';
        ?>

      <?php endif; ?>


</nav>
