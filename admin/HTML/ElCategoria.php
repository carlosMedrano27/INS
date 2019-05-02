<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];

  $query="DELETE FROM categorias WHERE Codigo ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MCategoria.php");

  }
else {
  echo "no se elimino";
}
 ?>
