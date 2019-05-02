<?php
  include ("conexion.php");
  $categoria= $_POST ['categoria'];
  $genero= $_POST ['genero'];
  $subcat= $_POST ['subcat'];


  $query="INSERT INTO subcategorias (Nombre,Categoria,Genero) VALUES ('$subcat','$categoria','$genero')";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: InSubcategoria.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
