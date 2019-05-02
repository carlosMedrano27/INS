<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Cod'];
  $barra= $_POST ['codigo'];
  $precio= $_POST ['precio'];

  $query="UPDATE ofertas SET CodigoBarra='$barra',Oferta='$precio' WHERE CodOferta ='$Codigo'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MOferta.php");

  }
else {
  echo "no se modifico";
}
 ?>
