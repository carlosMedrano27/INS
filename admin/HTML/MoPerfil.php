<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['s'];
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));

  if ($img=="") {
    $query="UPDATE usuario SET Usuario='$usuario',Nombre='$nombre',Apellido='$apellido',Correo='$correo', Clave=AES_ENCRYPT('$clave','llave') WHERE Codigo ='$Codigo'";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: Inicio.php");

    }
  else {
      echo "no se inserto" . mysqli_error($conexion);
  }
  }
  elseif ($img!="") {
    $query="UPDATE usuario SET Usuario='$usuario',Nombre='$nombre',Apellido='$apellido',Img1='$img' ,Correo='$correo', Clave=AES_ENCRYPT('$clave','llave') WHERE Codigo ='$Codigo'";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: Inicio.php");

    }
  else {
      echo "no se inserto" . mysqli_error($conexion);
  }
} 


 ?>
