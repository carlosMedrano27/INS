<?php
  include ("conexion.php");
  $codigo=$_REQUEST['Codigo'];
  $nombre= $_POST ['categoria'];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));
  $genero= $_POST ['genero'];

  if ($img!=="") {

    $query2="UPDATE categorias SET Imagen='$img' WHERE Codigo='$codigo'";
    $resultado2= $conexion->query($query2);

    if ($resultado2) {
      header("Location: MCategoria.php");
    }
  else {
    echo "no se inserto" . mysqli_error($conexion);
  }
  }
 ?>
