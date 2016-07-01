<!-- Al seleccionar un módulo se manda a llamar los datos de esa sección, es este apartado se manda a llamar a la
sección y dependiendo la sección que este siendo requrida entonces se imprimirá el nombre de dicha sección, se realiza
una consulta SQL para jalar el contenido de dicha sección-->
<?php 
if ($section != 'venta_detalle') {
	?>
<button id="button-add"  class="col-md-5 col-md-offset-7 btn btn-success" data-toggle="modal" data-target="#myModal">
	Agregar nuevos <?php echo $section ?> <!-- Se manda a llamar la variable section, para mostrar el nombre de la sección-->
</button>
	<?php
}
 ?>
<div  id="info"></div>
	<div class="col-md-12" id="viewdata" class="table-responsive">
		<table id="myTable" class="table  table-hover">
				<thead class="table-header-group">
				<tr>
				<?php

					$stid = oci_parse($con, "SELECT * FROM $section");//Consulta SQL que jala el contenido de la sección
					oci_execute($stid, OCI_DESCRIBE_ONLY); 
					$ncols = oci_num_fields($stid);
					for ($i = 1; $i <= $ncols; $i++) {
					    $column_name  = oci_field_name($stid, $i);
					    echo "<td>$column_name</td>";
					}
					if ($section == 'venta_detalle') {
						echo "<td>Eliminar</td>";  
					}else{
						echo "<td>Actualizar</td>";//Se carga la sección de Actualizar
						echo "<td>Eliminar</td>";//Se carga la sección de Eliminar
					}
				?>
				</tr>
				</thead>
				<tbody >
					<tr>
				<?php
					//En este apartado se carga la sección, para verificar cuando se quiera eliminar o actualizar alguna 
	                //foto del módulo de equipo, verifica si es una imagen y si entra en los tipos de formatos aceptados 
				    //y si es así se carga dicha imagen.
					echo "<input id='section' type='hidden' value=$section>";
					$res=oci_parse($con,"SELECT * FROM $section");					
					$r1=oci_execute($res);
					$ncols = oci_num_fields($res);
					while ($db = oci_fetch_array($res)) 
					{ 
						for ($i = 0; $i <= $ncols-1; $i++) {
							$column_type  = oci_field_type($res, $i+1);
							$column_name  = oci_field_name($res, $i+1);
							if ($column_type == 'CLOB') {
								if ($column_name == 'FOTO') {
			 						echo "<td class=\"text-center\"><img class=\"img-table img-responsive\" src=\"../images/".$db['FOTO']->load()."\"></td>"; 
								}else{
									echo "<td class=\"text-center\">".substr($db[$i]->load(),0,100)."</td>";
								}
							}else {
								echo "<td class=\"text-center\">".$db[$i]."</td>";
							}
					}
					
					echo "<td class=\"text-center\"><button id=\"update\" data-id=\"$db[0]\" ";
					for ($i=0; $i < $ncols ; $i++) { 
						$column_type  = oci_field_type($res, $i+1);
						if ($column_type == 'CLOB') {
							echo " data-".$i."=\"".$db[$i]->load()."\"";
						}else{
							echo "data-".$i."= \"".$db[$i]." \"";
						}
					}

					if ($section == 'venta_detalle') {
						echo "<td><button id=\"delete\" data-id=\"$db[0]\" type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#deleteModal\">Eliminar</button></td>"; 
					}else
					{
						echo " type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#updateModal\">Actualizar</button></td>";
						echo "<td><button id=\"delete\" data-id=\"$db[0]\" type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#deleteModal\">Eliminar</button></td>"; 
					}
					echo "</tr>";
				}
				?>
				</tbody>
		</table>
		</div>
	</div>
</div>
<!-- Se cargan los estilos CSS-->
<link rel="stylesheet" href="../css/dataTable.css">
<script src="../js/ajaxTables.js"></script>
<script src="../js/dataTables.js"></script>	
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});

</script>



