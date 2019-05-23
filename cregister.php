PHP
<?php
$db_host="tadesa.db.11949900.e77.hostedresource.net";
$db_user="tadesa";
$db_password="Ins01t@desa";
$db_name="tadesa";
$db_table_name0="Personas";
$db_table_name1="Usuarios";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_cel = utf8_decode($_POST['email']);
$subs_nit = utf8_decode($_POST['email']);
$subs_pais = utf8_decode($_POST['email']);
$subs_username = utf8_decode($_POST['email']);
$subs_pass = utf8_decode($_POST['email']);

$resultado=mysql_query("SELECT * FROM ".$db_table_name0." WHERE Email = '".$subs_email."'", $db_connection);

if (mysql_num_rows($resultado)>0)
{

echo '<script language="javascript">alert("Su correo ya esta registrado");</script>';
header('Location: register.php'); 

} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name0.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';

mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
echo '<script language="javascript">alert("Se registro exitosamente, inicie sesión por favor!");</script>'; 	
header('Location: contributions.php');
}

mysql_close($db_connection);
		
?>
