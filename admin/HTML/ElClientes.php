<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];

  $query="DELETE FROM clientes WHERE Codigo ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: CMostrar.php");

  }
else {
  echo "no se modifico";
}
 ?>
