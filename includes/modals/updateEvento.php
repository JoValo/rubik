<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresar nuevo <?php echo $section ?></h4>
      </div>
      <div class="modal-body">  
      <form id="updateFormEvento" enctype= "multipart/form-data" onsubmit="return submitForm();">
       <div class="form-group">
          <label for="nombre_a">Numero del evento</label>
          <input type="text" class=" form-control" id="bookId2" maxlength="40" required disabled="true">
        </div>
        <div class="form-group">
          <label for="nombre_a">Nombre del evento</label>
          <input type="text" class="solo-letras form-control" id="nombre_e1" maxlength="40" required >
        </div>
        <div id="compracion_articulo"></div>
        <div class="form-group">
          <label for="descripcion">Lugar del evento</label>
          <input type="text" class="solo-letras form-control" id="lugar_e1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="">Horario del evento</label>
          <input type="text" id="horario1" maxlength="40" required disabled="true">
        </div>
        <div class="form-group">
          <label for="">Horario del evento</label>
          <input type="time" id="horarion1" maxlength="40" required >
        </div>
        <div class="form-group">
          <label for="">Fecha del evento</label>
          <input type="text"  id="fecha1" min="2016-06-22" required disabled="true">
        </div>
        <div class="form-group">
          <label for="">Fecha del evento</label>
          <input type="date"  id="fechan1" min="2016-06-22" required >
        </div>
        <div class="form-group">
          <label for="stock">Direccion</label>
          <input type="text" class="form-control" id="direccion1" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="stock">Cliente</label>
          <select name="empleado" class="form-control" id="id_cliente1">
            <option value="101">101</option>
            <option value="141">141</option>
          </select>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" id="updateEvento" data-dismiss="modal" class="btn btn-primary">
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
       $("#nombre_e1").val(alldata[1]);
       $("#lugar_e1").val(alldata[2]);
       $("#horario1").val(alldata[3]);
       $("#fecha1").val(alldata[4]);
       $("#direccion1").val(alldata[5]);
       $("#id_cliente1 option[value="+alldata[6]+"]").attr("selected");  
       $("#id_cliente1 option[value="+alldata[7]+"]").attr("selected");
           
});

$('#updateEvento').click(function(){
    var id          = $("#bookId2").val();
    var nombre      = $("#nombre_e1").val();
    var lugar       = $("#lugar_e1").val();
    var horario     = $("#horarion1").val();
    var fecha       = $("#fechan1").val();
    var direccion   = $('#direccion1').val();
    var id_cliente  = $("#id_cliente1").val();
    var section     = $('#section').val();

    if(nombre.length>2 && lugar.length>5 && horario.length>1 && direccion.length>5){
    var datas = new FormData(document.getElementById("updateFormEvento"));
            console.log(datas);
            datas.append("id",id);
            datas.append("nombre",nombre);
            datas.append("lugar",lugar);
            datas.append("horario",horario);
            datas.append("fecha",fecha);
            datas.append("direccion",direccion);
            datas.append("id_cliente",id_cliente);
            
            
            $.ajax({
              url: "../model/updateEvento.php",
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
