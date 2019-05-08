<?php
  include ("conexion.php");
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $codigo=$_POST ["codigo"];
  $codPais=$_POST["cod_pais"];


  $query = "INSERT INTO Personas (Nombre, Apellido, Correo) VALUES ('$nombre','$apellido','$correo')";
  $resultado = $conexion->query($query);

  if ($resultado) {
    $result = mysql_query('SELECT CodPersona FROM Personas ORDER BY CodPersona DESC LIMIT 1');
    $row = mysql_fetch_array($result, MYSQL_FETCH_ASSOC);
    $persona = $row['CodPersona'];
    $query = "INSERT INTO Usuarios (Tipo,Usuario,Clave,CodPersona) VALUES (1,'$usuario',AES_ENCRYPT('$clave','llave'),'$persona')";
    $resultado= $conexion->query($query);
    if ($resultado) {
      header("Location: Registro.php");
    }else{
      echo "no se inserto" . mysqli_error($conexion);
    }
  }
else {
  echo "no se inserto" . mysqli_error($conexion);
}
 ?>
