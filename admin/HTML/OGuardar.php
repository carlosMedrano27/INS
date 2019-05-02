<?php
  include ("conexion.php");
  $codigo= $_POST ['codigo'];
  $precio= $_POST ['precio'];


  $query="INSERT INTO ofertas (CodigoBarra, Oferta ) VALUES ('$codigo','$precio')";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: InOferta.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
