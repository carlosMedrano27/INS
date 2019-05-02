<?php
  include ("conexion.php");
  $codigo=$_REQUEST['Codigo'];
  $categoria= $_POST ['categoria'];
  $genero= $_POST ['genero'];
  $subcat= $_POST ['subcat'];


  $query="UPDATE subcategorias SET Nombre='$subcat',Categoria='$categoria',Genero='$genero' WHERE Id ='$codigo'";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: MSubcategoria.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
