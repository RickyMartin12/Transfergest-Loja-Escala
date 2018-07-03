<input type="hidden" id="piechart_in">
<input type="hidden" id="piechart_out">
<input type="hidden" id="piechart_total">
<form id="form_new_categoria">
<div class="panel panel-default">
<div class="panel-heading my-orange" style="padding: 10px 0px;">
<div class="row" style="margin-top: 0px;margin-bottom:0px;">
<div class="col-xs-6">
<h3 class="panel-title" style='margin-top: 7px;'><span class="glyphicon glyphicon-plus"></span> Nova Categoria 12</h3>
</div>
<div class="col-xs-6">
<p style="text-align:right;">
  <button type="submit" style="float: right;" class="btn btn-success">
  <span class="glyphicon glyphicon-save-file" title="Guardar Nova Categoria"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>
</div>
</div>

<div class="panel-body">
<div class="row"> 
<div class='col-md-4 col-xs-12 form-group'>
<input type="text" title="Insira Nome da Categoria a que os produtos pertencem" required class="form-control" name="categoria" id="categoria" placeholder="Categoria *">
</div>

<div class='col-md-4 col-xs-12 form-group '>
<select required type="text" class="form-control" name='tipo' id='tipo_form'>
<option value="" selected disabled>Tipo Formulário *</option>
<option value="1"> Transfers</option>
<!--
<option value="2"> Golf</option>
<option value="3"> Passeios</option>
<option value="4"> Bilhetes</option>
<option value="5"> Hora</option>
<option value="6"> Quilometro</option>
-->
</select>
</div>


<div class='col-md-4  col-xs-12 form-group'>
<select required class="form-control" name="visivel" id="visivel">
<option value='' selected disabled>Visivel *</option>
<option value='1'>Sim</option>
<option value='0'>Não</option>
</select>
</div>
</div>
</div>
<div class="panel-footer my-orange"></div>
</div>

</form>

<div id="insert_result"></div>
<script>

/*CRIAR NOVA CATEGORIA*/
$('#form_new_categoria').on('submit',function(e){
e.preventDefault();
categoria = $('#categoria').val();
dataValue=$(this).serialize()+'&action=14';
$.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data == 99){
     $('.debug-url').html('Erro, a categoria <b>'+categoria+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1 ){
      $('.debug-url').html('A categoria <b>'+categoria+'</b> foi criada.');
      $("#mensagem_ok").trigger('click');
      $('#categoria, #visivel, #tipo_form').val('');
      getCreatedCategorias();
     }
   },
 error:function(){
   $('.debug-url').html('A categoria <b>'+categoria+'</b> não foi criada, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});
</script>