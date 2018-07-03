function confirmDeleteServicesType (id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Tipo de serviço ID #<strong>"+id+"</strong>",
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

             dataValue='id='+id+'&action=7';
     $.ajax({
      type: "POST",
      url: "definitions/action_definitions.php",
      data: dataValue,
      cache: false,
      success: function(data){
        if(data == 1){  
        $('.debug-url').html('O Tipo de serviço ID #<strong>'+id+'</strong> foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          callAllServicesType();
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('O Tipo de serviço ID #<strong>'+id+'</strong> não foi apagado, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}


/*MOSTRAR CAMPOS PARA EDITAR TIPOS DE SERVICOS */
function showFrmServicesType(id){
    $("#col-99-"+id).show().next().hide();
    $("#action-t-"+id).html("<div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemServicesType("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemServicesType("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO DOS TIPOS DE SERVICOS */
function cancelItemServicesType(id){
    $("#col-99-"+id).hide().next().show();
    $("#action-t-"+id).html("<div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Apagar Tipo de Serviço' class='btn btn-danger btn-sm' onclick='confirmDeleteLocationsCreated("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Tipo de Serviço' onclick='showFrmServicesType("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}



/* EDITAR GRAVAR LOCAIS */
function saveItemServicesType(id){
  $(".back").fadeIn();
  setTimeout(function(){ 
  tp_serv = $("#col-99-"+id).val();
  var dataValue='';

   dataValue+="col_99_"+id+"="+$("#col-99-"+id).val()+"&";

  dataValue+="id="+id+"&action=8";
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     $(".back").fadeOut();
     if (data == 99){
     $('.debug-url').html('Erro, o Tipo de Serviço com o nome <b>'+tp_serv+'</b> já existe!');
     $("#mensagem_ko").trigger('click');
     }
     else if (data == 0 ){
     $('.debug-url').html('Erro, ao modificar o Tipo de Serviço com o nome <b>'+tp_serv+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data == 1 ){
      callServicesTypesActions();
      $('.debug-url').html('O Tipo de Serviço com o nome <b>'+tp_serv+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
 error:function(){
   $(".back").fadeOut();
   $('.debug-url').html('O Tipo de Serviço com o nome <b>'+tp_serv+'</b> não foi modificado, verifique a ligação Wi-Fi/Internet.');
   $("#mensagem_ko").trigger('click'); 
    }
  });
    }, 1000);
}


/*
*
*MENU BOTÃO DEFINIÇÕES
*
*/
function callDefinitionsActions(){
      $.ajax({url: "definitions/call_definitions_actions.php",error:function(){
        $('.debug-url').html('Erro ao obter os dados de definições, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
        $('#Modalko .back').fadeOut();
}

})
      .done(function( html ) { $( "#insert" ).html(html); callDefinitions();});
}

function callServicesTypesActions(){
      $.ajax({url: "definitions/call_services_types.php",error:function(){
        $('.debug-url').html('Erro ao obter os dados de definições, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
        $('#Modalko .back').fadeOut();}

})
      .done(function(html) { $('#tipo_servicos').html(html); callAllServicesType();});
}


function callShopDefinicoes(){
      $.ajax({url: "definitions/call_definitions_shop.php",error:function(){
        $('.debug-url').html('Erro ao obter os dados de definições, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
        $('#Modalko .back').fadeOut();}

})
      .done(function(html) { $('#loja_definicoes').html(html);callShopDefinitionsActions();});
}


function callZonesValues(){
      $.ajax({url: "definitions/call_zone_types.php",error:function(){
        $('.debug-url').html('Erro ao obter os dados das Zonas Comissão, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
        $('#Modalko .back').fadeOut();}
})
      .done(function(html) { $('#zonas_comissao').html(html); callAllZonesValues();});
}




/* CHAMADA DE TODOS OS LOCAIS*/
function callAllZonesValues(){

$('.back').fadeIn();
 setTimeout(function(){ 

dataValue='&action=9';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      $('.back').fadeOut();
      arr = JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não existem Zonas Comissão criadas!');
        $("#mensagem_ko").trigger('click');
      }
      else {
        $("#zones").empty();
        for(i=0;i<arr.length;i++){
          arr[i].cmx ? cmx = parseFloat(arr[i].cmx).toFixed(2)+"€" : cmx  ="-/-";
          $("#zones").append("<div  style='height:47px;' class='bd col-md-1 col-xs-2'><font>#"+arr[i].id+"</font></div><div style='height:47px;' class='bd col-md-2 col-xs-4'><input type='text' value='"+arr[i].zonas+"' id='col-101-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].zonas+"</font></div><div style='height:47px;' class='bd col-md-1 col-xs-2'><input type='number' step='any' value='"+arr[i].cmx+"' id='col-102-"+arr[i].id+"' class='frm-item form-control'/><font>"+cmx+"</font></div><div class='bd col-md-2 col-xs-4' id='action-zt-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Apagar Zona Comissão ID#"+arr[i].id+"' class='btn btn-danger btn-sm' onclick='confirmDeleteZoneComission("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Zona Comissão ID#"+arr[i].id+"' onclick='showFrmZoneComission("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div>");
        }
      }
    },
    error:function(data){
        $('#Modalko .debug-url').html('Não foi possivel obter as Zonas Criadas, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
         $('.back').fadeOut();}
    });

},1000);

}



function confirmDeleteZoneComission (id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Zona Comissão ID #<strong>"+id+"</strong>",
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
             dataValue='id='+id+'&action=11';
     $.ajax({
      type: "POST",
      url: "definitions/action_definitions.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 1){  
          $('.debug-url').html('A Zona Comissão ID #<strong>'+id+'</strong> foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          callAllZonesValues();
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('A Zona Comissão ID #<strong>'+id+'</strong> não foi apagada, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}




/*MOSTRAR CAMPOS PARA EDITAR ZONAS COMISSAO */
function showFrmZoneComission(id){
    $("#col-101-"+id+", #col-102-"+id).show().next().hide();
    $("#action-zt-"+id).html("<div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Guardar Zona Comissão ID#"+id+"' class='btn btn-success safe_it btn-sm' onclick='saveItemZoneComission("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemZoneComission("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}


/*FECHAR OS CAMPOS DE EDIÇÃO ZONAS COMISSAO*/
function cancelItemZoneComission(id){
    $("#col-101-"+id+", #col-102-"+id).hide().next().show();
    $("#action-zt-"+id).html("<div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Apagar Zona Comissão ID#"+id+"' class='btn btn-danger btn-sm' onclick='confirmDeleteZoneComission("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Zona Comissão ID#"+id+"' onclick='showFrmZoneComission("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}



/* EDITAR GRAVAR ZONAS COMISSAO*/
function saveItemZoneComission(id){
  $(".back").fadeIn();
  setTimeout(function(){ 
  zn_type = $("#col-101-"+id).val();
  var dataValue='';

  for(i=101; i<103; i++){
  dataValue += "col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
   }
  dataValue += "id="+id+"&action=12";

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
      if (data == 99){
       $('.debug-url').html('Erro, A Zona Comissão com o nome <b>'+zn_type+'</b> já existe!');
       $("#mensagem_ko").trigger('click');
      }
     else if (data == 0 ){
       $('.debug-url').html('Erro, ao modificar a Zona Comissão com o nome <b>'+zn_type+'</b>.');
       $("#mensagem_ko").trigger('click');
     }
     else if(data == 1 ){
      callServicesTypesActions();
      $('.debug-url').html('A Zona Comissão com o nome <b>'+zn_type+'</b> foi modificada com sucesso.');
      $("#mensagem_ok").trigger('click');
      callAllZonesValues();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
 error:function(){
   $(".back").fadeOut();
   $('.debug-url').html('A Zona Comissão com o nome <b>'+zn_type+'</b> não foi modificada, verifique a ligação Wi-Fi/Internet.');
    $("#mensagem_ko").trigger('click');  
    }
  });
    }, 1000);
}

/* CHAMADA DE TODOS OS LOCAIS*/
function callAllServicesType(){

$('.back').fadeIn();
setTimeout(function(){
dataValue='&action=5';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      $('.back').fadeOut();
      arr = JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não existem Tipos de Serviços criados!');
        $("#mensagem_ko").trigger('click');
      }
      else {
        $("#created").empty();
        for(i=0;i<arr.length;i++){
        $("#created").append("<div  style='height:47px;' class='bd col-md-1 col-xs-2'><font>#"+arr[i].id+"</font></div><div style='height:47px;' class='bd col-md-3 col-xs-6'><input type='text' value='"+arr[i].servico+"' id='col-99-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].servico+"</font></div><div class='bd col-md-2 col-xs-4' id='action-t-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;right: 10px;' role='group'><button title='Apagar Tipo Serviço' class='btn btn-danger btn-sm' onclick='confirmDeleteServicesType("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Tipo Serviço' onclick='showFrmServicesType("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></div>");
        }
      }
    },
 error:function(data){
     $('#Modalko .debug-url').html('Não foi possivel obter os Tipos de Serviços criados, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
     $('.back').fadeOut();}
    });

},1000);
}



/*OBTEM DEFINIÇOES EDIÇÃO*/

function callServicesType(){
dataValue='&action=5';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("servicestype", data);
    },
    });
}

/*OBTEM DEFINIÇOES EDIÇÃO DO PROMO

function callPromo(){
dataValue='&action=17';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("promo", data);
    },
    });
}
*/

/*OBTEM DEFINIÇOES EDIÇÃO*/
function callDefinitions(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){

        $(".back").fadeOut();

      localStorage.setItem("arrDefinitions", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não existem Definições criadas!');
        $("#mensagem_ko").trigger('click');
      }
      else {
        $("#delete_team").empty();
        for(i=0;i<arr.length;i++){
          nome = arr[i].nome;
          id = arr[i].id;
          !arr[i].logo ? arr[i].logo ='upload/noimg.jpg' : false;
          path = "definitions/"+arr[i].logo;
$("#delete_team").html("<div class='row' id='definitions_"+id+"'><div style='z-index:2;' class='col-md-3 col-md-offset-0 col-xs-10 col col-xs-offset-1'><div class='col-xs-12' id='mylogo'><font></font><span class='col-xs-12 well'><img class='img-responsive' style='margin:0 auto; min-width:150px;' src='"+path+"'></span><form id='fileinfo' name='fileinfo' onsubmit='return submitForm();'><font></font><br/><input type='file' class='btn-primary btn col-xs-12'; name='file' required /><br><button type='submit' style='margin-top:15px;' class='btn btn-info col-xs-12' value='Upload' title='Carregar Logotipo'><span class='glyphicon glyphicon-picture' value='Upload'></span> Carregar imagem (png)</button></form></div></div><div class='well clearfix col-md-9 cols-xs-12'><div class='bd col-sm-6 col-xs-12'><label>Nome: </label><br><input type='text' value='"+arr[i].nome+"' id='col-1-"+id+"' class='frm-item form-control' required placeholder='Nome Empresa'><font>"+arr[i].nome+"</font></div><div class='bd col-sm-3 col-xs-12'><label>Nif: </label><br><input type='text' required value='"+arr[i].nif+"' id='col-2-"+id+"' class='frm-item form-control' placeholder='Nif'><font>"+arr[i].nif+"</font></div><div class='bd col-sm-3 col-xs-12'><label>RNAVT: </label><br><input type='text' required value='"+arr[i].ravt+"' id='col-3-"+id+"' class='frm-item form-control' placeholder='RNAVT'><font>"+arr[i].ravt+"</font></div><div class='bd col-sm-6 col-xs-12'><label>Morada: </label><br><input type='text' value='"+arr[i].morada+"' id='col-4-"+id+"' required class='frm-item form-control' placeholder='Morada'><font>"+arr[i].morada+"</font></div><div class='bd col-sm-6 col-xs-12'><label>Cod.Postal: </label><br><input type='text' value='"+arr[i].cod_postal+"' id='col-5-"+id+"' class='frm-item form-control'required placeholder='Cod.Postal'><font>"+arr[i].cod_postal+"</font></div><div class='bd col-sm-6 col-xs-12'><label>Telefone: </label><br><input type='text' value='"+arr[i].tel+"' id='col-6-"+id+"' class='frm-item form-control' placeholder='Telefone' required><font>"+arr[i].tel+"</font></div><div class='bd col-sm-6 col-xs-12'><label>Telemóvel: </label><br><input type='text' required value='"+arr[i].tlm+"' id='col-7-"+id+"' class='frm-item form-control' placeholder='Telemóvel'><font>"+arr[i].tlm+"</font></div><div class='bd col-xs-12 col-sm-6'><label>Email: </label><br><input type='email' value='"+arr[i].email+"' id='col-8-"+id+"' class='frm-item form-control' required placeholder='Email'><font>"+arr[i].email+"</font></div><div class='bd col-xs-12 col-sm-6'><label>Dominio: </label><br><input type='text' value='"+arr[i].site+"' id='col-9-"+id+"' class='frm-item form-control' required placeholder='Dominio'><font>"+arr[i].site+"</font></div><div class='col-xs-12' style='margin-top:15px;' id='action-"+id+"'><div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-sm btn-info' title='Editar Definições' onclick='showFrmDefinitions("+id+")'><span class='glyphicon glyphicon-edit'></span><font class='hidden-xs'> Editar</font></button></div></div></div></div>");
$('#col-13-'+id).text(arr[i].termos);
      }
    }
    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter dados dos operadores, verifique a ligação Wi-Fi/Internet.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 1000);
}


/**/

/**/

function formatSeconds(secs){
    var hours = Math.floor(secs / (60 * 60));
    var divisor_for_minutes = secs % (60 * 60);
    var minutes = Math.floor(divisor_for_minutes / 60);
    hours <= 9 ? hours='0'+hours : hours;
    minutes <= 9 ? minutes='0'+minutes : minutes;
    return hours+':'+minutes;
}


/*OBTEM DEFINIÇOES EDIÇÃO LOJA*/
function callShopDefinitionsActions(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=3';
     $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      $(".back").fadeOut();
      localStorage.setItem("arrDefinitions", data);
      arr=[];
      arr =  JSON.parse(data);
       if (arr == null || arr.length < 1){
         $('#Modalko .debug-url').html('Não existem Definições Loja criadas!');
        $("#mensagem_ko").trigger('click'); 
      }
      else {

        $("#delete_team").empty();
        for(i=0;i<arr.length;i++){
         ini = arr[0].noturno.split(',');
         ni = formatSeconds(ini[0]);
         nf = formatSeconds(ini[1]);
         pub = arr[i].publicidade;
         nome = arr[i].nome;
         id = arr[i].id;
         x = arr[i].termos;

$("#shop_definicoes").html("<div class='row' id='definitions_"+id+"'><div class='clearfix'><div class='bd col-sm-5 col-xs-5'><label title='O inicio do periodo noturno'>Inicio Noturno:</label><br><input readonly class='noctini form-control' type='text' value='"+ni+"'></div><div class='bd col-sm-5 col-xs-5'><label title='O fim do periodo noturno'>Fim Noturno:</label><br><input readonly class='form-control noctfim' value='"+nf+"' type='text'></div><div class='bd col-sm-2 col-xs-2'><label>&nbsp;</label><br><button class='btn btn-success btn-night' style='float: right;'title='Guardar periodo noturno'><i class='fa fa-moon-o'></i> <span class='hidden-xs'>Guardar</span></button></div><div class='bd col-sm-10 col-xs-10'><label title='Texto que aparece no rodapé do pdf do cliente quando adquire um produto'>Recomendações:</label><br><input class='form-control rectxt' type='text' value='"+pub+"'></div><div class='bd col-sm-2 col-xs-2'><label>&nbsp;</label><br><button class='btn btn-success btn-recomendations' style='float: right;'title='Guardar Recomendações'><i class='fa fa-hand-peace-o'></i> <span class='hidden-xs'>Guardar</span></button></div><div class='bd col-sm-10 col-xs-10'><label title='Atribuir côr de fundo aos formulários da loja online'>Côr Formulário:</label><br><div class='input-group colorpicker-component' style='width:100%;'><input type='text' readonly value='"+arr[i].color+"' class='form-control colors' style='width: calc(100% - 41px);'/><span class='input-group-addon colorstyle'><span><i style='height: 20px;width: 20px;'></i></span></span></div></div><div class='bd col-sm-2 col-xs-2'><label>&nbsp;</label><br><button class='btn btn-success btn-color' style='float: right;'title='Guardar Côr '><i class='fa fa-paint-brush'></i> <span class='hidden-xs'>Guardar</span></button></div><div class='bd col-xs-10 col-sm-4'><label title='Nº conta do banco que aparece no email do cliente quando escolhe pagamento por Transf.Bancária'>IBAN:</label><br><input type='text' value='"+arr[i].iban+"' min='25' max='26' class='form-control ibanval' placeholder='IBAN'></div><div class='bd col-xs-2 col-sm-1'><label title='Valor em horas, de antecedência que aceita reservas na loja online (Ex: 1 hora, acresce 1 hora, à hora atual)'>Reservas:</label><br><input type='number' min='0' max='23' value='"+arr[i].hora_reserva+"' class='form-control reservasval'></div><div class='bd col-xs-10 col-sm-4'><label title='O email da conta paypal, para o cliente quando escolhe pagamento por paypal'>Email Paypal:</label><br><input type='text' value='"+arr[i].pp_email+"' class='ppemailval form-control' placeholder='Email Paypal'></div><div class='bd col-xs-2 col-sm-1'><label title='A taxa extra a cobrar sobre o valor total do serviço quando cliente escolhe Pagamento por Paypal'>Tx.Paypal:</label><br><input step='any' type='number' min='0' max='100' value='"+arr[i].pp_taxa+"' class='form-control txppval' placeholder='Tx.Paypal'></div><div class='bd col-sm-2 col-xs-12'><label>&nbsp;</label><br><button class='btn btn-success btn-shop' style='float: right;'title='Guardar Configurações'><i class='fa fa-adjust'></i> <span class='hidden-xs'>Guardar</span></button></div><div class='col-md-4 col-xs-4 bd'><label title='Ativar/desativar pagamento ao motorista na loja on-line'>Motorista:</label><br><label><input type='checkbox' data-size='mini' data-off-color='danger' "+arr[i].motorista+" data-on-color='success' id='motorista'></label></div><div class='col-md-4 col-xs-4 bd'><label title='Ativar/desativar pagamento por Transf. Bancária na loja on-line'>Transferência:</label><br><label><input type='checkbox' data-size='mini' data-off-color='danger' "+arr[i].trans_bancaria+" data-on-color='success' id='trans_bancaria'></label></div><div class='col-md-4 col-xs-4 bd'><label title='Ativar/desativar pagamentos Paypal na loja on-line'>Paypal:</label><br><label><input type='checkbox' data-size='mini' data-off-color='danger' "+arr[i].paypal+" data-on-color='success' id='paypal'></label></div><div class='bd col-xs-6 bd' style='padding-bottom:12px;'><label title='Termos e Condições da loja online'>Termos e Condições:</label></div><div class='col-xs-6 bd' id='action-"+id+"'><label>&nbsp;</label><button style='float:right;' class='btn btn-info' title='Editar Termos e Condições' onclick='showFrmDefinitionsShop("+id+")'><span class='glyphicon glyphicon-edit'></span><span class='hidden-xs'> Editar</span></button></div><div class='col-xs-12'><iframe style='width: 100%; min-height:200px;' class='bd font-item terms'></iframe></div><div class='frm-item col-xs-12 bd' style='height:auto;'><textarea class='textarea'>"+arr[i].termos+"</textarea></div></div></div><script src='js/highlight.js'></script><script src='js/bootstrap-switch.min.js'></script><script src='js/main.js'></script>");

$('iframe .terms').appendTo("body").ready(function(){
    setTimeout(function(){
        $('.terms').contents().find('body').append(x);
    },50);
});

$('.bootstrap-switch-label').addClass('disabled');

$('input').on('switchChange.bootstrapSwitch', function(event, state) {
  tipo = this.id;state == true ? is_checked = 'checked' : is_checked = 'false';
  dataValue = 'action=16&tipo='+tipo+'&estado='+is_checked;
  $.ajax({ 
    url:'definitions/action_definitions.php',
    data:dataValue,
    cache:false,
    type:'POST',
    success: function(data){
      if (data == 0){
        $('.debug-url').html('Erro ao atribuir o valor do pagamento, p.f. tente novamente.');
        $('#Modalko').modal();
      }
    },
    error: function(){
      $('.debug-url').html('Não foi possivel obter os pagamentos disponiveis, verifique a ligação Wi-Fi/Internet.');
      $('#Modalko').modal();
    }
    });
});


$('.colorpicker-component').colorpicker();

tinymce.init({
  selector: '.textarea',height: 200,toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],content_css: ['//www.tinymce.com/css/codepen.min.css']});


$('.btn-shop').click(function(){
dataValue="action=28&hora_reserva="+$('.reservasval').val()+"&pp_email="+$('.ppemailval').val()+"&iban="+$('.ibanval').val()+"&pp_taxa="+$('.txppval').val();

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     if (data == 0){
        $('.debug-url').html('Erro, ao modificar as Configurações Loja!');
        $("#Modalko").modal();
     }
    else if(data == 1){
      $('.debug-url').html('Configurações Loja alteradas com sucesso.');
      $("#Modalok").modal();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar a Configurações Loja, verifique a ligação Wi-Fi!');
       $("#Modalko").modal();
    }
  });
});



$('.btn-color').click(function(){
 dataValue="action=27&colors="+$('.colors').val();
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     if (data == 0){
        $('.debug-url').html('Erro, ao modificar a Côr dos Formulários!');
        $("#Modalko").modal();
     }
    else if(data == 1){
      $('.debug-url').html('Côr dos Formulários alterado com sucesso.');
      $("#Modalok").modal();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar a Côr dos Formulários, verifique a ligação Wi-Fi!');
       $("#Modalko").modal();
    }
  });
});


$('.btn-recomendations').click(function(){
 dataValue="action=26&recomendacoes="+$('.rectxt').val();
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     if (data == 0){
        $('.debug-url').html('Erro, ao modificar as Recomendações!');
        $("#Modalko").modal();
     }
    else if(data == 1){
      $('.debug-url').html('Recomendações alteradas com sucesso.');
      $("#Modalok").modal();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar as Recomendações, verifique a ligação Wi-Fi!');
       $("#Modalko").modal();
    }
  });
});

$('.noctini, .noctfim').datetimepicker({ignoreReadonly:true, format: 'HH:mm',collapse:false,sideBySide:true,useCurrent:false});
$('.btn-night').click(function(){
$('.noctini').val();
$('.noctfim').val();
i = $('.noctini').val().split(':');
hi = i[0]*60*60;
mi = i[1]*60;
f = $('.noctfim').val().split(':');
hf = f[0]*60*60;
mf = f[1]*60;
ti  = parseInt(hi)+parseInt(mi);
tf  = parseInt(hf)+parseInt(mf);
time = ti+','+tf;

 dataValue="action=25&noturno="+time;
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     if (data == 0){
        $('.debug-url').html('Erro, ao modificar o periodo noturno!');
        $("#Modalko").modal();
     }
    else if(data == 1){
      $('.debug-url').html('Periodo noturno foi alterado com sucesso.');
      $("#Modalok").modal();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar o periodo noturno, verifique a ligação Wi-Fi!');
       $("#Modalko").modal();
    }
  });
});
        $(".back").fadeOut();
      }
    }
    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter Definições Loja, verifique a ligação Wi-Fi/Internet.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 1000);
}


/*MOSTRAR OS CAMPOS PARA EDIÇAO DEFINIÇÕES*/
function showFrmDefinitionsShop(id){ 
    $(" #col-5-"+id).show().next().hide(); 
    $('.frm-item').show();
    $('.font-item').hide();
    $("#action-"+id).html("<div style='float:right;'><label>&nbsp;</label><button style='margin-right:5px;' title='Guardar'class='btn btn-success safe_it' onclick='saveItemDefinitionsShop("+id+");'><span class='glyphicon glyphicon-save-file'></span><span class='hidden-xs'> Guardar</span></button><button title='Fechar Edição' class='btn btn-default' onclick='cancelDefinitionsShop("+id+")'><span class='glyphicon glyphicon-remove-sign'></span><span class='hidden-xs'> Fechar</span></button></div>");
}


/*FECHAR OS CAMPOS DE EDIÇÃO DEFINICOES*/
function cancelDefinitionsShop(id){
    $("#col-5-"+id).hide().next().show();
    $('.frm-item').hide();
    $('.font-item').show();
    $("#action-"+id).html("<label>&nbsp;</label><button style='float:right;'class='btn btn-info' title='Editar Termos e Condições' onclick='showFrmDefinitionsShop("+id+")'><span class='glyphicon glyphicon-edit'></span><span class='hidden-xs'> Editar</span></button>");
  }

/* EDITAR/ALTERAÇÃO GRAVAR DEFINICOES DA LOJA  */
function saveItemDefinitionsShop(id){
  termos = $(".myiframe").contents().find("body").html();
  dataValue="action=15&termos="+termos;

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){

     if (data == 0){
        $('.debug-url').html('Erro, ao modificar os Termos e condições!');
        $("#Modalko").modal();
     }
    else {
      $('iframe .terms').appendTo("body").ready(function(){
        setTimeout(function(){
          $('.terms').contents().find('body').html(data);
        },50);
      });

      cancelDefinitionsShop(id);
      $('.debug-url').html('Termos e Condições alterados com sucesso.');
      $("#Modalok").modal();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar Termos e Condições, verifique a ligação Wi-Fi/Internet.');
      $("#Modalko").modal();
    }
  });
}







/*MOSTRAR OS CAMPOS PARA EDIÇAO DEFINIÇÕES*/
function showFrmDefinitions(id){
  for(i=1;i<11;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-sm btn-success safe_it' onclick='saveItemDefinitions("+id+");'><span class='glyphicon glyphicon-save-file'></span></button><button title='Fechar Edição' class='btn btn-sm btn-default' onclick='cancelDefinitions("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}

/*FECHAR OS CAMPOS DE EDIÇÃO DEFINICOES*/
function cancelDefinitions(id){
   for(i=1;i<11;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button class='btn btn-sm btn-info' title='Editar Definições' onclick='showFrmDefinitions("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
  }


/* EDITAR/ALTERAÇÃO GRAVAR DEFINICOES  */
function saveItemDefinitions(id){
  var dataValue='';
  for(i=1;i<11;i++){
  dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }

  dataValue+="id="+id+"&action=4";
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
     if (data == 0){
        $('.debug-url').html('Erro, ao modificar os definições!');
        $("#mensagem_ko").trigger('click');
     }
     else if(data == 1){
      callDefinitions();
      $('.debug-url').html('Definições alteradas com sucesso.');
      $("#mensagem_ok").trigger('click');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
    },
    error:function(){
      $('.debug-url').html('Erro, ao modificar os definições, verifique a ligação Wi-Fi/Internet.');
      $("#mensagem_ko").trigger('click');
    }
  });
}


function submitForm() {
            var fd = new FormData(document.getElementById("fileinfo"));
            $.ajax({
              url: "definitions/upload.php",
              type: "POST",
              data: fd,
              processData: false, 
              contentType: false,
              success:function(data){
               if (data.match(/Erro/g)){
               response = data.split(':');
               response[1];
               $('.debug-url').html('Erro, ao carregar a imagem/logo, <strong>'+response[1]+'</strong>.');
               $("#mensagem_ko").trigger('click');
              }
             else if(data.match(/Sucesso/g)){
              response = data.split(':');
              response[1];
              path = "definitions/"+response[1];
              $('#mylogo').html("<font></font><span class='col-xs-12 well'><img id='mypath' class='img-responsive' style='margin:0 auto; min-width:150px;' src='"+path+"'></span><form id='fileinfo' name='fileinfo' onsubmit='return submitForm();'><font></font><br/><input type='file' class='btn-primary btn col-xs-12'; name='file' required /><br><button type='submit' style='margin-top:15px;' class='btn btn-info col-xs-12' value='Upload' title='Carregar Logotipo'><span class='glyphicon glyphicon-picture' value='Upload'></span> Carregar Logotipo</button></form>");
     }
    }
})
.done(function( data ) {});
      return false;
    }



// ------------------------------------------------------------------------------------------------------------------------------------------- //

// PROMO FUNCOES


/* CHAMADA DE TODOS OS PROMOS*/
function callAllPromo(){

$('.back').fadeIn();

 setTimeout(function(){ 
dataValue='&action=18';
promo='';
promoactive='';

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){

      $('.back').fadeOut();
      arr = JSON.parse(data);
      if (arr == null || arr.length < 1)
      {
        $('.debug-url').html('Erro ao obter os Códigos Promo, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++)
        {

arr[i].ativo == '1' ?  promoactive = "<p class='promo-active-cont-"+arr[i].id+"' style='margin:0; text-align:center;'><button onclick='promoActivate("+arr[i].id+",1)' class='promo-active-"+arr[i].id+" btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open'></span></button></p>" : promoactive = "<p class='promo-active-cont-"+arr[i].id+"'  style='margin:0; text-align:center;'><button onclick='promoActivate("+arr[i].id+",0)' class='promo-active-"+arr[i].id+" btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-close'></span></button></p>";

arr[i].visivel == '1' ? promofavorite = "<p style='margin:0; text-align:center;'><button onclick='favoriteChosen("+arr[i].id+")'class='favorite-"+arr[i].id+" favorite btn btn-success btn-sm'><span class='glyphicon glyphicon-star-empty'></span></button></p>" : promofavorite = "<p style='margin:0; text-align:center;'><button onclick='favoriteChosen("+arr[i].id+")' class='favorite-"+arr[i].id+" favorite btn btn-default btn-sm'><span class='glyphicon glyphicon-star-empty'></span></button></p>";

promo +="<tr class='edit-promo-"+arr[i].id+"'><td scope='row'><input type='text' value='"+arr[i].nome+"' id='col-1-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].nome+"</font></td><td><input type='number' step='any' value='"+arr[i].percentagem+"' min='0' max='100' id='col-2-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].percentagem+"%</font></td><td><input type='text' value='"+arr[i].data_ini+"' id='col-3-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].data_ini+"</font></td><td><input type='text' value='"+arr[i].data_fim+"' id='col-4-"+arr[i].id+"' class='frm-item form-control'/><font>"+arr[i].data_fim+"</font></td><td>"+promoactive+"</td><td>"+promofavorite+"</td><td id='action-"+arr[i].id+"'><div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Código' class='btn btn-danger btn-sm' onclick='confirmDeletePromoCreated("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Código' onclick='showFrmPromoCreated("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></div></td></tr>";
        }

$("#promo-created").html("<div class='table-responsive'><table class='table table-striped' style='margin-bottom:0px;'><thead class='my-gray'><tr><th  class='bdr-w'>Código</th><th class='bdr-w'>Valor(%)</th><th class='bdr-w'>Data Inicio</th><th class='bdr-w'>Data Fim</th><th class='bdr-w'>Ativo</th><th class='bdr-w'>Favorito <button style='padding: 0px 4px;float: right;' class='btn btn-warning btn-sm' title='Remover Favorito' onclick='removeChosen()'><span class='glyphicon glyphicon-erase'></span></button></th><th style='text-align: center;'>Acções</th></tr></thead><tbody>"+promo+"</tbody></table></div>");

      }
    },
    error:function(data){
        $('#Modalko .debug-url').html('Não foi possivel obter os Códigos Promo, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
         $('.back').fadeOut();
      }
    });

}, 1000);

}

// Mostrar os Promos Todos

function callPromoCodes(){
      $.ajax({url: "definitions/call_promo_code.php",error:function(){
     $('.debug-url').html('Não foi possivel obter os Códigos Promo, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
     $('#Modalko .back').fadeOut();
}

})
      .done(function(html) { $('#promo_code').html(html);callAllPromo();});
}

/*ESCOLHA DO FAVORITO*/

function favoriteChosen(id){
dataValue='&id='+id+'&action=22';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){
    if (data==1) {
     $('.favorite').removeClass('btn-success').addClass('btn-default');
     $('.favorite-'+id).removeClass('btn-default').addClass('btn-success');
     $('.promo-active-'+id).removeClass('btn-default').addClass('btn-success').html("<span class='glyphicon glyphicon-eye-open'></span>");
   }
    if (data==0) {
     $('.debug-url').html('Erro ao modificar o Código para Favorito, p.f. tente novamente mais tarde.');
     $("#mensagem_ko").trigger('click');
   }
},
    error:function(data){
     $('.debug-url').html('Erro ao obter os dados, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
}
    });
}

/*REMOVER DO FAVORITO*/

function removeChosen(){
dataValue='action=24';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){
      arr = JSON.parse(data);
      if (arr[0].response == 1) {
          $(".favorite").removeClass('btn-success').addClass('btn-default');
      }
      else if (arr[0].response == 0) {
       $('.debug-url').html('Erro ao modificar o Código para Favorito, p.f. tente novamente mais tarde.');
       $("#mensagem_ko").trigger('click');
      }
    },
    error:function(data){
     $('.debug-url').html('Erro ao obter os dados, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
}
    });
}





/*ATIVAR DESATIVAR CODIGOS FRONT-END*/

function promoActivate(id,val){
dataValue='&id='+id+'&val='+val+'&action=23';

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success: function(data){
      arr = JSON.parse(data);
      if (arr == null || arr.length < 1){}
     else{
     if (arr[0].response == 1) {

     arr[0].val == 1 ?

$('.promo-active-cont-'+id).html("<button onclick='promoActivate("+id+",1)' class='promo-active-"+id+" btn btn-success btn-sm'><span class='glyphicon glyphicon-eye-open'></span></button>") : $('.promo-active-cont-'+id).html("<button onclick='promoActivate("+id+",0)' class='promo-active-"+id+" btn btn-default btn-sm'><span class='glyphicon glyphicon-eye-close'></span></button>");

   }
    if (arr[0].response == 0) {
     $('.debug-url').html('Erro ao ativar o Código, p.f. tente novamente mais tarde.');
     $("#mensagem_ko").trigger('click');
   }
  }
},
    error:function(data){
     $('.debug-url').html('Erro ao obter os dados, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
}
    });
}



// APAGAR CODIGO PROMO

function confirmDeletePromoCreated(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar o Código Promo #<strong>"+id+"</strong>?<br>",
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
    dataValue='id='+id+'&action=20';
     $.ajax({
      type: "POST",
      cache:false,
      url: "definitions/action_definitions.php",
      data: dataValue,
      success: function(data){
        if(data == 1){
          callAllPromo();
          $('#Modalok .debug-url').html('O Código promo #'+id+' foi apagado com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('#Modalko .debug-url').html('O código promo #'+id+' não foi apagado, verifique a ligação Wi-Fi/Internet.');
        $("#mensagem_ko").trigger('click');
      }
   });
  }
 },
}
});
}

/*MOSTRAR CAMPOS PARA EDITAR OS TIPOS DE PROMO (1)*/
function showFrmPromoCreated(id)
{

   $('#col-3-'+id).datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});
   $('#col-4-'+id).datetimepicker({ignoreReadonly: true, useCurrent: false, format: 'DD/MM/YYYY', locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});
   $('#col-3-'+id).on("dp.change", function (e) {$('#col-4-'+id).data("DateTimePicker").minDate(e.date);});
   $('#col-4-'+id).on("dp.change", function (e) {$('#col-3-'+id).data("DateTimePicker").maxDate(e.date); });


    $('.edit-promo-'+id).css('background','#dff0d8');
  for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveItemPromoCreated("+id+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItemPromoCreated("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}


