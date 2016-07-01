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
		    <label for="nombre_e">Nombre Evento</label>
		    <input type="text" class="solo-letras form-control" id="nombre_e" maxlength="40" required >
		  </div>
      <div id="compracion_articulo"></div>
		  <div class="form-group">
		    <label for="descripcion">Lugar del Evento</label>
		    <input type="text" class="solo-letras form-control" id="lugar_e" maxlength="40" required >
		  </div>
		  <div class="form-group">
		    <label for="">Horario Evento</label>
		    <input type="time" id="horario" maxlength="40" required >
		  </div>
      <div class="form-group">
        <label for="">Fecha Evento</label>
        <input type="date" id="fecha" min="2016-06-22" required >
      </div>
      <div class="form-group">
        <label for="stock">Direccion Evento</label>
        <input type="text" class="letras-numero form-control" id="direccion" maxlength="15" required>
      </div>
      <div class="form-group">
          <label for="stock">Cliente</label>
          <select name="cliente" class="form-control" id="id_cliente">
            <option value="101">101</option>
            <option value="141">141</option>
          </select>
        </div>
		</form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="saveEvento" data-dismiss="modal" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>  

<script>
$(document).ready(function() {    
    $('#direccion').blur(function(){
        var direccion = $(this).val();        
        $.ajax({
            type: "POST",
            url: "../model/check.php",
            data: {"direccion":direccion},
            success: function(data) {
                $('#compracion_articulo').fadeIn(1000).html(data);
            }
        });
    });              
});   

 	$('#saveEvento').click(function(){
		var nombre_e = $('#nombre_e').val();
		var lugar_e = $('#lugar_e').val();
		var horario = $('#horario').val();
		var fecha = $('#fecha').val();
		var direccion = $('#direccion').val();
    var id_cliente = $('#id_cliente').val();
    var section = $('#section').val();


    if(nombre_e.length>2 && lugar_e.length>5 && horario.length>1 && direccion.length>5){
    console.log(nombre_e);
    console.log(lugar_e);
    console.log(horario);
    console.log(fecha);
    console.log(direccion);
    console.log(id_cliente);
    console.log(section);
		var fd = new FormData(document.getElementById("fileinfo"));
  

            fd.append("nombre_e",nombre_e);
            fd.append("lugar_e",lugar_e);
            fd.append("horario",horario);
            fd.append("fecha",fecha);
            fd.append("direccion",direccion);
            fd.append("id_cliente",id_cliente);
            $.ajax({
              url: "../model/newdataEvento.php",
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