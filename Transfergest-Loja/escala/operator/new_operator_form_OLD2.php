<div class="panel panel-default">

<form id="form_operator" autocomplete="off">

<div class="panel-heading my-orange" style="padding: 10px 0px;">
 <div class="row" style="margin-top: 0px;margin-bottom:0px;">
  <div class="col-xs-7">
   <h3 class="panel-title" style="margin-top: 7px;"><span class="glyphicon glyphicon-tower"></span> Novo Operador</h3>
  </div>
  <div class="col-xs-5">
   <button type="submit" style="float:right; margin-left:5px;" class="btn btn-success">
   <span class="glyphicon glyphicon-save-file" title="Criar Novo Operador"></span><font class="hidden-xs"> Guardar</font></button>
   <button style="float:right;" type="reset" class="btn btn-default btn-reset">
   <span class="glyphicon glyphicon-erase" title="Limpar dados"></span><font class="hidden-xs"> Limpar</font></button>
 </div>
</div>
</div>
<div class="panel-body" id="showoperator" style='padding: 0px'>

<div class="row">

<div class='col-md-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-tower"></span></span>
<input type="text" style='text-transform:capitalize;' required value="" class="form-control" name="operatornome" id="opcol_49" placeholder="Operador *">
</div>
</div>
</div>
<div class='col-md-4 col-xs-12'>
 <div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" style='text-transform:capitalize;' required value="" class="form-control" name="operatorresponsavel" id="opcol_50" placeholder="Responsavel *">
</div>
</div>
</div>
<div class='col-md-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18">@</span>
<input type="email" required class="form-control" name="operatoremail" id="opcol_51" placeholder="Email *">
</div>
</div>
</div>


<div class='col-md-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-earphone"></span></span>
<input type="number" required class="form-control" name="operatortel" id="opcol_54" placeholder="Telefone *">
</div>
</div>
</div>

<div class='col-md-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-list-alt"></span></span>
<select class="form-control" style='color:#999;' onchange="operatorPayType(this.value)" name="operatortpcomissao" id="opcol_52">
<option value=''> Escolha o Tipo de Comissão *</option>
<option value='Percentagem'> Percentagem</option>
<option value='Fixo'> Fixo</option>
<option value='Tabela'> Tabela</option>
<option value='Tabela Percentagem'> Tabela Percentagem</option>
<option value='PorPax'> Por Pessoa</option>

</select>
</div>
</div>
</div>

<div class='col-md-4 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18 paytype">&nbsp;?&nbsp;</span>
<input type="number" min='0' max='100' step="any" required readonly="true" value="" class="form-control" name="operatorcomissao" id="opcol_53" placeholder="Comissão *">
</div>
</div>
</div>

<div class="row">

<div class='col-md-3 col-sm-6 col-xs-6' title="Aceder a Loja">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon" style='padding: 6px 14px;'><span class="glyphicon glyphicon-shopping-cart"></span></span>
<div class="form-control" style="padding: 5px 4px;">
<input type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success' name='loja' id='loja'>
</div>
</div>
</div>
</div>



<div class='col-md-9 col-sm-12 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i>
</span>
<input type="text" class="form-control" name="dominio" id="dominio" placeholder="Dominio *">
</div>
</div>
</div>


</div>

<div class='col-xs-12'>
<div style=' margin-top: 0px;margin-bottom: 10px; border-top: 2px solid #ffb231; padding-right:30px; padding-left:30px;'></div>
</div>

<div class="col-md-3 col-xs-12">
 <div class="form-group">
<div class="input-group">
<span class="input-group-addon req ft18"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" required value="" class="form-control" name="utilizador" id="utilizador" placeholder="Utilizador *">
</div>
</div>
</div>

<div class="col-md-3 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
<input type="password" required class="form-control" name="password" id="password" placeholder="Palavra-Passe *">
</div>
</div>
</div>


<div class='col-md-2 col-sm-6 col-xs-6' title="Enviar Relatórios Gestão">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon" style='padding: 6px 3px;'><span>Gestao</span></span>
<div class="form-control" style="padding: 5px 4px;">
<input type='checkbox' data-size='mini' data-off-color='danger' data-on-color='success' name='gestao' id='gestao'>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="panel-footer my-orange">
</div>
</form>
</div>

