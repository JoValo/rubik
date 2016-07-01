<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresar nuevo <?php echo $section ?></h4>
      </div>
      <div class="modal-body">
      
		<form id="updateFormCliente" enctype= "multipart/form-data" onsubmit="return submitForm();">
      <div class="form-group">
            <label for="nombre_a">ID de cliente</label>
            <input type="text" class=" form-control" id="bookId2" maxlength="40" required disabled="true">
      </div>
		  <div class="form-group">
		    <label for="nombre_a">Nombre(s)</label>
		    <input type="text" class="solo-letras form-control" id="nombre_c1" maxlength="40" required >
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
          <option value="masculino">Masculino</option>
          <option value="femenino">Femenino</option>
        </select>
      </div>
      <div class="form-group">
        <label for="">Direccion completa</label>
        <input type="text" class="letras-numero form-control" id="direccion1" maxlength="40" required >
      </div>
      <div class="form-group">
        <label for="stock">Telefono</label>
        <input type="text" class="solo-numero form-control" id="telefono_c1" maxlength="15" required>
      </div>
		</form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="updateCliente" data-dismiss="modal" class="btn btn-primary">
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
       $("#nombre_c1").val(alldata[1]);
       $("#a_paterno1").val(alldata[2]);
       $("#a_materno1").val(alldata[3]);
       $("#sexo1 option[value="+alldata[4]+"]").attr("selected","selected");
       $("#direccion1").val(alldata[5]);
       $("#telefono_c1").val(alldata[6]);
       
});

$('#updateCliente').click(function(){
    var id          = $("#bookId2").val();
    var nombre_c    = $("#nombre_c1").val();
    var a_paterno   = $("#a_paterno1").val();
    var a_materno   = $("#a_materno1").val();
    var sexo        = $('#sexo1').val();
    var direccion   = $('#direccion1').val();
    var telefono_c  = $("#telefono_c1").val();
    var section     = $('#section').val();

     if(nombre_c.length>2 && a_paterno.length>2 && a_materno.length>2 && direccion.length>5 && telefono_c.length>7){
    var datas = new FormData(document.getElementById("updateFormCliente"));
            console.log(datas);
            datas.append("id",id);
            datas.append("nombre_c",nombre_c);
            datas.append("a_paterno",a_paterno);
            datas.append("a_materno",a_materno);
            datas.append("sexo",sexo);
            datas.append("direccion",direccion);
            datas.append("telefono_c",telefono_c);
            $.ajax({
              url: "../model/updateCliente.php",
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

