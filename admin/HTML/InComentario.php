<?php
  include ("conexion.php");
  $codigo= $_POST ['codigo'];
  $comentario= $_POST ['comentario'];
date_default_timezone_set('America/El_Salvador');
$hora = date("H:ia");
$meses = array("01","02","03","04","05","06","07","08","09","10","11","12");

$fecha= date('d')."/".$meses[date('n')-1]. "/".date('y');



  $query="INSERT INTO comentarios (Codigo,Comentario,Hora,Fecha,Aprobado) VALUES ('$codigo','$comentario','$hora','$fecha','NO')";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: Inicio.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
