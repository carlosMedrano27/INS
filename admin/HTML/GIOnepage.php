<?php
include("conexion.php");
$Codigo=$_REQUEST['Cod'];
$img= addslashes (file_get_contents($_FILES['img']['tmp_name']));

  $query="UPDATE onepage SET Imagen='$img' WHERE Codigo ='$Codigo'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MOnepage.php");

  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>