<!-- En este apartado al iniciar sesión como admin/empleado se carga una bienvenida al usuario, para esto se manda 
a llamar la variable de nombre y la variable de cargo, para jalar los datos del usuario que ingreso, y a esta bienvenida
también se le asigno la foto del usuario o una similar solo para hacer más llamativa la bienvenida.
E esta sección es donde se manda a llamar la sección de "logout.php" para cerrar la sesión o romper dicha sesión-->
<?php include '../model/sessionData.php'; ?>
	<img src="../images/rubik.jpg" width='200px' align='left'>	
	<div id="sesion" class=" pull-right btn-group">
	  <button type="button" class="btn ">
	   <label for=""class="pull-left" >Bienvenido: <?php echo  $NOMBRE?> <br><?php echo $CARGO ?></label>
	  	<img  id="img-profile" class="pull-right img img-circle img-responsive" src="../images/putin.jpg" alt="">
	  </button>
	  <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
	    <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu" role="menu">
	    <li class="divider"></li>
	    <li><a href="logout.php">Cerrar sesión</a></li>
	  </ul>
	</div>
	





