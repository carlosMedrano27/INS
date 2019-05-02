<?php
$select=$_POST['select'];

if ($select=="Usuarios") {
	header("Location: UBitacora.php");
}

if ($select=="Productos") {
	header("Location: PBitacora.php");
}

if ($select=="Clientes") {
	header("Location: Bitacora.php");
}

if ($select=="Carrusel") {
	header("Location: CBitacora.php");
}

if ($select=="Onepage") {
	header( "Location: OBitacora.php");
}

if ($select=="Seleccionar Historial") {
	header( "Location: Bitacora.php");
}

?>
