<?php
//Generación de la solicitud PDF 
ob_start();
//Se incluye la conexión
include ('../model/connection.php'); 
//Consulta SQL que selecciona el nombre del usuario del que esta activa la sesión
  $user = $_GET['user'];
  $stmt = oci_parse($con, "SELECT * FROM empleado WHERE NOMBRE = '$user'");
    oci_execute($stmt, OCI_DEFAULT);
    $datos = oci_fetch_assoc($stmt);
    
?>
<!-- Estructura de la solicitud PDF-->
<page>

<body>
<div class="texto">
Rubik Company
</div>
<div class="table">
  <div class="textoa">
Solicitud de Equipo
</div>
<div class="textob">
Fecha de solicitud: <small><?php echo date("Y/m/d") //Con la función date,  PHP imprime la fecha actual?></small> 
</div>
</div>
<br>
<div class="tablea">
    <div class="textoc">
Datos de solicitud
    </div>
</div>

      <p><strong>Nombre solicitante: </strong><?php echo $datos['NOMBRE']." ".$datos['A_PATERNO']." ".$datos['A_MATERNO'] ?></p>
      <p><strong>Cargo: </strong><?php echo $datos['CARGO']?></p>
      <p><strong>Entidad : </strong>Mexico DF</p>
      <p><strong>Sucursal : </strong>Chalco</p>

<div class="tablea">
    <div class="textoc">
Equipo solicitado
    </div>
</div>

<table>
    <tbody>
        <?php 
    
            echo "<tr>";
              //Se imprimen los datos requeridos en la solicitud
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td><strong>".'Fecha'."</strong></td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td><strong>".'Descripcion'."</strong></td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td><strong>".'Cantidad'."</strong></td>"; 
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>"; 
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";      
        echo "</tr>";
            //Consulta SQL que selecciona el contenido de las solicitudes y dicho contenido se imprime en la solicitud PDF
            $s = oci_parse($con, "SELECT * FROM SOLICITUDES");
            oci_execute($s);
            //Array que recorre las filas
          while(($row = oci_fetch_array($s)))
          {
            echo "<tr>";
              //Se mandan a llamar los datos ingresados en la tabla de solicitudes
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>".$row['FECHA_PEDIDO']."</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>".$row['DESCRIPCION']."</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>".$row['CANTIDAD']."</td>"; 
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>"; 
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";      
        echo "</tr>";
             
         }
        ?>
    </tbody>
</table>

<!--En este apartado los estilos CSS se tuvieron que declarar directamente -->
<style type="text/css">
.texto{
   color: DodgerBlue;
   text-align: center;
   font-family: Arial;
   font-weight: normal;
   font-weight: bolder; 
   font-size: 90px;
}
.textoa{
   color: White;
   text-align: center;
   font-family: Arial;
   font-weight: bold;
   font-size: 25px;
}  

.textob{
   color: White;
   text-align: center;
   font-family: Arial;
   font-weight: normal;
   font-size: 12px;
}

.textoc{
   color: White;
   text-align: center;
   font-family: Arial;
   font-weight: bold;
   font-size: 18px;
}

.textod{
   color: DeepSkyBlue;
   text-align: left;
   font-family: Arial;
   font-weight: bold;
   font-size: 12px;
}

.textoe{
   color: SteelBlue;
   font-family: Arial;
   font-weight: bold;
   font-size: 13px;
   padding-left: 5px;
}
-
.table{
border-radius: 10px;
border-color: skyblue;
border-width: 1px;
background-color: dodgerblue; 

}

.tablea{
border-radius: 10px solid;
border-color: dodgerblue;
border-width: 1px;
background-color: steelblue; 
}

.tableb{
border-radius: 10px solid;
border-color: SteelBlue;
border-width: 1px;
margin-left: 500px;
margin-right: auto;
}

</style>
     


</body>
</page>

<?php
//Librería necesaria para la genereación de la solicitud PDF
$content = ob_get_clean();
require_once('../libs/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'ES', 'UTF-8');
$pdf->writeHTML($content);
$pdf->output('solicitud.pdf','D');

/**
*  I : send the file inline to the browser (default). The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
         *  D : send to the browser and force a file download with the name given by name.
         *  F : save to a local server file with the name given by name.
         *  S : return the document as a string. name is ignored.
         *  FI: equivalent to F + I option
         *  FD: equivalent to F + D option
         *  true  => I
         *  false => S
**/
 
?>

 