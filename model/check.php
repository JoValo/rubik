
<?php
//CONSULTA SQL QUE VERIFICA SI LA DIRECCION QUE SE REQUIERE REGISTRAR EN EL EVENTO ES IGUAL A UNA DIRECCION QUE YA SE
//HA REGISTRADO, SI LA DIRECCIÓN YA EXISTE ENVIARA EL MENSAJE DE "LUGAR RESERVADO", SI NO ES ASÍ, EL USUARIO PODRÁ
//INSERTAR DICHA DIRECCIÓN PARA SU EVENTO.
include('connection.php');
    $direccion = $_POST['direccion'];
    $query = "select * from eventos where DIRECCION= '$direccion' ";
    $results = oci_parse($con, $query);
    oci_execute($results);
    //echo $query;
    $data =  oci_fetch_array($results);
	    if (empty($data))
	    {
	        echo '<div class="text-primary text-center" id="Success"><strong>Lugar disponible</strong></div>';
	    }else 
	    {
	        echo '<div class="text-danger text-center" id="Error"><strong>Lugar reservado</strong></div>';
	    }
    
?>