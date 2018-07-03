<form id="form_new_transfer">
<div class='row'>
<div class='col-md-6 col-xs-12'>
<div class="form-group">
  <select required type="text"class="form-control" onchange='originDestinationCheck()' name="origem_local" id="origem_local">
  <option value="">Escolha: O local de origem</option>
</select>   
</div>
</div>

<div class='col-md-6 col-xs-12'>
<div class="form-group">
<label> Tours </label>
       <select required class="form-control" onchange='originDestinationCheck()' name="destino_local" id="destino_local">
<option value="">Escolha: O local de destino</option>
       <select>
   </div>
</div>


<!--
<div class='col-md-3 col-xs-6'>
   <div class="form-group">
       <input type="number" step="any" title="1234.56" required class="form-control" name="pax_1" id="pax_1" placeholder="Preço 1 a 4*">
   </div>
</div>
<div class='col-md-3 col-xs-6'>
   <div class="form-group">
       <input type="number" step="any" title="1234.56" required class="form-control" name="pax_2" id="pax_2" placeholder="Preço 5 a 8">
   </div>
</div>
<div class='col-md-3 col-xs-6'>
   <div class="form-group">
       <input type="number" step="any" title="1234.56" class="form-control" name="pax_3" id="pax_3" placeholder="Preço 9 a 12">
   </div>
</div>
<div class='col-md-3 col-xs-6'>
   <div class="form-group">
       <input type="number" step="any" title="1234.56" class="form-control" name="pax_4" id="pax_4" placeholder="Preço 13 a 16">
   </div>
</div>
-->

<div class='col-xs-6'>
<div class="form-group">
<select required class="form-control" name="visivel" id="visivel">
<option value="">Escolha: Visivel para Compra *</option>
<option value="1">Sim</option>
<option value="0">Não</option>
</select>
</div>
</div>

<input type="hidden" id="set_categoria" name="categoria"> 

<div class='col-xs-6'>
<p style='text-align:right;'>
  <button class="new_prod btn btn-success disabled">
  <span class="glyphicon glyphicon-save-file" title="Guardar novo Produto"></span> Guardar</button>
</p>
</div>

</div>
</form>

<script>


function originDestinationCheck(){
origem = $("#origem_local").val();
destino = $("#destino_local").val();
origem != destino && origem && destino ? $('.new_prod').prop('type', 'submit').removeClass('disabled'): false;
}

/*CRIAR NOVO LOCAL*/
$('#form_new_transfer').on('submit',function(e){
e.preventDefault();


$('#set_categoria').val($('categoria').val());

origem = $("#origem_local").val();
destino = $("#destino_local").val();
dataValue=$(this).serialize()+'&action=1';
 $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data.match(/99/g)){
     $('.debug-url').html('Erro, produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data.match(/0/g)){
     $('.debug-url').html('Erro, ao criar o produto com origem em <b>'+origem+' </b> e destino em <strong>'+destino+'</strong>.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data.match(/1/g)){
      $('.debug-url').html('O produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> foi criado.');
     $("#mensagem_ok").trigger('click');
    $('#pax_1, #pax_2, #pax_3, #pax_4, #origem_local, #destino_local, #categoria').val('');
     }
   },
 error:function(){
   $('.debug-url').html('O produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> não foi criado, p.f. verifique a ligação wi-fi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});


</script>