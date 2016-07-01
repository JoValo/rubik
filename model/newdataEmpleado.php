<?php
include "connection.php";
//DECLARACION DE VARIABLES, LAS CUALES OBTIENEN LOS DATOS DEL FORMULARIO
$nombre		      =$_POST['nombre'];
$a_paterno	    =$_POST['a_paterno'];
$a_materno	    =$_POST['a_materno'];
$sexo           =$_POST['sexo'];
$direccion		  =$_POST['direccion'];
$telefono		    =$_POST['telefono'];
$cargo          =$_POST['cargo'];
$tipo_empleado  =$_POST['tipo_empleado'];
$contra         =$_POST['contra'];
$contrac        =$_POST['contrac'];

//IF QUE COMPRUEBA SI ALGÚN DATO ESTA VACÍO, ESTE ENVÍARA UN MENSAJE DE ERROR
if (empty($nombre) || empty($a_paterno) || empty($a_materno) || empty($sexo) || empty($direccion) || empty($telefono) || empty($cargo) || empty($tipo_empleado) || empty($contra) || empty($contrac) || $contra != $contrac) {
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato fue no ingresado.
  </div>
  <?php
}else{ 

//CONSULTA SQL PARA LA INSERCCIÓN DE LOS DATOS EN LA TABLA EMPLEADO, DATOS INGRESADOS POR EL USUARIO EN EL FORMULARIO
$query = "INSERT INTO empleado (ID_EMPLEADO,NOMBRE,A_PATERNO,A_MATERNO,SEXO,DIRECCION,TELEFONO,CARGO,TIPO_EMPLEADO,CONTRA) VALUES (1,'$nombre','$a_paterno','$a_materno', '$sexo','$direccion','$telefono','$cargo','$tipo_empleado', '$contra')";
$res = ociparse($con,$query);
oci_execute($res);
ocicommit($con);
//echo $query;

//IF QUE VERIFICA SI LOS DATOS INGRESADOS SON CORRECTOS, ENVIA UN MENSAJE DE "DATOS INSERTADOS CORRECTAMENTE"
if(!oci_error($res)){
?>
<div class="col-xs-12 alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Listo!</strong> Los datos se han insertado correctamente.

</div>
<?php
//SI LOS DATOS INGRESADOS NO SON CORRECTOS, SE ENVIARA EL MENSAJE DE ERROR "DATOS ERRONEOS"
} else{
?>
<div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Algun dato ingresado fue erroneo.
</div>
<?php
}
}
//IF QUE VERIFICA SI LA CONTRASEÑA ES DIFERENTE A LA COMPROBACIÓN DE LA CONTRASEÑA, ENTONCES LOS DATOS NO PODRAN SER INSERTADOS Y SE ENVIARA UN MENSAJE DE ERROR "LAS CONTRASEÑAS NO COINCIDEN"
if ($contra != $contrac){
?>
<div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> La contraseña no coincide.
  </div>
<?php 
}
