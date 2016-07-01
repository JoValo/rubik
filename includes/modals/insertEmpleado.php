<?
//FORMULARIO DE INSERTAR EMPLEADOS
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresar nuevo <?php echo $section ?></h4>
      </div>
      <div class="modal-body">
        
		<form id="fileinfo" enctype= "multipart/form-data" onsubmit="return submitForm();">
		  <div class="form-group">
		    <label for="nombre_a">Nombre de empleado</label>
		    <input type="text" class="solo-letras form-control" id="nombre" maxlength="40" required >
		  </div>
		  <div class="form-group">
		    <label for="descripcion">Apellido paterno</label>
		    <input type="text" class="solo-letras form-control" id="a_paterno" maxlength="40" required >
		  </div>
		  <div class="form-group">
		    <label for="">Apellido materno</label>
		    <input type="text" class="solo-letras form-control" id="a_materno" maxlength="40" required >
		  </div>
      <div class="form-group">
        <label for="">Direccion completa</label>
        <input type="text" class="letras-numero form-control" id="direccion" maxlength="40" required >
      </div>
		  <div class="form-group">
		    <label for="stock">Sexo</label>
        <select name="sexo" class="form-control" id="sexo">
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
		  </div>
      <div class="form-group">
          <label for="stock">Telefono</label>
          <input type="tel" class="solo-numero form-control" id="telefono" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="stock">Cargo</label>
          <select name="cargo" class="form-control" id="cargo">
            <option value="Planeacion">Planeación</option>
            <option value="Desarrollo">Desarrollo</option>
            <option value="Mantenimiento">Mantenimiento</option>
            <option value="Luces">Luces</option>
            <option value="Coordinación">Coordinación</option>
            <option value="Escenarios">Escenarios</option>
          </select>
        </div>
      <div class="form-group">
        <label for="stock">Empleado</label>
        <select name="empleado" class="form-control" id="tipo_empleado">
          <option value="ADMIN">Administrador</option>
          <option value="EMPLEADO">Empleado</option>
        </select>
      </div>
      <div class="form-group">
        <label for="stock">Contraseña</label>
        <input type="password" class=" form-control" id="contra" maxlength="20" required>
      </div>
      <div class="form-group">
        <label for="stock">Confirme contraseña</label>
        <input type="password" class=" form-control" id="contrac" maxlength="20" required>
      </div>
		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="saveEmpleado" data-dismiss="modal" class="btn btn-primary">
      </div>
    </div>
  </div>
</div> 

<script>

      
      //DECLARACIÓN DE VARIABLES PARA LA OBTENCIÓN DE LOS DATOS DEL FORMULARIO
 	$('#saveEmpleado').click(function(){
		var nombre = $('#nombre').val();
		var a_paterno = $('#a_paterno').val();
		var a_materno = $('#a_materno').val();
		var sexo = $('#sexo').val();
		var telefono = $('#telefono').val();
    var cargo = $('#cargo').val();
    var contra = $('#contra').val();
    var contrac = $('#contrac').val();
    var tipo_empleado = $('#tipo_empleado').val();
    var direccion = $('#direccion').val();
    var section = $('#section').val();

    //COMPARACIÓN DE LA LONGITUD DE VARIABLES, SI LAS VARIABLES INGRESADAS POR EL USUARIO NO CUMPLEN CON LA LONGITUD DE LA CONDICIÓN, SE ENVIARA UN MENSAJE DE ERROR.
    if(nombre.length>2 && a_paterno.length>2 && a_materno.length>2 && direccion.length>5 && telefono.length>7 && cargo.length>4 && contra.length>4 && contrac.length>4){
   
    //
    console.log(nombre);
    console.log(a_paterno);
    console.log(a_materno);
    console.log(sexo);
    console.log(telefono);
    console.log(cargo);
    console.log(contra);
    console.log(contrac);
    console.log(tipo_empleado);
    console.log(direccion);
    console.log(section);
		var fd = new FormData(document.getElementById("fileinfo"));

            //COMPARACIÓN Y ENVÍO DE DATOS
            fd.append("nombre",nombre);
            fd.append("a_paterno",a_paterno);
            fd.append("a_materno",a_materno);
            fd.append("sexo",sexo);
            fd.append("telefono",telefono);
            fd.append("contra", contra);
            fd.append("contrac", contrac);
            fd.append("tipo_empleado", tipo_empleado);
            fd.append("cargo", cargo);
            fd.append("direccion", direccion);

            //FUNCION AJAX QUE DIRECCIONA EL FORMULARIO AL MODELO DE INSERCIÓN DE LOS DATOS
            $.ajax({
              url: "../model/newdataEmpleado.php",
              type: "POST",
              data: fd,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                $('#info').html(data);
	  			    viewdata(section);
            });
            $('#myModal').modal('hide');
            return false; 
            } else { alert('Compruebe sus datos, la longitud de sus datos no corresponde'); return false; }      
    });
</script>

