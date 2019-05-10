<?php
  include ("conexion.php");
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];
  $nit= $_POST['nit'];
  $telefono=$_POST ["telefono"];
  $codPais=$_POST["Pais"];


  $query = "INSERT INTO Personas (Nombre, Apellido, Correo,Nit,Telefono,CodPais) VALUES ('$nombre','$apellido','$correo','$nit','$telefono','$codPais')";
  $resultado = $conexion->query($query);

  if ($resultado) {
    $query="SELECT CodPersona  FROM Personas Order by CodPersona desc limit 1";
    $resultado= $conexion->query($query);
    while ($row = $resultado->fetch_assoc()){
      $persona = $row['CodPersona'];
      $query = "INSERT INTO Usuarios (Tipo,Usuario,Clave,CodPersona) VALUES (1,'$usuario',MD5('$clave'),'$persona')";
      $resultado= $conexion->query($query);
      if ($resultado) {
        header("Location: UMostrar.php?status=success");
      }else{
        header("Location: UMostrar.php?status=error");
      }
    }
  }
  else {
    header("Location: UMostrar.php?status=error");
  }
?>
