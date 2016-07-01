<!-- En esta sección se muestran los módulos correspondientes a cada interfaz, aquí se verifica si es ADMIN o EMPLEADO,
en caso de ser ADMIN se mostrarán todos los módulos ya que el ADMINISTRADOR puede hacer modificaciones o simplemente 
visualizar todos los módulos, si se accede al sistema como EMPLEADO entonces se mostrarán todos los módulos a excepción
del módulo de empleados, ya que en este módulo solo podrá hacer modificaciones, altas y bajas el administrador-->
<div id="menu" class="admin container-fluid">
<?php include '../model/sessionData.php' ?>
	<div class="row menu-vertical">
		<div class="col-md-12">
			<!-- Se verifica si el TIPO_EMPLEADO es ADMIN-->
		<?php if ($userLevel == 'administrador' || $TIPO_EMPLEADO == 'ADMIN') {?>
		<ul>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-user"><span>Clientes</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-calendar"><span>Eventos</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-gift"><span>Solicitudes</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-user"><span>Empleado</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left  glyphicon glyphicon-search"><span>Equipo</span></i> 
				</a>
			</li>
		</ul>	
		<!-- Se verifica si el TIPO_EMPLEADO es EMPLEADO-->	
		<?php }else if ($userLevel == 'empleado' || $TIPO_EMPLEADO == 'EMPLEADO') {?>
		<ul>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-user"><span>Clientes</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-calendar"><span>Eventos</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left glyphicon glyphicon-gift"><span>Solicitudes</span></i>
				</a>
			</li>
			<li>
				<a class="option">
					<i class="pull-left  glyphicon glyphicon-search"><span>Equipo</span></i> 
				</a>
			</li>
		</ul>
		<?php } ?>
		         
		</div>
	</div>
</div>

<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript">

//En este apartado se mandan a llamar las secciones, están se encuentran dentro de un switch case, en el que cada case
//es una sección, y este apartado abrirá la sección a la que se manda a llamar, Ejemplo si se elige el case de 
//"Clientes" entonces se abrirá el módulo de clientes y las funciones que este contenga llamándolas desde la ruta 
//donde se encuentren, dicha ruta se encuentra iniciada o ubicada, en los "routes" que es donde se encuentran 
//cargadas las secciones.
var section;
	$(document).ready(function() {
				$(".option").click(function(event) {
					var valueSection = this.childNodes[1].childNodes[0].textContent;
					$("#adminForm").fadeOut(100,function (){ 
					$("#adminForm").load(
						"../routes/admin.php",
						{user:'<?php echo $userLevel?>', section: valueSection}, 
						function(response, status, xhr) {
						  $("#adminForm").fadeIn(100);});
					switch(valueSection)
					{
					/*	case 'Reportes':
							section = 'reportes';
							break;
						case 'Ventas':
							section = 'venta_detalle';
							break;*/
						case 'Clientes':
							section = 'clientes';
							break;
						case 'Eventos':
							section = 'eventos';
							break;
						case 'Solicitudes':
							section = 'solicitudes'
							break;
						case 'Empleado':
							section = 'empleado';
							break;		
						case 'Equipo':
							section = 'equipo';
							break;			
					}
						viewdata(section);
				});
				});
			});			
	 function viewdata(xsection){
       $.ajax({
	   type: "GET",
	   url: "../model/getdata.php",
	   data: {section : xsection },
      }).done(function( data ) {
	  $('#viewdata').html(data);
      });
    }
</script>



	