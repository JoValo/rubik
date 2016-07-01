<?php
include "connection.php";

$id 			=$_POST['id'];
$nombre			=$_POST['nombre'];
$lugar   		=$_POST['lugar'];
$horario		=$_POST['horario'];
$fecha			=$_POST['fecha'];
$direccion		=$_POST['direccion'];
$id_cliente		=$_POST['id_cliente'];

echo $id;
echo $nombre;
echo $lugar;
echo $horario;
echo $fecha;
echo $direccion;
echo $id_cliente;



$query = "UPDATE eventos set NOMBRE_E = '$nombre', LUGAR_E = '$lugar', HORARIO = '$horario', FECHA = '$fecha',DIRECCION = '$direccion',ID_CLIENTE = $id_cliente where id_evento = $id";
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
?>