<!-- TODOS OS OPERADORES -->
<div class="panel panel-default">
<div class="panel-heading my-orange">
<h3 class="panel-title">
<span class="glyphicon glyphicon-cog"></span> Acções Operadores</h3></div>

<div id="operator-created"></div>
<div class="panel-footer my-orange"></div>
</div>


<script src='js/highlight.js'></script>
<script src='js/bootstrap-switch.min.js'></script>
<script src='js/main.js'></script>

<script>



$(function () {

    

callAllOperators();

setTimeout(function(){ $("#form_operator").trigger('reset');}, 50);

arr = JSON.parse(localStorage.getItem("operadores"));
    $("#opcol_49").autocomplete({
        source: arr,
        focus: function (event, ui) {
            event.preventDefault();
            $("#opcol_49").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#opcol_49").val(ui.item.label);
        }
    });
});

function operatorPayType(v){
if ( v == 'Percentagem' || v == 'Tabela Percentagem'){
  $('.paytype').text('%');
  document.getElementById("opcol_53").readOnly = false;
}
else if ( v =='Fixo' || v=='PorPax' ){
  /*$('.paytype').html('<span class="glyphicon glyphicon-adjust"></span>');*/
  $('.paytype').text('€');
  document.getElementById("opcol_53").readOnly = false;
}
else {
  $('.paytype').text(' ? ');
  document.getElementById("opcol_53").readOnly = true;
  $('#opcol_53').val();
}
}


$('#form_operator').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=1';
console.log(dataValue);
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      if(data == 9 ){
           $('.debug-url').html('O operador <strong class="cpt">'+$("#opcol_49").val()+'</strong>, não foi adicionado já existe.');
          $("#mensagem_ko").trigger('click');
      }
      else if (data == 0){
        $('.debug-url').html('O operador <strong class="cpt">'+$("#opcol_49").val()+'</strong>, não foi adicionado!');
        $("#mensagem_ko").trigger('click');
      }
      
      else if(data == 1){
        $('.debug-url').html('O operador <strong class="cpt">'+$("#opcol_49").val()+'</strong>, foi adicionado com sucesso.');
        $("#mensagem_ok").trigger('click');
        clearForm();
        callAllOperators();
        setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        
      }
    },
    error: function(){
      $('.debug-url').html('O operador não foi adicionado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
});




