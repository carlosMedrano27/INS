<?php
  include ("conexion.php");
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $codigo=$_POST ["codigo"];
  $img= addslashes (file_get_contents($_FILES['img']['tmp_name']));


  $query="INSERT INTO usuario (Nivel,Codigo,Usuario,Clave,Nombre,Apellido,Correo,Img1) VALUES ('2','$codigo','$usuario',AES_ENCRYPT('$clave','llave'),'$nombre','$apellido','$correo','$img')";
  $resultado= $conexion->query($query);

  if ($resultado) {
    header("Location: Registro.php");
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
