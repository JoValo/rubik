
<?php
include "connection.php";

$nombre_c		  =$_POST['nombre_c'];
$a_paterno		=$_POST['a_paterno'];
$a_materno		=$_POST['a_materno'];
$sexo			    =$_POST['sexo'];
$direccion    =$_POST['direccion'];
$telefono_c   =$_POST['telefono_c'];


if (empty($nombre_c) || empty($a_paterno) || empty($a_materno) || empty($sexo) || empty($direccion) || empty($telefono_c)){
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}

else
{
$query = "INSERT INTO clientes VALUES (1,'$nombre_c','$a_paterno','$a_materno', '$sexo','$direccion','$telefono_c')";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);



if(!oci_error($res)){
?>
<div class="col-xs-12 alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Listo!</strong> Los datos se han insertado correctamente.

</div>
<?php
} else{
?>
<div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Algun dato ingresado fue erroneo.
</div>
<?php
}
}
?>