function callAllOperators(){
p='';
val='';
tipo='';

$('.back').fadeIn();
 setTimeout(function(){ 
dataValue='&action=3';
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST', 
    cache:false,
    success: function(data){
      $('.back').fadeOut();
      arr = JSON.parse(data);

      if (arr == null || arr.length < 1)
      {
        $('.debug-url').html('Não foi possivel obter operadores, têm que ser criados.');
        $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++)
        {

nome = '"'+arr[i].nome+'"';
arr[i].gestao == 'checked' ? gestao = "<p class='acess-active-cont-"+arr[i].id+"-gestao' style='margin:0; text-align:center;'><button onclick='acessActivate(1,"+arr[i].id+",1)' class='acess-active-"+arr[i].id+" btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open'></span></button></p>" : gestao = "<p class='acess-active-cont-"+arr[i].id+"-gestao'  style='margin:0; text-align:center;'><button onclick='acessActivate(1,"+arr[i].id+",0)' class='acess-active-"+arr[i].id+" btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-close'></span></button></p>";

arr[i].loja == 'checked' ?  loja = "<p class='acess-active-cont-"+arr[i].id+"-loja' style='margin:0; text-align:center;'><button onclick='acessActivate(2,"+arr[i].id+",1)' class='acess-active-"+arr[i].id+" btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open'></span></button></p>" : loja = "<p class='acess-active-cont-"+arr[i].id+"-loja'  style='margin:0; text-align:center;'><button onclick='acessActivate(2,"+arr[i].id+",0)' class='acess-active-"+arr[i].id+" btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-close'></span></button></p>";



if(arr[i].tipo == 'Fixo' || arr[i].tipo =='PorPax' ){
val = '€' ;
comissao = parseFloat(arr[i].comissao).toFixed(2)+val;

!arr[i].comissao || arr[i].comissao == 0 ? comissao ='-/-' : comissao = arr[i].comissao+val;
}

else if(arr[i].tipo == 'Tabela Percentagem' || arr[i].tipo =='Percentagem' ){
val = '%';

!arr[i].comissao || arr[i].comissao == 0 ? comissao ='-/-' : comissao = arr[i].comissao+val;
}

else
comissao ='-/-';

arr[i].tipo == 'PorPax' ? tipo = 'Por Pessoa' : tipo = arr[i].tipo;

p +="<tr class='edit-oper-"+arr[i].id+"'><td scope='row'><input type='text' value='"+arr[i].nome+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].nome+"</font></td><td><input type='text' value='"+arr[i].responsavel+"' id='col-2-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].responsavel+"</font></td><td><input type='number' step='any' min='0' max='100' value='"+arr[i].comissao+"' id='col-3-"+arr[i].id+"' class='frm-item form-control'/><font>"+comissao+"</font></td><td><input type='email' value='"+arr[i].email+"' id='col-4-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].email+"</font></td><td><input type='number' value='"+arr[i].tel+"' id='col-5-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].tel+"</font></td><td><select class='frm-item form-control' id='col-6-"+arr[i].id+"'><option value='"+arr[i].tipo+"'>"+tipo+"</option><option value='Percentagem'> Percentagem</option><option value='Fixo'> Fixo</option><option value='Tabela'> Tabela</option><option value='Tabela Percentagem'> Tabela Percentagem</option><option value='PorPax'> Por Pessoa</option></select><font>"+tipo+"</font></td><td><input type='text' value='"+arr[i].utilizador+"' id='col-7-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].utilizador+"</font></td><td><input type='text' value='"+arr[i].dominio+"' id='col-8-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].dominio+"</font></td><td class='edit-pass-"+arr[i].id+"'><input type='password' id='col-12-"+arr[i].id+"' class='frm-item form-control'/><font>******</font></td><td>"+gestao+"</td><td>"+loja+"</td><td id='action-"+arr[i].id+"'style='width:80px;'><div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Operador' class='btn btn-danger btn-sm' onclick='confirmDeleteOperator("+arr[i].id+","+nome+")'><span class='glyphicon glyphicon-trash'></span></button><button title='Editar Password' class='btn btn-sm btn-warning' onclick='EditNewPasswordOperator("+arr[i].id+")'><span class='glyphicon glyphicon-lock'></span></button><button class='btn btn-info btn-sm' title='Editar Código' onclick='showFrmOperator("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></td></tr>";
}

$("#operator-created").html("<div class='table-responsive'><table class='table table-striped' style='margin-bottom:0px;'><thead class='my-gray'><tr><th  class='bdr-w'>Operador</th><th class='bdr-w'>Responsável</th><th class='bdr-w'>Valor</th><th class='bdr-w'>Email</th><th class='bdr-w'>Telefone</th><th class='bdr-w'>Tipo</th><th class='bdr-w'>Utilizador</th><th class='bdr-w'>Dominio</th><th class='bdr-w'>Password</th><th class='bdr-w'>Gestão</th><th class='bdr-w'>Loja</th><th style='text-align: center; min-width:80px'>Acções</th></tr></thead><tbody>"+p+"</tbody></table></div>");
      }
    },
    error:function(data){
        $('#Modalko .debug-url').html('Não foi possivel obter dados Operadores, verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
         $('.back').fadeOut();
      }
    });

}, 1000);
}





function confirmDeleteOperator(id,nome){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o operador <strong>"+nome+"</strong>",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-trash'></span> Apagar",
      className: "btn-danger",
      callback: function() {
    dataValue='id='+id+'&action=2';
     $.ajax({
      type: "POST",
      url: "operator/action_operator.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){
          callAllOperators();
          $('#Modalok .debug-url').html('O operador <strong>'+nome+'</strong> foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('O operador <strong>'+nome+'</strong> não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });

      }
    },
  }
});
}




/* ALTERAR PASSWORD DO OPERADOR */

