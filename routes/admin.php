<?php include '../model/connection.php'; ?>
<div class="container">
	<div class="row">
		<?php
		$section = $_POST['section'];
		switch ($section) {
			/*case 'Reportes':
				$section = 'reportes';
			break;
			case 'Ventas':
				$section = 'venta_detalle';
			break;*/
			case 'Clientes':
				$section = 'clientes';
				include '../includes/modals/insertClientes.php';
				include '../includes/modals/updateClientes.php';
			break;
			case 'Equipo':
				$section = 'equipo';
				include '../includes/modals/insert.php';
				include '../includes/modals/update.php';
			break;
			case 'Empleado':
				$section = 'empleado';
				include '../includes/modals/insertEmpleado.php';
				include '../includes/modals/updateEmpleado.php';
			break;
			case 'Eventos':
				$section = 'eventos';
				include '../includes/modals/insertEvento.php';
				include '../includes/modals/updateEvento.php';
			break;
			case 'Solicitudes':
				$section = 'solicitudes';
				include '../includes/modals/insertSolicitud.php';
				include '../includes/modals/updateSolicitud.php';
			break;
			
		}
		include '../includes/modals/delete.php';
		include '../includes/adminModules/adaptTable.php'; /*se manda a llamar la tabla que interpreta el menu que selecciones*/
		?>	
	</div><!--> row <!-->
</div>

<script>

 
$('.option').click(function (event){
	$(".option").css("display"," block");
});
$("#button-add").click(function (event){
	$("#myModal").css("display"," block");
});
$("#update").click(function (event){
	$("#updateModal").css("display"," block");
});
$("#update").click(function (event){
	$("#updateEmpleado").css("display"," block");
});
$("#delete").click(function (event){
	$("#deleteModal").css("display"," block");
});
$('.solo-numero').keyup(function (){
   this.value = (this.value + '').replace(/[^0-9]+.+[^0-9]/g, '');
});
$('.solo-articulo').keyup(function (){
  this.value = (this.value + '').replace(/[^0-9]/g, '');
});
$('.solo-letras').keyup(function (){
  this.value = (this.value + '').replace(/[^a-z A-Z]/g, '');
});
$('.letras-numero').keyup(function (){
   this.value = (this.value + '').replace(/[^a-z A-Z 0-9]/g, '');
});


</script>
