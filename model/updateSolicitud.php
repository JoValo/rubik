<?php
include "connection.php";

$id 			        =$_POST['id'];
$fecha_pedido			=$_POST['fecha_pedido'];
$descripcion	 	  =$_POST['descripcion'];
$cantidad		      =$_POST['cantidad'];

echo $fecha_pedido;
echo $descripcion;
echo $cantidad;
if (empty($fecha_pedido) || empty($descripcion) || empty($cantidad)) {
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}else{ 


$query = "UPDATE solicitudes set FECHA_PEDIDO = '$fecha_pedido', DESCRIPCION = '$descripcion', CANTIDAD = $cantidad where id_solicitud = $id";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);
//echo $query;

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
}
?>