<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));

  if ($img!=="" AND $clave=="*********") {
    $query="UPDATE usuario SET Usuario='$usuario',Nombre='$nombre',Apellido='$apellido',Correo='$correo', Img1='$img' WHERE Codigo ='$Codigo'";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: UMostrar.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img=="" AND $clave!=="*********") {
    $query2="UPDATE usuario SET Usuario='$usuario',Clave=AES_ENCRYPT('$clave','llave'),Nombre='$nombre',Apellido='$apellido',Correo='$correo' WHERE Codigo ='$Codigo'";
    $resultado2= $conexion->query($query2);

    if ($resultado2) {
      header("Location: UMostrar.php");

    }
  else {
    echo "no se modifico";
  }
  }
  elseif ($img=="" AND $clave=="*********") {
    $query2="UPDATE usuario SET Usuario='$usuario',Nombre='$nombre',Apellido='$apellido',Correo='$correo' WHERE Codigo ='$Codigo'";
    $resultado2= $conexion->query($query2);

    if ($resultado2) {
      header("Location: UMostrar.php");

    }
  else {
    echo "no se modifico";

  }
  }
  elseif ($img!=="" AND $clave!=="*********") {
    $query2="UPDATE usuario SET Usuario='$usuario',Clave=AES_ENCRYPT('$clave','llave'),Nombre='$nombre',Apellido='$apellido',Correo='$correo', Img1='$img' WHERE Codigo ='$Codigo'";
    $resultado2= $conexion->query($query2);

    if ($resultado2) {
      header("Location: UMostrar.php");

    }
  else {
    echo "no se modifico";
  }
  }
 ?>
