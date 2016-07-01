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
		    <label for="nombre_a">Nombre de articulo</label>
		    <input type="text" class="form-control" id="nombre_a" maxlength="40" required >

		  </div>
		  <div class="form-group">
		    <label for="cantidad">Cantidad</label>
		    <input type="text" class="solo-numero form-control" id="cantidad" required >
		  </div>
       <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" class="form-control" id="estado" required >
      </div>
      <div class="">
        <label for="foto">Selecciona la foto</label>
        <input name="file" type="file" class="" id="foto">
      </div>
		  <div class="form-group">
		    <label for="descripcion">Descripcion</label>
		    <input type="text" class="form-control" id="descripcion" maxlength="40" required >
		  </div>
		  
		  <div class="form-group">
      <label for="sel1">Tipo de Articulo</label>
       <select class="form-control" name="" id="">
          <option value="1">Roboticas</option>
          <option value="2">Arquitectonicas</option>
          <option value="3">Leds</option>
          <option value="4">Comunicacion</option>
          <option value="5">Consolas</option>
          <option value="6">Seguidores</option>
          <option value="7">Convencional</option>
          <option value="8">Efecto</option>
          <option value="9">Video</option>
          <option value="10">Riggi</option>
          <option value="11">Escenario</option>
          <option value="12">Audio</option>
          <option value="13">Centros de carga</option>
          <option value="14">Cableado</option>

        </select>
        </div>
		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="save" data-dismiss="modal" class="btn btn-primary">
      </div>
    </div>
  </div>
</div> 

<script>

 	$('#save').click(function(){
		var nombre_a = $('#nombre_a').val();
		var cantidad = $('#cantidad').val();
		var estado = $('#estado').val();
		var foto = $('#foto').val();
    var descripcion = $('#descripcion').val();
    var tipo = $('#tipo').val();
    var section = $('#section').val();

    if(nombre_a.length>2 && cantidad.length>1 && estado.length>5 && foto.length>1 && descripcion.length>3){
		var fd = new FormData(document.getElementById("fileinfo"));
  
            fd.append("label", "photofile");
            fd.append("nombre_a",nombre_a);
            fd.append("cantidad",cantidad);
            fd.append("estado",estado);
            fd.append("descripcion",descripcion);
            fd.append("tipo",tipo);
            $.ajax({
              url: "../model/newdata.php",
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

