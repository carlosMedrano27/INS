<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];

  $query="DELETE FROM usuario WHERE Codigo ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: UMostrar.php");

  }
else {
  echo "no se elimino";
}
 ?>
