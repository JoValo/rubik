<!--Se inicia la sesión, se comprueba si la sesión iniciada es igual a admin se loguea a la interfaz de Administrador, 
o en caso de que la sesión sea igual a empleado se loguea la sesión de empleado-->
<?php 
session_start();
$admin = isset($_GET['admin']) ? $_GET['admin'] : '';
$empleado = isset($_GET['empleado']) ? $_GET['empleado'] : '';
	if(!isset($_SESSION['user'])){
		header("location:login.php");
	}
	if ($admin == TRUE) {
		$userLevel = "administrador";	
	}else{
		$userLevel = "empleado";		
	}
?>
<!DOCTYPE html>
<html>
<!-- Se incluye la lista laterar que despliega todos los módulos del sistema y el estilo del encabezado-->
<?php include '../includes/header-back.php';?>
<body>
<header id="head-back">
	<?php include '../includes/dashboardHead.php'; ?>
</header>
	<?php include '../includes/dashboardMenu.php';?>
	<div class="contenedor-chart container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php 
			$dato1 = 0;
		    $dato2 = 0;
		   	$con = oci_connect('rubik', '12345');
			
			//Consultas SQL para la actualización de las gráficas de equipo y solicitudes
			$query1 ="select count(nombre_a) from equipo";
			$res1 =  ociparse($con,$query1);
			$query2 ="select count(id_solicitud) from solicitudes";
			$res2 =  ociparse($con,$query2);
			
		    oci_execute($res1);
		  
		    while( $datos = oci_fetch_array($res1) ){ 
		        $dato2 = $datos[0];
		    }
		     oci_execute($res2);
		  
		    while( $datos = oci_fetch_array($res2) ){ 
		        $dato1 = $datos[0];
		    }


			 ?>
			<h1 id="reportes" class="text-center">Reportes</h1>	
			<div class="col-md-6">
			<h2 id="texta"class="text-center">Equipo</h2>
				<div id="4" style="height: 250px;"></div>
			</div>
			<div class="col-md-6">
			<h2 id="texta"class="text-center">Solicitudes</h2>
				<div id="5" style="height: 250px;"></div>
			</div>
			<div class="col-md-12">
				<!-- Link que direcciona a la generación del reporte PDF -->
				<a href="pdf.php?user=<?php echo $user;?>" class="col-xs-12 btn btn-success btn-lg"><span>Generar reporte de solicitudes</span></a>
			</div>
			
		</div>
	</div>


	<div  id="adminForm"></div>


<script style="text/javascript">
//Se manda a llamar la función ajax, para la generación de las gráficas
new Morris.Donut({
  element: '4',
  data: [
	{label: "Equipo en Stock", value: <?php echo empty($dato2)?0:$dato2 ?>},
  ]
});

new Morris.Donut({
  element: '5',
  data: [
	{label: "Solicitudes", value: <?php echo empty($dato1)?:$dato1 ?>},
  ], 
});

</script>
</body>
</html>