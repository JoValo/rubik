<?php 
//CONSULTA SQL QUE SIRVE PARA EL MÓDULO DE DELETE, DICHO MÓDULO MANDA A LLAMAR ESTA CONSULTA PARA ELIMINAR LA SECCIÓN 
//QUE SE DESEE ELIMINAR.
include 'connection.php';
$id = $_POST['bookId'];
$section = $_POST['section'];

$stid = oci_parse($con, "SELECT * FROM $section");
oci_execute($stid, OCI_DESCRIBE_ONLY); 
$ncols = oci_num_fields($stid);
$column_name  = oci_field_name($stid, 1);

if ($id == ' ') {
	echo "nada";
}else { 
$query = "DELETE FROM $section where $column_name =  $id";
$res = ociparse($con,$query);
oci_execute($res);
}


 ?>