<?php
  $str = "Mary Had A Little Lamb and She LOVED It So";
  $str = strtoupper($str);
  echo $str; // muestra: MARY HAD A LITTLE LAMB AND SHE LOVED IT SO
  $str = str_replace(" ", "", $str);
  echo $str;
?>
