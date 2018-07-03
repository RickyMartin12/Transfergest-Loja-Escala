function confirmDeleteOperatorLocations(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o local do operador #<strong>"+id+"</strong>",
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
      cache:false,
      url: "operator_locations/action_operator_locations.php",
      data: dataValue,
      success: function(data){
        if(data == 2){
          $('#del_loc_op_'+id).empty();
          $('#Modalok .debug-url').html('O local do operador #'+id+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('O local do operador #'+id+' não foi apagado, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });

      }
    },
  }
});
}

/*CARREGA PHP COM FORMULARIO PARA NOVO LOCAL DE OPERADOR*/
function callNewOperatorLocationsForm(){
$('#insert-action').empty();
      $.ajax({url: "operator_locations/new_operator_locations_form.php",error:function(){
$('#Modalko .debug-url').html('Erro ao obter o formulário de novo local de operadores, p.f. verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $('.back').fadeOut(); $('#insert-action').empty(); $( "#insert" ).html(html);callOperatorToLocations();callOperatorLocationsActions();});
}

/*
*
*MENU BOTÃO OPERADOR ACÇÕES
*
*/


/*OBTEM TODOS OS LOCAIS OPERADORES*/
function callOperatorLocationsActions(){
$('#insert-action').empty();
      $.ajax({url: "operator_locations/call_operator_locations_actions.php",error:function(){
$('.debug-url').html('Erro ao obter os dados dos locais dos operadores, p.f. verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');
$('#Modalko .back').fadeOut();}
})
      .done(function( html ) { $('.back').fadeOut(); $( "#insert-action" ).html(html);});
}

function callOperatorToLocations(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=5';
     $.ajax({ url:'operator_locations/action_operator_locations.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontrados operadores para adicionar ao Local, p.f. crie os operadores.');
      $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++){
          if (arr[i].nome)
            $('#loccol_1').append("<option value='"+arr[i].id+"/"+arr[i].nome+"'>"+arr[i].nome+"</option>");
        }
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados dos operadores, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}


/*FILTRO PARA TODOS LOCAIS DO OPERADOR PARA ACÇÕES APAGAR E EDIÇÃO*/

function callOperatorLocationsFilter(vl){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=3&id='+vl;
     $.ajax({ url:'operator_locations/action_operator_locations.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
        $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $("#showteam").empty().append("<div class='col-xs-10 col-xs-offset-1'><h3 style='margin-top: 10px; text-align:center;'>Não existem locais de operadores criados.<br/></h3></div>");
       $("#delete_team").empty();
      }
      else {
        $("#delete_team").empty().html("<div class='row'><div class='bd col-xs-1 col-md-1'><label>ID</label></div><div class='bd col-md-3 col-xs-12'><label> Local Recolha</label></div><div class='bd col-md-4 col-xs-12'><label> Pt.Ref Recolha</label></div><div class='bd col-md-2 col-xs-12'><label> Operador</label></div><div class='bd col-md-2 col-xs-12'><label> Acções</label></div></div>");
        for(i=0;i<arr.length;i++){
          nome = arr[i].nome;
          id = arr[i].id;
          $("#delete_team").append("<div class='row vehicle' id='del_loc_op_"+id+"'><div class='bd col-xs-1 col-md-1' style='height:45px;'><input style='cursor:not-allowed;' type='text' id='col-0-"+id+"' class='frm-item form-control' readonly='true' value='"+id+"'><font>"+id+"</font></div><div class='bd col-md-3 col-xs-12' style='height:45px;'><input type='text' value='"+arr[i].local_recolha+"' id='col-1-"+id+"' class='frm-item form-control'><font>"+arr[i].local_recolha+"</font></div><div class='bd col-md-4 col-xs-12' style='height:45px;'><input type='text' value='"+arr[i].pt_ref_recolha+"' id='col-2-"+id+"' class='frm-item form-control'><font>"+arr[i].pt_ref_recolha+"</font></div><div class='bd col-md-2 col-xs-12'style='height:45px;'><input type='text' style='cursor:not-allowed;' readonly='true' value='"+arr[i].operador_nome+"' id='col-3-"+id+"' class='frm-item form-control'><font>"+arr[i].operador_nome+"</font></div><div class='bd col-md-2 col-xs-12' id='action-"+id+"'><div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Local Operador' class='btn btn-sm btn-danger' onclick='confirmDeleteOperatorLocations("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-sm btn-info' title='Editar Local Operador' onclick='showFrmOperatorLocations("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div>");
      }
    }
    },
    error:function(data){
      $(".back").fadeOut();
      $('#Modalko .debug-url').html('Erro ao obter dados dos locais dos operadores, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    
    }
  });
}, 500);
}

/*MOSTRAR OS CAMPOS PARA EDIÇAO LOCAIS OPERADORES*/
function showFrmOperatorLocations(id){
  for(i=0;i<4;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-sm btn-success safe_it' onclick='saveItemOperatorLocations("+id+")' title='Guardar'><span class='glyphicon glyphicon-save-file'></span></button><button  class='btn btn-sm btn-default' onclick='cancelOperatorLocations("+id+")' title='Fechar edição'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}


/*FECHAR OS CAMPOS DE EDIÇÃO LOCAIS OPERADORES*/
function cancelOperatorLocations(id){
   for(i=0;i<4;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Local Operador' class='btn btn-sm btn-danger' onclick='confirmDeleteOperatorLocations("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-sm btn-info' title='Editar Local Operador' onclick='showFrmOperatorLocations("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
  }

/* EDITAR/ALTERAÇÃO GRAVAR LOCAIS OPERADORES  */
function saveItemOperatorLocations(id){
  nome = $("#col-2-"+id).val();
  var dataValue='';
  for(i=1;i<4;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }

  dataValue+="id="+id+"&action=4";
 $.ajax({ url:'operator_locations/action_operator_locations.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
  arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('.debug-url').html('Erro, ao modificar o local do operador: <b>'+nome+'</b>!');
        $("#mensagem_ko").trigger('click');}
 else{
i=0;
$("#del_loc_op_"+id).html("<div class='bd col-xs-1 col-md-1' style='height:45px;'><input style='cursor:not-allowed;' type='text' id='col-0-"+id+"' class='frm-item form-control' readonly='true' value='"+id+"'><font>"+id+"</font></div><div class='bd col-md-3 col-xs-12' style='height:45px;'><input type='text' value='"+arr[i].local_recolha+"' id='col-1-"+id+"' class='frm-item form-control'><font>"+arr[i].local_recolha+"</font></div><div class='bd col-md-4 col-xs-12' style='height:45px;'><input type='text' value='"+arr[i].pt_ref_recolha+"' id='col-2-"+id+"' class='frm-item form-control'><font>"+arr[i].pt_ref_recolha+"</font></div><div class='bd col-md-2 col-xs-12'style='height:45px;'><input type='text' style='cursor:not-allowed;' readonly='true' value='"+arr[i].operador_nome+"' id='col-3-"+id+"' class='frm-item form-control'><font>"+arr[i].operador_nome+"</font></div><div class='bd col-md-2 col-xs-12' id='action-"+id+"'><p style='text-align:right;margin: 0;'><a title='Apagar local' class='btn btn-danger' onclick='confirmDeleteOperatorLocations("+id+")'><span class='glyphicon glyphicon-trash'></span></a><a style='margin-left:9px;' class='btn btn-info' title='Editar local'onclick='showFrmOperatorLocations("+id+")'><span class='glyphicon glyphicon-edit'></span></a></div>");

      $('.debug-url').html('O local do operador: <b>'+nome+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('O local do operador: <b>'+nome+'</b> não foi modificado, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}
