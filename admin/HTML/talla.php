<?php
require("conexion.php");
$sub = mysqli_real_escape_string($conexion, $_POST["Subcat"]);

if ($sub=="Zapatos") {
	$query = "SELECT * FROM tallas WHERE id >'4' AND  id<'16'";
	$result = mysqli_query($conexion, $query);
	while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
	{
		echo '<option value="' .$row["Talla"]. '">' .$row["Talla"]. '</option>';
	}
	mysqli_close($conexion);
}
elseif ($sub=="Pantalones" OR $sub=="Shorts") {
	$query3 = "SELECT * FROM tallas WHERE id >'15' ";
	$result3 = mysqli_query($conexion, $query3);
	while($row3 = mysqli_fetch_array($result3, MYSQL_ASSOC))
	{
		echo '<option value="' .$row3["Talla"]. '">' .$row3["Talla"]. '</option>';
	}
	mysqli_close($conexion);
}
else {
	$query2 = "SELECT * FROM tallas WHERE id <'5' ";
	$result2 = mysqli_query($conexion, $query2);
	while($row2 = mysqli_fetch_array($result2, MYSQL_ASSOC))
	{
		echo '<option value="' .$row2["Talla"]. '">' .$row2["Talla"]. '</option>';
	}
	mysqli_close($conexion);
}
?>
