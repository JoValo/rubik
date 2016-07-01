<?php
//La página de login.php es mandada a llamar por el login.php ubicado en la carpeta de back, este login comprueba si los
//datos del usuario que quiere acceder al sistema se encuentran en la base de datos, de no ser así este usuario no podrá
//acceder al sistema y se enviará un mensaje de error, el cual se manda a llamar del destino "back/index.php"
require_once 'connection.php';
$user = $_POST['user'];
$contraseña = $_POST['password'];
$stmt = oci_parse($con, "SELECT * FROM empleado WHERE nombre = '$user'");
oci_execute($stmt, OCI_DEFAULT);
$datos = oci_fetch_assoc($stmt);
if($user == $datos['NOMBRE'] && $contraseña == $datos['CONTRA'])
{
//Si los datos ingresados son de un ADMIN, entonces se inicia la sesión y se redirecciona a la interfaz de ADMIN
	session_start();
	$_SESSION['user']= $datos['NOMBRE'];
	if ($datos['TIPO_EMPLEADO'] == 'ADMIN') {
		header("Location:../back/index.php?admin=TRUE");
//Si los datos ingresados son de un EMPLEADO, entonces se redirecciona a la interfaz de EMPLEADO
	}else if($datos['TIPO_EMPLEADO'] == 'EMPLEADO'){
		header("Location:../back/index.php?empleado=TRUE");
	}
}else
{
	//Si no es así, entonces los datos son erróneos y se mandará el mensaje de error
		header("Location:../back/login.php?err=1");
}

?>
