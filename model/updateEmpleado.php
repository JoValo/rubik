<?php
include "connection.php";
//DECLARACION DE VARIABLES QUE OBTIENEN LOS DATOS DEL FORMULARIO
$id 			=$_POST['id'];
$nombre			=$_POST['nombre'];
$a_paterno		=$_POST['a_paterno'];
$a_materno		=$_POST['a_materno'];
$sexo			=$_POST['sexo'];
$direccion		=$_POST['direccion'];
$telefono		=$_POST['telefono'];
$cargo			=$_POST['cargo'];
$tipo_empleado	=$_POST['tipo_empleado'];
$contra			=$_POST['contra'];

//CONDICIÓN QUE VERIFICA SI ALGÚN CAMPO ESTA VACÍO, EL SISTEMA ENVÍARA UN MENSAJE DE ERROR
if (empty($nombre) || empty($a_paterno) || empty($a_materno) || empty($sexo) || empty($direccion) || empty($telefono) || empty($cargo) || empty($tipo_empleado) || empty($contra)) {
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}else{ 

//CONSULTA SQL PARA LA ACTUALIZACIÓN DE DATOS EN LA TABLA EMPLEADO
$query = "UPDATE empleado set NOMBRE = '$nombre', A_PATERNO = '$a_paterno', A_MATERNO = '$a_materno', SEXO = '$sexo',DIRECCION = '$direccion',TELEFONO = $telefono, CARGO = '$cargo', TIPO_EMPLEADO = '$tipo_empleado', CONTRA = '$contra' where id_empleado = $id";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);

//CONDICIÓN QUE VERIFICA LOS DATOS, SI LOS DATOS SON CORRECTOS SE ENVIARA MENSAJE DE DATOS CORRECTOS
if(!oci_error($res)){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Listo!</strong> Los datos se han actualizado correctamente.

</div>
<?php
//SI LOS DATOS SON INCORRECTOS, SE ENVIARÁ EL MENSAJE DE ALGÚN  DATO INCORRECTO Y EL SISTEMA NO PERMITIRA LA ACTUALIZACIÓN DE DATOS.
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Algun dato ingresado fue erroneo.
</div>
<?php
}
}
?>