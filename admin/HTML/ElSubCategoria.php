<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo'];

  $query="DELETE FROM subcategorias WHERE Id ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MSubcategoria.php");

  }
else {
  echo "no se elimino";
}
 ?>
