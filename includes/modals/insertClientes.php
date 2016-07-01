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
		    <label for="nombre_a">Nombre(s)</label>
		    <input type="text" class="solo-letras form-control" id="nombre_c" maxlength="40" required >
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
		    <label for="stock">Sexo</label>
        <select name="sexo" class="form-control" id="sexo">
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
		  </div>
      <div class="form-group">
        <label for="stock">Dirección</label>
        <input type="text" class="form-control" id="direccion" maxlength="40" required>
      </div>
      <div class="form-group">
        <label for="stock">Telefono</label>
        <input type="text" class="solo-numero form-control" id="telefono_c" maxlength="15" required>
      </div>
      
		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="saveCliente" data-dismiss="modal" class="btn btn-primary">
      </div>
    </div>
  </div>
</div> 

<script>

 


 	$('#saveCliente').click(function(){
		var nombre_c   = $('#nombre_c').val();
		var a_paterno  = $('#a_paterno').val();
		var a_materno  = $('#a_materno').val();
		var sexo       = $('#sexo').val();
	  var direccion  = $('#direccion').val();
  	var telefono_c = $('#telefono_c').val();
    var section    = $('#section').val();

    if(nombre_c.length>2 && a_paterno.length>2 && a_materno.length>2 && direccion.length>5 && telefono_c.length>7){
    console.log(nombre_c);
    console.log(a_paterno);
    console.log(a_materno);
    console.log(sexo);
    console.log(direccion);
    console.log(telefono_c);
    console.log(section);
		var fd = new FormData(document.getElementById("fileinfo"));


            fd.append("nombre_c",nombre_c);
            fd.append("a_paterno",a_paterno);
            fd.append("a_materno",a_materno);
            fd.append("sexo",sexo);
            fd.append("direccion", direccion);
            fd.append("telefono_c",telefono_c);
            $.ajax({
              url: "../model/newdataCliente.php",
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

