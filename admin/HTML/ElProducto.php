<?php
  include ("conexion.php");
  $cod=$_REQUEST['CodigoBarra'];

  $query="DELETE FROM productos WHERE CodigoBarra ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MProducto.php");

  }
else {
  echo "no se elimino";
}
 ?>
