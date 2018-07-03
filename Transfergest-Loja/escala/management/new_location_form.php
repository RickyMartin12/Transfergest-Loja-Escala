<input type="hidden" id="piechart_in">
<input type="hidden" id="piechart_out">
<input type="hidden" id="piechart_total">

<div class="panel panel-default">
<div class="panel-heading"> <h3 class="panel-title"><span class="glyphicon glyphicon-map-marker"></span> Novo Local (Origem ou Destino)</h3>
</div>

<div class="panel-body">

<div class="row"> 
<form id="form_new_location">

<div class='col-md-9 col-xs-12 form-group'>
<label>Locais *</label>
<input type="text" title="Insira local de origem ou de destino" required class="form-control" name="locations" id="locations" placeholder="Locais de Origem ou Destino *">
</div>
<div class='col-md-3 col-xs-12'>
<label>&nbsp;</label>
<p style=text-align:right;">
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-save-file" title="Guardar Novo Local"></span> <font class='hidden-xs'> Guardar</font></button>
</p>
</div>
<input type="hidden" id="tipo" name="tipo">
</form>
</div>
</div>
<div class="panel-footer"></div>
</div>

<script>

/*CRIAR NOVO LOCAL*/
$('#form_new_location').on('submit',function(e){
e.preventDefault();

$("#tipo").val($("#tipo_val").val());
local = $('#locations').val();
dataValue=$(this).serialize()+'&action=9';

$.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){

     if (data == 99){
     $('.debug-url').html('Erro, o local <b>'+local+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1){
      $('.debug-url').html('O local <b>'+local+'</b> foi criado.');
      $("#mensagem_ok").trigger('click');
      getCreatedLocations($('#tipo_val').val());
     }
   },
 error:function(){
   $('.debug-url').html('O local <b>'+local+'</b> não foi criado, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});


</script>