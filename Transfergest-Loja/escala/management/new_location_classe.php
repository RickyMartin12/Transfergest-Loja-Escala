<div class="panel panel-default">
<div class="panel-heading"> <h3 class="panel-title"><span class='glyphicon glyphicon-paperclip'></span> Nova Classe</h3></div>
<div class="panel-body">
<div class="row"> 
<form id="form_new_classe">
<div class='col-md-8 col-xs-12 form-group'>
<label title='Etiqueta para a Classe do produto (Ex: 1-4 pax, Executivo 1-4pax)'>Nome Classe *</label>
<input type="text" title="Insira Nome da Classe" required class="form-control" name="classe" id="classe" placeholder="Classe *">
</div>
<div class='col-md-2 col-xs-6 form-group'>
<label title='Min. de pessoas permitido para esta classe, afecta a pesquisa na loja'>Min.Pessoas *</label>
<input type="number" min='0' title="Insira Minimo pessoas permitido" required class="form-control" name="classe-min" id="classe-min" placeholder="Minimo *">
</div>
<div class='col-md-2 col-xs-6 form-group'>
<label title='Máx. de pessoas permitido para esta classe, afecta a pesquisa na loja'>Máx.Pessoas *</label>
<input type="number" min='0' title="Insira Máximo pessoas permitido" required class="form-control" name="classe-max" id="classe-max" placeholder="Máximo *">
</div>
<div class='col-md-12 col-xs-12'>
<label>&nbsp;</label>
<p style=text-align:right;">
<button type="submit" class="btn btn-success">
<span class="glyphicon glyphicon-save-file" title="Guardar Nova Classe"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
<input type="hidden" name="tipo" id="tipo">
<input type="hidden" name="categoria" id="categoria">
</form>
</div>
</div>
<div class="panel-footer"></div>
</div>

<script>

/*CRIAR NOVA CLASSE*/
$('#form_new_classe').on('submit',function(e){
e.preventDefault();

classe = $('#classe').val();
$('#tipo').val($("#tipo_val").val());
$('#categoria').val($("#cat_val").val());

dataValue=$(this).serialize()+'&action=18';
$.ajax({ url:'management/action.php',
data:dataValue,
    type:'POST', 
    success:function(data){
      if (data == 1){

      $('.debug-url').html('A classe <b>'+classe+'</b> foi criada.');
      $("#mensagem_ok").trigger('click');

      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);

      $('#classe').val('');
      getCreatedClasses($("#tipo_val").val(),$("#cat_val").val());

     }
   },
 error:function(){
   $('.debug-url').html('A classe <b>'+classe+'</b> não foi criada, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});


</script>