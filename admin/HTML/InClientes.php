<?php
  include ("conexion.php");
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $codigo=$_POST ["codigo"];
  $telefono=$_POST["telefono"];
  $direccion=$_POST["direccion"];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));


  $query="INSERT INTO clientes (Codigo,Usuario,Clave,Nombre,Apellido,Correo,Telefono,Direccion,Img) VALUES ('$codigo','$usuario',AES_ENCRYPT('$clave','llave'),'$nombre','$apellido','$correo','$telefono','$direccion','$img')";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: ReClientes.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
