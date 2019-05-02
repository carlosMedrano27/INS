<?php
include("conexion.php");
$t1=$_POST["texto1"];
$t2=$_POST["texto2"];
$t3=$_POST["texto3"];
$t4=$_POST["texto4"];
$Codigo=$_REQUEST['Cod'];

  $query="UPDATE carrusel SET Texto1='$t1',Texto2='$t2', Texto3='$t3',Texto4='$t4' WHERE Codigo ='$Codigo'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MCarrusel.php");

  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
