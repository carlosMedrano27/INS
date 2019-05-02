<?php
  include ("conexion.php");
  $cod=$_REQUEST['Codigo_coment'];

  $query="UPDATE comentarios SET Aprobado='SI'WHERE Codigo_coment ='$cod' AND Aprobado='NO'";
  $resultado= $conexion->query($query);
    if (mysqli_affected_rows($conexion) > 0)
{
  header("Location: Inicio.php");
}
else
{

  $query1="UPDATE comentarios SET Aprobado='NO'WHERE Codigo_coment ='$cod' AND Aprobado='SI'";
  $resultado= $conexion->query($query1);
    header("Location: Inicio.php");
}
 ?>
