<?php
    session_start();
    if (isset($_SESSION['user'])) {
      session_destroy();
      sleep(1);
      header('Location: index.php');
    } else {
      echo "nada que hacer";
    }
 ?>
