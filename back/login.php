<html lang="en">
<head>
	<!-- Se incluye el encabezado del sistema-->
	<?php include '../includes/header-back.php';?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<?php 
//Si los datos en el login son erroneos o que no existan en la base de datos, se envía con un echo 
//el siguiente mensaje de error
$value = isset($_GET['err']) ? $_GET['err'] : '';
 if ($value == 1) {
	echo "<div id=\"error\">Error en los datos <a href=\"login.php\" class=\" pull-right glyphicon glyphicon-remove\"></a></div>";	
}
?>
<!-- Estructura de la interfaz del login-->
<div id="back-up"></div>
<img id="img-login" class="img-responsive center-block" src="../images/log.png">
	<div id="login" class="col-md-4 col-md-offset-4">
	
	<form action="../model/login.php" method="POST" role="form">
		<section class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>			
				<input type="text" name="user" 		maxlength="40" class="form-control" placeholder="Ingresa tu usuario" required>
		</section>	
		<section class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>			
			<input type="password" name="password"	maxlength="20"	 class="form-control" placeholder="Ingresa tu contraseña" required>
		</section>	
		<button id="success" class="col-xs-12 btn btn-warning">Login</button>
	</form>
	</div>
	<div class="col-md-2"></div>
</div>
</div>	
</body>
</html>