/*FECHAR OS CAMPOS DE EDIÇÃO DOS PROMOS*/
function cancelItemPromoCreated(id)
{
 $('.edit-promo-'+id).css('background','#FFF');
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float:right;' role='group'><button title='Apagar Categoria' class='btn btn-danger btn-sm' onclick='confirmDeletePromoCreated("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Categoria' onclick='showFrmPromoCreated("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR PROMOS */
function saveItemPromoCreated(id)
{
  setTimeout(function(){ 
  promo = $("#col-1-"+id).val();
  var dataValue='';
  for(i=1;i<5;i++){
      $("#col-2-"+id).val() > 100 ? $("#col-2-"+id).val('100') : false;
      $('#col-2-'+id).val() < 0 || !$('#col-2-'+id).val() ? $("#col-2-"+id).val('0') : false;
      dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=21";

  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){

     if (data == 99){
     $('.debug-url').html('Erro, Código Promo com o nome <b>'+promo+'</b> já existe.');
     $("#mensagem_ko").trigger('click');
      }
     else if (data == 0 ){
     $('.debug-url').html('Erro, ao modificar o Código  Promo <b>'+promo+'</b>.');
     $("#mensagem_ko").trigger('click');
     }
    else if(data == 1){
      callAllPromo();
      $('.debug-url').html('O Código Promo <b>'+promo+'</b> foi modificado com sucesso.');
      $("#mensagem_ok").trigger('click');   
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
     }
   },
 error:function(){
   $('.debug-url').html('O Código Promo <b>'+promo+'</b> não foi modificado, verifique a ligação Wi-Fi/Internet.');
     $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}

