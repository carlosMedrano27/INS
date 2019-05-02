<?php
require("conexion.php");

$gen = $_POST["Genero"];
$cat = $_POST["Categoria"];
$query = "SELECT * FROM subcategorias WHERE Categoria = '$cat' AND Genero='$gen' ORDER BY Nombre ASC";
$result = mysqli_query($conexion, $query);
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
	echo '<option value="' .$row["Nombre"]. '">' .$row["Nombre"]. '</option>';
}
mysqli_close($con);
?>
