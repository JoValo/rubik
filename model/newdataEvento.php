<?php
include "connection.php";

$nombre_e		      =$_POST['nombre_e'];
$lugar_e	        =$_POST['lugar_e'];
$horario	        =$_POST['horario'];
$fecha            =$_POST['fecha'];
$direccion		    =$_POST['direccion'];
$id_cliente		    =$_POST['id_cliente'];
$fecha_ac         = date('Y/m/d');

echo $fecha;
echo $fecha_ac;
if (empty($nombre_e) || empty($lugar_e) || empty($horario) || empty($fecha) || $fecha < $fecha_ac || empty($direccion) || empty($id_cliente)){
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}else
{
$query = "INSERT INTO eventos (ID_EVENTO,NOMBRE_E,LUGAR_E,HORARIO,FECHA,DIRECCION,ID_CLIENTE) VALUES (1,'$nombre_e','$lugar_e','$horario','$fecha','$direccion',$id_cliente)";
//echo $query;
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
if ($fecha < $fecha_ac) {
?>
<div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Fecha expirada.
  </div>
<?php 
}
}
?>
