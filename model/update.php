<?php 
include 'connection.php';
$id = 		$_POST['id'];
$nombre_a = $_POST['nombre_a'];
$cantidad = $_POST['cantidad'];
$estado = 	$_POST['estado'];
$descripcion = 	$_POST['descripcion'];
$tipo =  $_POST['tipo'];
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
if ($foto == "photofile") {
	$foto = $_POST['foto_old'];
}

$query = "UPDATE equipo SET NOMBRE_A = '$nombre_a', CANTIDAD = $cantidad, ESTADO = '$estado', FOTO = '$foto', DESCRIPCION = '$descripcion', ID_TIPO_EQUIPO = $tipo where ID_EQUIPO =  $id ";
$res = ociparse($con,$query);
oci_execute($res);
echo $query;
 ?>


