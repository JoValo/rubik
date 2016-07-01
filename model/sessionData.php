<?php 
//Consulta SQL que se manda a llamar en el dashboardMenu, si la sesión se inicio correctamente entonces se mandan a llamar
//todos los datos del empleado que acceso el sistema, para cargarlos en el sistema.
include 'connection.php'; //Se incluye la conexión a la base de datos
$user = $_SESSION['user'];
$stmt = oci_parse($con, "SELECT * FROM empleado WHERE nombre = '$user'"); //Consulta SQL para obtener los datos del empleado
oci_execute($stmt, OCI_DEFAULT);
$datos = oci_fetch_assoc($stmt);
$ID 	  			= $datos['ID_EMPLEADO'];
$NOMBRE  			= $datos['NOMBRE'];
$APELLIDO_PATERNO 	= $datos['A_PATERNO'];
$APELLIDO_MATERNO 	= $datos['A_MATERNO'];
$DIRECCION 			= $datos['DIRECCION'];
$TELEFONO 			= $datos['TELEFONO'];
$CARGO		 		= $datos['CARGO'];
$TIPO_EMPLEADO		= $datos['TIPO_EMPLEADO'];

 ?>