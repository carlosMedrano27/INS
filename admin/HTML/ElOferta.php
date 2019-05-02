<?php
  include ("conexion.php");
  $cod=$_REQUEST['Cod'];

  $query="DELETE FROM ofertas WHERE CodOferta ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MOferta.php");

  }
else {
  echo "no se elimino";
}
 ?>
