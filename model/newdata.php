<?php
include "connection.php";
$nombre_a = $_POST['nombre_a'];
$cantidad = $_POST['cantidad'];
$estado = $_POST['estado'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];

if (empty($nombre_a) || empty($cantidad) || empty($estado) || empty($descripcion) || empty($tipo)) {
  ?>
  <div class="col-xs-12 alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Algun dato no fue ingresado.
  </div>
  <?php
}else{ 
if ($_POST["label"]) {
    $label = $_POST["label"];
}
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $filename = $label.$_FILES["file"]["name"];
        /*echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";*/

        
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "../images/" . $filename);
        
    }
$foto = $label.$_FILES["file"]["name"];
$query = "INSERT INTO equipo(id_equipo,nombre_a,cantidad,estado,foto,descripcion,id_tipo_equipo) VALUES (1,'$nombre_a',$cantidad,'$estado', '$foto','$descripcion',1)";

$res = ociparse($con,$query);


try{ 
    oci_execute($res);
}catch(Exception $e){
    echo $e->getMessage();
}



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