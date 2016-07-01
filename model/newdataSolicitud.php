<?php
include "connection.php";

$fecha_pedido	      =date('Y-m-d');
$descripcion	    =$_POST['descripcion'];
$cantidad	    =$_POST['cantidad'];


if (empty($fecha_pedido) || empty($descripcion) || empty($cantidad)) {
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}else{ 


$query = "INSERT INTO solicitudes (ID_SOLICITUD,FECHA_PEDIDO,DESCRIPCION,CANTIDAD) VALUES (1,'$fecha_pedido','$descripcion',$cantidad)";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);
//echo $query;

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