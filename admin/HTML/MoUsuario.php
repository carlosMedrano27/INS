<?php
  include ("conexion.php");
  $Codigo=$_REQUEST['Codigo'];
  $CodPersona=$_REQUEST['CodPersona'];
  $nombre= $_POST ['nombre'];
  $apellido= $_POST ['apellido'];
  $correo=$_POST['correo'];
  $usuario= $_POST ['usuario'];
  $clave= $_POST ['clave'];

  if ($clave=="*********") {
    $query="UPDATE Personas SET Nombre='$nombre',Apellido='$apellido',Correo='$correo' WHERE CodPersona ='$CodPersona'";
    $resultado= $conexion->query($query);
    
    if ($resultado) {
      $query = "UPDATE Usuarios SET Usuario='$usuario' WHERE CodUsuario='$Codigo'";
      $resultado= $conexion->query($query);
      if ($resultado) {
        header("Location: UMostrar.php");
      }else  {
        echo'<script type="text/javascript">
        alert("Tarea No Guardada");
        window.location.href="UMostrar.php";
        </script>';
        }

    }
    else {
      echo'<script type="text/javascript">
        alert("Tarea No Guardada");
        window.location.href="UMostrar.php";
        </script>';
    }
  }
  else{
    $query="UPDATE Personas SET Nombre='$nombre',Apellido='$apellido',Correo='$correo' WHERE CodPersona ='$CodPersona'";
    $resultado= $conexion->query($query);
    
    
    if ($resultado) {
      $query = "UPDATE Usuarios SET Usuario='$usuario', Clave=MD5('$clave') WHERE CodUsuario='$Codigo'";
      $resultado= $conexion->query($query);
      if ($resultado) {
        header("Location: UMostrar.php");
      }else  {
        echo'<script type="text/javascript">
        alert("Usuario No Guardado");
        window.location.href="UMostrar.php";
        </script>';
        }

    }
    else {
      echo'<script type="text/javascript">
        alert("Persona No Guardada");
        window.location.href="UMostrar.php";
        </script>';
    }
  }
?>
