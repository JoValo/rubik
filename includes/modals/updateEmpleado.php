<?
//FORMULARIO DE ACTUALIZACIÓN DE DATOS DE LOS EMPLEADOS
?>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresar nuevo <?php echo $section ?></h4>
      </div>
      <div class="modal-body">  
      <form id="updateFormEmpleado" enctype= "multipart/form-data" onsubmit="return submitForm();">
       <div class="form-group">
          <label for="nombre_a">Numero de empleado</label>
          <input type="text" class=" form-control" id="bookId2" maxlength="40" required disabled="true">
        </div>
        <div class="form-group">
          <label for="nombre_a">Nombre de empleado</label>
          <input type="text" class="solo-letras form-control" id="nombre1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="descripcion">Apellido paterno</label>
          <input type="text" class="solo-letras form-control" id="a_paterno1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="">Apellido materno</label>
          <input type="text" class="solo-letras form-control" id="a_materno1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="stock">Sexo</label>
          <select name="sexo" class="form-control" id="sexo1">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Direccion completa</label>
          <input type="text" class="letras-numero form-control" id="direccion1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="stock">Telefono</label>
          <input type="tel" class="solo-numero form-control" id="telefono1" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="stock">Cargo</label>
          <select name="cargo" class="form-control" id="cargo1">
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
          <select name="empleado" class="form-control" id="tipo_empleado1">
            <option value="ADMIN">Administrador</option>
            <option value="EMPLEADO">Empleado</option>
          </select>
        </div>
        <div class="form-group">
          <label for="stock">Contraseña</label>
          <input type="password" class=" form-control" id="contra1" maxlength="20" required>
        </div>
        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="updateEmpleado" data-dismiss="modal" class="btn btn-primary">
      </div>
    </div>
  </div>
</div> 
<script>

$(document).on("click", "#update", function () {

  var alldata =[];
  for (var i = 0; i < 15; i++) {
    if ($(this).attr("data-"+i) != null) {
      alldata[i] =  $(this).attr("data-"+i);
      console.log(alldata[i]);
    }
  }

       $("#bookId2").val(alldata[0]);
       $("#nombre1").val(alldata[1]);
       $("#a_paterno1").val(alldata[2]);
       $("#a_materno1").val(alldata[3]);
       $("#sexo1 option[value="+alldata[4]+"]").attr("selected","selected");
       $("#direccion1").val(alldata[5]);
       $("#telefono1").val(alldata[6]);
       $("#tipo_empleado1 option[value="+alldata[7]+"]").attr("selected","selected","selected","selected","selected","selected");
       $("#tipo_empleado1 option[value="+alldata[8]+"]").attr("selected","selected");
       $("#contra1").val(alldata[9]);
       
});

$('#updateEmpleado').click(function(){
    var id          = $("#bookId2").val();
    var nombre      = $("#nombre1").val();
    var a_paterno   = $("#a_paterno1").val();
    var a_materno   = $("#a_materno1").val();
    var sexo        = $("#sexo1").val();
    var direccion   = $('#direccion1').val();
    var telefono    = $("#telefono1").val();
    var cargo       = $("#cargo1").val();
    var contra      = $("#contra1").val();
    var tipo_empleado    = $("#tipo_empleado1").val();
    var section     = $('#section').val();

    //IF QUE VERIFICA LA LONGITUD DE LOS DATOS, SI LOS DATOS INGRESADOS TIENEN UNA LONGITUD MENOR A LA REQUERIDA SE ENVIARA UN MENSAJE DE ERROR
    if(nombre.length>2 && a_paterno.length>2 && a_materno.length>2 && direccion.length>5 && telefono.length>7 && cargo.length>4 && contra.length>5){
    var datas = new FormData(document.getElementById("updateFormEmpleado"));
            console.log(datas);
            datas.append("id",id);
            datas.append("nombre",nombre);
            datas.append("a_paterno",a_paterno);
            datas.append("a_materno",a_materno);
            datas.append("sexo",sexo);
            datas.append("direccion",direccion);
            datas.append("telefono",telefono);
            datas.append("cargo",cargo);
            datas.append("tipo_empleado",tipo_empleado);
            datas.append("contra",contra);
            
            //FUNCION AJAX QUE DIRECCIONA EL FORMULARIO AL MODELO DE ACTUALIZACIÓN DE LOS DATOS
            $.ajax({
              url: "../model/updateEmpleado.php",
              type: "POST",
              data: datas,
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








