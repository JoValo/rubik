<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresar nuevo <?php echo $section ?></h4>
      </div>
      <div class="modal-body">
      
		<form id="updateFormSolicitud" enctype= "multipart/form-data" onsubmit="return submitForm();">
      <div class="form-group">
            <label for="nombre_a">ID Solicitud</label>
            <input type="text" class=" form-control" id="bookId2" maxlength="40" required disabled="true">
      </div>
		  <div class="form-group">
		    <label for="nombre_a">Fecha Pedido</label>
		    <input type="text" id="fecha_pedido1" required disabled="true" >
		  </div>
      <div class="form-group">
		    <label for="descripcion">Descripción</label>
		    <input type="text" class="letras-numeros form-control" id="descripcion1" maxlength="40" required >
		  </div>
		  <div class="form-group">
		    <label for="">Cantidad</label>
		    <input type="number" class="solo-numero form-control" id="cantidad1" maxlength="40" required >
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
       $("#fecha_pedido1").val(alldata[1]);
       $("#descripcion1").val(alldata[2]);
       $("#cantidad1").val(alldata[3]);
       
});

$('#updateCliente').click(function(){
    var id            = $("#bookId2").val();
    var fecha_pedido  = $("#fecha_pedido1").val();
    var descripcion   = $("#descripcion1").val();
    var cantidad      = $("#cantidad1").val();
    var section       = $('#section').val();

     if(descripcion.length>5){
    var datas = new FormData(document.getElementById("updateFormSolicitud"));
            console.log(datas);
            datas.append("id",id);
            datas.append("fecha_pedido",fecha_pedido);
            datas.append("descripcion",descripcion);
            datas.append("cantidad",cantidad);
            $.ajax({
              url: "../model/updateSolicitud.php",
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

