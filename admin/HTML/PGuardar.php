<?php
  include ("conexion.php");
  $codigo= $_POST ['codigo'];
  $nombre= $_POST ['nombre'];
  $cantidad= $_POST ['cantidad'];
  $talla= $_POST ['talla'];
  $descripcion=$_POST['descripcion'];
  $genero= $_POST ['genero'];
  $categoria=$_POST ['categoria'];
  $precio= $_POST ['precio'];
  $subcat=$_POST['subcat'];
  $costo=$_POST['costo'];
  $img1= addslashes (file_get_contents($_FILES['img1']['tmp_name']));
  $img2= addslashes (file_get_contents($_FILES['img2']['tmp_name']));
  $img3= addslashes (file_get_contents($_FILES['img3']['tmp_name']));

  if ($talla=="S" OR $talla=="1" OR $talla="28") {
    $codbar=$codigo."1";
  }
  elseif ($talla=="M" OR $talla=="2" OR $talla="30") {
    $codbar=$codigo."2";
  }

  elseif ($talla=="L" OR $talla=="3" OR $talla="32") {
    $codbar=$codigo."3";
  }

  elseif ($talla=="XL" OR $talla=="4" OR $talla="34") {
    $codbar=$codigo."4";
  }
  elseif ($talla=="5" OR $talla="36") {
    $codbar=$codigo."5";
  }

  elseif ($talla=="6" OR $talla="38") {
    $codbar=$codigo."6";
  }

  elseif ($talla=="7" OR $talla="40") {
    $codbar=$codigo."7";
  }

elseif ($talla=="8" OR $talla="44") {
  $codbar=$codigo."8";
}

elseif ($talla=="9" ) {
  $codbar=$codigo."9";
}

elseif ($talla=="10") {
  $codbar=$codigo."10";
}
elseif ($talla=="11") {
  $codbar=$codigo."11";
}
    $query="INSERT INTO productos (CodigoBarra, Nombre, Descripcion, Categoria, Genero, Precio, Img1, Img2, Img3, Subcategoria,CodigoBarra2, Talla,Cantidad,Costo) VALUES ('$codigo','$nombre','$descripcion','$categoria','$genero','$precio','$img1','$img2','$img3','$subcat','$codbar','$talla','$cantidad','$costo')";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: InProducto.php");
    }
  else {
    echo "no se inserto" . mysqli_error($conexion);
  }

 ?>
