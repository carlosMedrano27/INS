<?php
include("conexion.php");
$t1=$_POST["texto1"];
$t2=$_POST["texto2"];
$t3=$_POST["texto3"];
$Codigo=$_REQUEST['Cod'];

  $query="UPDATE onepage SET Texto1='$t1',Texto2='$t2', Texto3='$t3' WHERE Codigo ='$Codigo'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MOnepage.php");

  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
