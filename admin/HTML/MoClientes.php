<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $telefono=$_POST["telefono"];
  $direccion=$_POST["direccion"];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));

  if ($img=="") {
    $query="UPDATE clientes SET Usuario='$usuario',Clave=AES_ENCRYPT('$clave','llave'),Nombre='$nombre',Apellido='$apellido',Correo='$correo',Telefono='$telefono',Direccion='$direccion' WHERE Codigo ='$Codigo'";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: ReClientes.php");
    }
  else {
    echo "no se inserto" . mysqli_error($conexion);
  }
  }
  elseif ($img!="") {
    $query="UPDATE clientes SET Usuario='$usuario',Clave=AES_ENCRYPT('$clave','llave'),Nombre='$nombre',Apellido='$apellido',Correo='$correo',Telefono='$telefono',Direccion='$direccion',Img='$img' WHERE Codigo ='$Codigo'";
    $resultado= $conexion->query($query);

    if ($resultado) {
      header("Location: ReClientes.php");
    }
  else {
    echo "no se inserto" . mysqli_error($conexion);
  }
  }
 ?>
