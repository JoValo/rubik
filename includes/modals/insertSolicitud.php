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
		    <label for="descripcion">Descripción</label>
		    <input type="text" class="letras-numeros form-control" id="descripcion" maxlength="40" required >
		  </div>
		  <div class="form-group">
		    <label for="">Cantidad solicitada</label>
		    <input type="number" class="solo-numero form-control" id="cantidad" maxlength="40" required >
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

 	$('#saveEmpleado').click(function(){
		var descripcion = $('#descripcion').val();
		var cantidad = $('#cantidad').val();
    var section = $('#section').val();

    if(descripcion.length>5){
    console.log(descripcion);
    console.log(cantidad);
    console.log(section);
		var fd = new FormData(document.getElementById("fileinfo"));

            fd.append("descripcion",descripcion);
            fd.append("cantidad",cantidad);
            $.ajax({
              url: "../model/newdataSolicitud.php",
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