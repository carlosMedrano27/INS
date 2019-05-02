<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo_coment'];

  $query="DELETE FROM comentarios WHERE Codigo_coment ='$cod'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: Inicio.php");

  }
else {
  echo "no se modifico";
}
 ?>
