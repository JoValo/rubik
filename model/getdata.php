<?php 
include 'connection.php';
$section = $_GET["section"];
?>


<div class="table-responsive">
<table id="myTable" class="table table-hover">
				<thead class="table-header-group">
				<tr>
				<?php

					$stid = oci_parse($con, "SELECT * FROM $section");
					oci_execute($stid, OCI_DESCRIBE_ONLY); 
					$ncols = oci_num_fields($stid);
					for ($i = 1; $i <= $ncols; $i++) {
					    $column_name  = oci_field_name($stid, $i);
					    echo "<td>$column_name</td>";
					}
					if ($section == 'venta_detalle') {
						echo "<td>Eliminar</td>";
					}else{
						echo "<td>Actualizar</td>";
						echo "<td>Eliminar</td>";
					}
				?>
				</tr>
				</thead>
				<tbody >
				<tr>
				<?php
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
			 						echo "<td><img class=\"img-table img-responsive\" src=\"../images/".$db['FOTO']->load()."\"></td>"; 
								}else{
									echo "<td>".substr($db[$i]->load(),0,100)."</td>";
								}
							}else {
								echo "<td>".$db[$i]."</td>";
							}
					}
					
					echo "<td><button id=\"update\" data-id=\"$db[0]\" ";
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
						echo " type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#updateModal\">Actualizar</button></td>";
						echo "<td><button id=\"delete\" data-id=\"$db[0]\" type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#deleteModal\">Eliminar</button></td>"; 
					}
					echo "</tr>";
					}
				?>
				</tbody>
		</table>
		</div>


<link rel="stylesheet" href="../css/dataTable.css">
<script src="../js/ajaxTables.js"></script>
<script src="../js/dataTables.js"></script>	
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});

</script>

