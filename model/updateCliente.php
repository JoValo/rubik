
<?php
include "connection.php";

$id 			=$_POST['id'];
$nombre_c		=$_POST['nombre_c'];
$a_paterno		=$_POST['a_paterno'];
$a_materno		=$_POST['a_materno'];
$sexo			=$_POST['sexo'];
$direccion		=$_POST['direccion'];
$telefono_c		=$_POST['telefono_c'];


$query = "UPDATE  clientes set NOMBRE_C = '$nombre_c' , A_PATERNO = '$a_paterno', A_MATERNO = '$a_materno',SEXO = '$sexo',DIRECCION = '$direccion',TELEFONO_C = '$telefono_c' where id_cliente = $id";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);


if(!oci_error($res)){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Listo!</strong> Los datos se han actualizado correctamente.

</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Algun dato ingresado fue erroneo.
</div>
<?php
}
?>