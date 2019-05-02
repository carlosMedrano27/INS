<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['CodigoBarra'];
  $nombre= $_POST ['nombre'];
  $descripcion=$_POST['descripcion'];
  $genero= $_POST ['genero'];
  $categoria=$_POST ['categoria'];
  $subcat=$_POST ['subcat'];
  $precio= $_POST ['precio'];
  $cantidad= $_POST ['cantidad'];
  $img1= addslashes (file_get_contents($_FILES['img1']['tmp_name']));
  $img2= addslashes (file_get_contents($_FILES['img2']['tmp_name']));
  $img3= addslashes (file_get_contents($_FILES['img3']['tmp_name']));

  if ($img1=="" AND $img2=="" AND $img3=="") {
    $query1="UPDATE productos SET Cantidad='$cantidad',Nombre='$nombre', Subcategoria='$subcat',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio' WHERE CodigoBarra ='$Codigo'";
    $resultado1= $conexion->query($query1);

    if ($resultado1) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img1!=="" and $img2=="" AND $img3=="") {
    $query2="UPDATE productos SET Cantidad='$cantidad',Nombre='$nombre',Subcategoria='$subcat',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img1='$img1' WHERE CodigoBarra ='$Codigo'";
    $resultado2= $conexion->query($query2);

    if ($resultado2) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img1!=="" AND $img2!=="" AND $img3=="") {
    $query3="UPDATE productos SET Cantidad='$cantidad',Nombre='$nombre',Subcategoria='$subcat',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img1='$img1', Img2='$img2' WHERE CodigoBarra ='$Codigo'";
    $resultado3= $conexion->query($query3);

    if ($resultado3) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img1!=="" AND $img3!=="" AND $img2=="") {
    $query4="UPDATE productos SET Cantidad='$cantidad',Nombre='$nombre',Subcategoria='$subcat',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img1='$img1', Img3='$img3' WHERE CodigoBarra ='$Codigo'";
    $resultado4= $conexion->query($query4);

    if ($resultado4) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img2!=="" AND $img1=="" AND $img3=="") {
    $query5="UPDATE productos SET Nombre='$nombre',Cantidad='$cantidad',Subcategoria='$subcat',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio',Img2='$img2' WHERE CodigoBarra ='$Codigo'";
    $resultado5= $conexion->query($query5);

    if ($resultado5) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img2!=="" AND $img3!=="" AND $img1=="") {
    $query6="UPDATE productos SET Nombre='$nombre',Subcategoria='$subcat',Cantidad='$cantidad',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img2='$img2', Img3='$img3' WHERE CodigoBarra ='$Codigo'";
    $resultado6= $conexion->query($query6);

    if ($resultado6) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img3!=="" AND $img1=="" AND $img2=="") {
    $query7="UPDATE productos SET Nombre='$nombre',Subcategoria='$subcat',Cantidad='$cantidad',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img3='$img3' WHERE CodigoBarra ='$Codigo'";
    $resultado7= $conexion->query($query7);

    if ($resultado7) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img1!=="" AND $img2!=="" AND $img3!=="") {
    $query8="UPDATE productos SET Nombre='$nombre',Subcategoria='$subcat',Cantidad='$cantidad',Descripcion='$descripcion',Genero='$genero',Categoria='$categoria',Precio='$precio', Img1='$img1', Img2='$img2', Img3='$img3' WHERE CodigoBarra ='$Codigo'";
    $resultado8= $conexion->query($query8);

    if ($resultado8) {
      header("Location: MProducto.php");

    }
  else {
    echo "no se modifico";
  }
  }
 ?>
