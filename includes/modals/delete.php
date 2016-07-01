<!-- En esta sección se cargo la ventana modal de delete, la cual es la misma para todos los módulos donde se requiera-->
<div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar</h4><!-- Mensaje de la venta DELETE-->
      </div>
      <div class="modal-body">
    <form id="fileinfo1" enctype= "multipart/form-data" onsubmit="return submitForm();">
    <div class="modal-body">
          <input type="hidden" name="bookId" id="bookId1" value=""/>
          <strong><p>Estás seguro que deseas eliminar</p></strong> <!-- Al presionar el botón de eliminar, se envía este 
                                                                      mensaje para corroborar que se quiera realizar esta
                                                                      acción, se podrá afirmar dicha acción dando clic en
                                                                      el botón si, o revertir la acción dando clic en el
                                                                      botón no-->
      </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="submit" id="deletefunction" class="btn btn-danger" data-dismiss="modal">Si</button>
      </div>
    </div>
  </div>
</div>

<script>

  //Se manda a llamar función de delete
  $(document).on("click", "#delete", function () {
     var id = $(this).data('id');
       $("#bookId1").val(id);
});



$('#deletefunction').click(function(){
  var id = $(this).data('id');
  var section = $('#section').val();
  var datas = new FormData(document.getElementById("fileinfo1"));
  datas.append("id",id);
  datas.append("section",section);
            $.ajax({
              url: "../model/delete.php", //Se manda a llamar la consulta SQL necesaria para poder eliminar
              type: "POST",
              data: datas,
              enctype: 'multipart/form-data',
              processData: false,  // tell jQuery not to process the data
              contentType: false   // tell jQuery not to set contentType
            }).done(function( data ) {
                $('#info').html(data);
          viewdata(section);
            });
            $('#deleteModal').modal('hide'); //Al presionar en los botones "si" o "no" la ventana modal se esconde
            return false;      
    });

</script>