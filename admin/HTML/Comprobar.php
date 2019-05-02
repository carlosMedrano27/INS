<?php
$usu=$_POST["usu"];
$cla=$_POST["clave"];
include("conexion.php");
$result = mysqli_query($conexion,"SELECT * FROM usuario Where Clave= AES_ENCRYPT('$cla','llave')");
while($fila = mysqli_fetch_array($result))
	{
  if ($fila["Usuario"]==$usu)
		{
			session_start();
			$_SESSION["Usuario"] =$fila["Usuario"];
      $_SESSION["Codigo"] =$fila["Codigo"];
			$_SESSION["Clave"] =$fila["Clave"];
      $_SESSION["Nivel"] =$fila["Nivel"];
			$_SESSION["Img1"] =$fila["Img1"];
			header ("Location: Inicio.php");
			exit;
		}
	}
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}
?>
