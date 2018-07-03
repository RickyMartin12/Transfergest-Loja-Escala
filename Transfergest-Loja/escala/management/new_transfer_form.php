<input type="hidden" id="piechart_in">
<input type="hidden" id="piechart_out">
<input type="hidden" id="piechart_total">

<form id="form_new_transfer">
<div class='row'>
<h3 style="text-align:center; margin: -5px 0px 15px 0px;">Criar rota de: <b>Transfer</b></h3>
<div class='col-md-4 col-xs-12 form-group'>
<label>Local Origem *</label>
  <select required type="text"class="form-control" onchange='originDestinationCheck()' name="origem_local" id="origem_local">
  <option value="">Escolha</option>
</select>   
</div>

<div class='col-md-4 col-xs-12 form-group'>
<label>Local Destino *</label>
       <select required class="form-control" onchange='originDestinationCheck()' name="destino_local" id="destino_local">
<option value="">Escolha</option>
       <select>
   </div>

<div class='col-md-2 col-xs-6 form-group'>
<label class="control-label" title="Tempo do serviço/transfers.(visivel na Régua)">Duração (hh:mm)</label>
<input type="text" value="00:30" style="border-radius:4px;" class="form-control" id="duracao" placeholder="Duração">
</div>

<div class='col-md-2 col-xs-6 form-group'>
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
  <button type='submit' class="new_prod btn btn-success disabled">
  <span class="glyphicon glyphicon-save-file" title="Guardar novo Produto"></span><font class='hidden-xs'> Guardar</font></button>
</p>
</div>

</div>
</form>
<script>

setTimeout(function(){

getClassesLabels();
$.ajax({url: "management/call_action_management.php"})
 .done(function( html ) { $( "#add_type_edit" ).html(html);});
}, 500);


$(function () {
$('#duracao').datetimepicker({format: 'HH:mm',
collapse:false,
sideBySide:true,
useCurrent:false});

$('.criar_novo_local').show();
$('.criar_nova_rota').attr('title','Criar nova rota');
$('.criar_nova_rota').html('<span class="glyphicon glyphicon-tag"></span> Rota');
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
$("#class_type").append("<div class='col-md-3 col-xs-6 form-group'><label>"+arr[i].nome+" *</label><input type='number' step='any' min='0' required class='form-control tag' name='tag-0-"+i+"' id='tag-0-"+i+"' placeholder='"+arr[i].nome+" *'><input id='tag-1-"+i+"' name='tag-1-"+i+"' type='hidden' value='"+arr[i].id+"'></div>");}

else{
$("#class_type").append("<div class='col-md-3 col-xs-6 form-group'><label>"+arr[i].nome+"</label><input type='number' step='any' min='0' class='form-control tag' name='tag-0-"+i+"' id='tag-0-"+i+"' placeholder='"+arr[i].nome+"'><input id='tag-1-"+i+"' name='tag-1-"+i+"' type='hidden' value='"+arr[i].id+"'></div>");
}
}

}
 },
    error:function(data){
      $('.debug-url').html('Erro ao obter os locais, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
    });
}


function originDestinationCheck(){
origem = $("#origem_local").val();
destino = $("#destino_local").val();
origem != destino && origem && destino ? $('.new_prod').prop('type', 'submit').removeClass('disabled'): false;
}


/*CRIAR NOVO PRODUTO TRANSFER*/
$('#form_new_transfer').on('submit',function(e){
e.preventDefault();


$('#categoria').val($('#cat_val').val());
$('#tipo').val($('#tipo_val').val());
origem = $("#origem_local").val();
destino = $("#destino_local").val();

end_stamp=1800;
if ($('#duracao').val())
{
stamp = $('#duracao').val().split(":");
!stamp ? stamp ='00:30' : stamp=stamp;
end_stamp = (stamp[0]*60*60)+(stamp[1]*60);
}

dataValue=$(this).serialize()+'&action=1&duracao='+end_stamp;

 $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){

     if (data == 99){
     $('.debug-url').html('Erro, produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> já existe.');
     $("#mensagem_ko").trigger('click');
     }
     else if (data == 0 ){
     $('.debug-url').html('Erro, ao criar o produto com origem em <b>'+origem+' </b> e destino em <strong>'+destino+'</strong>.');
     $("#mensagem_ko").trigger('click');
     }
    else if (data == 1 ){
     $('.debug-url').html('O produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> foi criado.');
     $("#mensagem_ok").trigger('click');
     document.getElementById("form_new_transfer").reset();
     $('#duracao').val("00:30");
    }
   },
 error:function(){
   $('.debug-url').html('O produto com origem em <b>'+origem+'</b> e destino em <strong>'+destino+'</strong> não foi criado, p.f. verifique a ligação wi-fi.');
    $("#mensagem_ko").trigger('click');
    }
  });
});


</script>