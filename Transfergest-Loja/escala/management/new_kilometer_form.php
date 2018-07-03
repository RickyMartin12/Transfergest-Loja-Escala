<form id="form_new_transfer">
<div class='row'>
<h3 style="text-align:center; margin: -5px 0px 15px 0px;">Criar produto <b> Ao Kilometro</b></h3>

<div class='col-md-10 col-xs-12 form-group'>
<label>Nome do produto *</label>
  <input required type="text"class="form-control"  name="origem_local" id="nome_prod">  
</div>


<div class='col-md-2 col-xs-12 form-group'>
<label title="Se o produto pode ser adquirido on-line pelo cliente.">Visivel online *</label>
<select required class="form-control" name="visivel" id="visivel">
<option value="">Escolha</option>
<option value="1">Sim</option>
<option value="0">Não</option>
</select>
</div>

<!-- APENSOS VALORES CLASSES-->

<div id="class_type"></div>

<input type="hidden" id="tipo" name="tipo"> 
<input type="hidden" id="categoria" name="categoria"> 

<div class='col-xs-6 col-xs-offset-6'>
<p style='text-align:right;'>
  <button type='submit' class="new_prod btn btn-success">
  <span class="glyphicon glyphicon-save-file" title="Guardar novo Produto"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>

</div>
</form>
<script>

setTimeout(function(){
getClassesLabels();

$.ajax({url: "../management/call_action_management.php"})
 .done(function( html ) { $( "#add_type_edit" ).html(html);});
}, 500);



$(function () {
$('.criar_novo_local').hide();
$('.criar_nova_rota').attr('title','Criar novo produto');
$('.criar_nova_rota').html('<span class="glyphicon glyphicon-tag"></span> Produto');
});


function getClassesLabels(){
    dataValue="categoria="+$('#cat_val').val()+"&tipo="+$('#tipo_val').val()+"&action=19";
    $.ajax({
    url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     arr=[];
     arr =  JSON.parse(data);      
     if (arr == null || arr.length < 1){}
     else {
        for(i=0;i<arr.length;i++){
if (i==0){
$("#class_type").append("<div class='col-md-3 col-xs-6 form-group'><label>"+arr[i].nome+" *</label><input type='number' step='any' min='0' required class='form-control tag' name='tag-0-"+i+"' id='tag-0-"+i+"' placeholder='Insira preço kilometro *'><input id='tag-1-"+i+"' name='tag-1-"+i+"' type='hidden' value='"+arr[i].id+"'></div>");}

else{
$("#class_type").append("<div class='col-md-3 col-xs-6 form-group'><label>"+arr[i].nome+"</label><input type='number' step='any' min='0' class='form-control tag' name='tag-0-"+i+"' id='tag-0-"+i+"' placeholder='Insira preço kilometro'><input id='tag-1-"+i+"' name='tag-1-"+i+"' type='hidden' value='"+arr[i].id+"'></div>");
}
}
}
 },
    error:function(data){
      $('.debug-url').html('Erro ao obter as classes do produto, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
    });
}




/*CRIAR NOVO PRODUTO TRANSFER*/
$('#form_new_transfer').on('submit',function(e){
e.preventDefault();

$('#categoria').val($('#cat_val').val());

alert($('#categoria').val());

$('#tipo').val($('#tipo_val').val());
origem = $("#nome_prod").val();
end_stamp=1800;

dataValue=$(this).serialize()+'&action=1&duracao='+end_stamp;

 $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     if (data == 99){
     $('.debug-url').html('Erro, um produto com o nome, <b>'+origem+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data == 0 ){
     $('.debug-url').html('Erro, ao criar o produto com origem em <b>'+origem+' </b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1 ){
     $('.debug-url').html('O produto foi criado.');
     $("#mensagem_ok").trigger('click');
     document.getElementById("form_new_transfer").reset();
    }
   },
 error:function(){
   $('.debug-url').html('O produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> não foi criado, p.f. verifique a ligação wi-fi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});

</script>