function saveOperatorPassword(id){
if ($('#col-12-'+id).val().length < 4){
      $('.debug-url').html('A password tem que ter pelo menos 4 caracteres!');
      $("#mensagem_ko").trigger('click');
   }

 else{

  pass= $('#col-12-'+id).val();
  dataValue = 'id='+id+'&password='+pass+'&action=13';
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      if (data == 0 ){
        $('.debug-url').html('Erro, ao modificar a password!');
        $("#mensagem_ko").trigger('click');
      }
      else if (data == 1 ){
        $('.debug-url').html('A password foi modificada com sucesso.');
        $("#mensagem_ok").trigger('click');
        cancelNewPasswordOperator(id);
        setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar a password, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}
}

/* ABRE CAMPO E BOTOES PARA EDITAR PASSWORD OPERADOR*/

function EditNewPasswordOperator(id){
  $('.edit-pass-'+id).addClass('w3-pale-green');
    $(" #col-12-"+id).show().next().hide();
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar Password' class='btn btn-sm btn-success safe_it' onclick='saveOperatorPassword("+id+");'><span class='glyphicon glyphicon-lock'></span></button><button title='Fechar Edição' class='btn btn-sm btn-default' onclick='cancelNewPasswordOperator("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}


/*FECHA CAMPO PASSWORD E REPOE BOTOES DE NORMAIS*/

function cancelNewPasswordOperator(id){
  $('.edit-pass-'+id).removeClass('w3-pale-green');
    $(" #col-12-"+id).hide().next().show();
 $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar operador' class='btn btn-danger btn-sm' onclick='confirmDeleteOperator("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button title='Editar Password' class='btn btn-sm btn-warning' onclick='EditNewPasswordOperator("+id+")'><span class='glyphicon glyphicon-lock'></span></button><button class='btn btn-sm btn-info' title='Editar operador' onclick='showFrmOperator("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}




/*MOSTRAR OS CAMPOS PARA EDIÇAO OPERADORES*/

function showFrmOperator(id){
  $('.edit-oper-'+id).addClass('w3-pale-green');
  for(i=1;i<9;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-sm btn-success safe_it' onclick='saveItemOperator("+id+");'><span class='glyphicon glyphicon-save-file'></span></button><button title='Fechar Edição' class='btn btn-sm btn-default' onclick='cancelOperator("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO OPERADORES*/

function cancelOperator(id){
  $('.edit-oper-'+id).removeClass('w3-pale-green');
   for(i=1;i<9;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
     nome = '"'+$("#col-1-"+id).val()+'"';
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar operador' class='btn btn-danger btn-sm' onclick='confirmDeleteOperator("+id+","+nome+")'><span class='glyphicon glyphicon-trash'></span></button><button title='Editar Password' class='btn btn-sm btn-warning' onclick='EditNewPasswordOperator("+id+")'><span class='glyphicon glyphicon-lock'></span></button><button class='btn btn-sm btn-info' title='Editar operador' onclick='showFrmOperator("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
  }


/* EDITAR/ALTERAÇÃO CAMPOS OPERADORES  */

function saveItemOperator(id){
  nome = $("#col-1-"+id).val();
  $('#col-6-'+id).val() == 'Tabela' ? $('#col-3-'+id).val('') : false;

  var dataValue='';
  for(i=1;i<9;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="nome="+nome+"&id="+id+"&action=4";
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){

      if (data == 9 ){
        $('.debug-url').html('Erro, já existe um operador com o nome <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if (data == 0 ){
        $('.debug-url').html('Erro, ao modificar o operador <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');
     }
    else if(data == 11){
      callAllOperators();
      $('.debug-url').html('O operador <b>'+nome+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('O operador <b>'+nome+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}



/*ACTIVAR E DESATIVAR FUNCIONALIDADES/ACESSOS AOS OPERADORES */

function acessActivate(tp,id,val){

val == 1 ? vals='checked' : vals='false';

if (tp == 1) tps = 'gestao';
if (tp == 2) tps = 'loja';

  dataValue='&id='+id+'&val='+vals+'&tp='+tps+'&action=14';

  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){

      arr = JSON.parse(data);
      if (arr == null || arr.length < 1){}
     else{
     if (arr[0].response == 1) {

     arr[0].val == 'checked' ?

$('.acess-active-cont-'+id+'-'+arr[0].tipo).html("<button onclick='acessActivate("+tp+","+id+",1)' class='acess-active-"+id+" btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open'></span></button>") : $('.acess-active-cont-'+id+'-'+arr[0].tipo).html("<button onclick='acessActivate("+tp+","+id+",0)' class='promo-active-"+id+" btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-close'></span></button>");

   }
    if (arr[0].response == 0) {
     $('.debug-url').html('Erro ao modificar o tipo de acesso, p.f. tente novamente mais tarde.');
     $("#mensagem_ko").trigger('click');
   }
  }
},
    error:function(data){
     $('.debug-url').html('Erro ao modificar o tipo de acesso, verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');
}
    });
}


</script>