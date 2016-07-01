<div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="title">Actualizar</h4>
      </div>
      <div class="modal-body">
        
		<form id="updateForm" enctype= "multipart/form-data" onsubmit="return submitForm();">
		  <div class="form-group">
        <label for="bookId2">Codigo Producto</label>
	      <input type="text" name="bookId" class="form-control" id="bookId2" value="" disabled="true" />
		    <label for="nombre_a">Nombre de articulo</label>
		    <input type="text" id="nombre_a1" name="nombre_a1" class=" solo-letras form-control" maxlength="40" required>
		  </div>
		  <div class="form-group">
        <label for="cantidad">Cantidad</label>
        <input type="text" class=" solo-numero form-control" name="cantidad1" id="cantidad1" maxlength="8" required>
      </div>
      <div class="form-group">
        <label for="estado">Estado</label>
        <input type="text" name="estado1" class=" solo-letras form-control" id="estado1" maxlength="8" required>
      </div>
		  <div class="">
        <label for="foto_old">Foto Antigua</label>
        <input type="text" name="foto_old1" class="form-control" id="foto_old1" disabled="true">
        <hr>
        <label for="foto" class="text-primary">Seleccionar nueva foto </label>
		    <input name="file" name="foto_new1" type="file" class="" id="foto_new1" required>
		  </div>
      <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion1" class="form-control" id="descripcion1" required></textarea>
      </div>
		  <div class="form-group">
      <label for="sel1">Tipo de Articulo</label>
       <select class="form-control" name="tipo1" id="tipo1">
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
        <input type="submit" id="updateButton" class="btn btn-primary" data-dismiss="modal" value="Actualizar">
      </div>
    </div>
  </div>
</div>
<script>
/*
$(document).ready(function() {    
    $('#nombre_a1').blur(function(){
        var nombre_a = $(this).val();        
        $.ajax({
            type: "POST",
            url: "../model/check.php",
            data: {"articulo":nombre_a},
            success: function(data) {
                $('#compracion_articulo1').fadeIn(1000).html(data);
            }
        });
    });              
});  
*/


$(document).on("click", "#update", function () {
  var alldata =[];
  for (var i = 0; i < 15; i++) {
    if ($(this).attr("data-"+i) != null) {
      alldata[i] =  $(this).attr("data-"+i);
      console.log(alldata[i]);
    }
  }
       $("#bookId2").val(alldata[0]);
       $("#nombre_a1").val(alldata[1]);
       $("#cantidad1").val(alldata[2]);
       $("#estado1").val(alldata[3]);
       $("#foto_old1").val(alldata[4]);
       $("#foto_new1").val(alldata[5]);
       $("#descripcion1").val(alldata[6]);
       $("#tipo1").val(alldata[7]);       
       

});

$('#updateButton').click(function(){
    var id       = $("#bookId2").val();
    var nombre_a = $("#nombre_a1").val();
    var cantidad = $("#cantidad1").val();
    var estado   = $("#estado1").val();
    var foto     = $("#foto_old1").val();
    var foto_new = $("#foto_new1").val();
    var descripcion     = $("#descripcion1").val();
    var tipo     = $("#tipo1").val();
    var section = $('#section').val();

    if(nombre_a.length>2 && cantidad.length>1 && estado.length>5 && foto.length>1 && descripcion.length>3){
    var datas = new FormData(document.getElementById("updateForm"));
  console.log(datas);
  datas.append("label","photofile");
  datas.append("id",id);
  datas.append("nombre_a",nombre_a);
  datas.append("cantidad",cantidad);
  datas.append("estado",estado);
  datas.append("foto_old",foto);
  datas.append("foto_new",foto);
  datas.append("descripcion",descripcion);
  datas.append("tipo",tipo);
            $.ajax({
              url: "../model/update.php",
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
