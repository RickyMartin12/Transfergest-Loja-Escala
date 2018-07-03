$(function() {
id=0;
    $('#confirm-service').on('show.bs.modal', function(e) {
    $(this).find('.btn-success').attr('id', $(e.relatedTarget).data('href'));
    id = ($(this).find('.btn-success').attr('id'));
    $('.debug-url').html('Tem a certeza que pretende anexar as coordenadas atuais no campo Pt.Referência ao registo #'+id+' ?');
    $(this).find('.btn-success').click(function() {
    getLocation(id);
});
});

$('.to_bottom').click(function(){
$("html, body").animate({ scrollTop: $(document).height() }, 500);
});


$('.to_top').click(function(){
$("html, body").animate({ scrollTop: $("#debug").scrollTop() }, 500);
});
});

servico_hj='';

function getHoje(user){
 $(".back").fadeIn();
user_is = user;
$('#servicos').fadeIn();
    dataValue="user="+user+"&action=ver_hoje";
    $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
     arr=[];
     arr =  JSON.parse(data);
console.log(data);
 $("#changedaynr").val(1);
    if (arr == null || arr.length < 1){
     $('#search').empty();
     var d = new Date();
     day_h = d.setDate(d.getDate());
     day_out= moment(day_h).format("DD-MM-YYYY");
     $("#servicos").empty().append("<hr><div class='row'><div class='col-xs-10 col-xs-offset-1'><h3 style='margin-top: 10px; text-align:center;'>Olá "+user+" não tem Serviços para  hoje "+day_out+"</h3></div></div><hr>");
 $(".back").fadeOut();
     }
     else {

      $('#servicos, #search').empty();
      for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data_servico*1000).format("DD-MM-YYYY");
       hora_out = moment(arr[i].hrs*1000).format("H:mm");
      servico_hj= i+1;

arr[i].cobrar_direto =='0' || !arr[i].cobrar_direto ? arr[i].cobrar_direto = '-/-' : arr[i].cobrar_direto = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€";
arr[i].cmx_st  =='0' || !arr[i].cmx_st  ? arr[i].cmx_st  = '-/-' : arr[i].cmx_st  = parseFloat(arr[i].cmx_st).toFixed(2)+"€";

      $("#servicos").append("<div class='panel panel-primary'><div class='panel-heading'><h3 class='panel-title'><span><label>&nbsp;Nº</label> "+servico_hj+"&nbsp;</span><span class='ct'><label></label>"+arr[i].servico+"</span><span style='float:right;'><label>&nbsp;ID:</label> #"+arr[i].id+"</span></h3></div><div class='panel-body'><div class='bd ct col-md-2 col-xs-5'><label>Data</label><br/>"+data_out+"</div><div class='bd ct col-md-1 col-xs-3'><label>Hora</label><br/>"+hora_out+"</div><div class='bd ct col-md-2 col-xs-4'><label>Equipa</label><br/>"+arr[i].staff+"</div><div class='bd col-md-2 col-xs-4'><label>Nº Voo</label><br/><font id='voo-"+arr[i].id+"'>&nbsp;"+arr[i].voo+"</font></div><div class='bd col-md-5 col-xs-8'><label>Cliente</label><br/><font id='nome-"+arr[i].id+"'>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd col-md-4 col-xs-12'><label>Recolha</label><br />&nbsp;"+arr[i].local_recolha+"</div><div class='bd col-md-4 col-xs-12'><label>Destino</label><br/><font id='destino-"+arr[i].id+"'>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd col-md-4 col-xs-12'><label>Pt.Referência</label><br> &nbsp;"+arr[i].ponto_referencia+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Px</label><br />&nbsp;"+arr[i].px+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Cr</label><br/>&nbsp;"+arr[i].cr+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Bb</label><br/>&nbsp;"+arr[i].bebe+"</div><div class='bd col-md-9 col-xs-12'><label>Observações</label><br/>&nbsp;"+arr[i].obs+"</div><div class='bd col-md-5 col-xs-6'><label>Operador</label><br />&nbsp;"+arr[i].operador+"</div><div class='bd col-md-3 col-xs-6'><label>Ticket</label><br/>&nbsp;"+arr[i].ticket+"</div><div class='bd rt col-md-2 col-xs-6'><label>Cobrar Direto</label><br/>&nbsp;"+arr[i].cobrar_direto+"</div><div class='bd rt col-md-2 col-xs-6'><label>Comissão</label><br/>&nbsp;"+arr[i].cmx_st+"</div></div><div class='panel-footer'><div class='btn-group btn-group-justified' role='group' aria-label=accao'><div class='btn-group' role='group'><button class='mrg btn btn-success' onclick='clientName("+arr[i].id+")'><span class='glyphicon glyphicon-user'></span> Nome</button></div><div class='btn-group' role='group'><button class='mrg btn btn-default closing-"+arr[i].id+"' id='"+arr[i].id+"' data-href='"+arr[i].id+"' data-toggle='modal' data-target='#confirm-service'><span class='glyphicon glyphicon-thumbs-up'></span> Coord.(s)</button></div><div class='btn-group' role='group'><a class='mrg btn btn-info' title='"+arr[i].local_recolha+"' href='https://www.google.pt/maps/dir//"+arr[i].local_recolha+"' target='_blank'><span class='glyphicon glyphicon-screenshot'></span> Recolha</a></div></div></div></div>");
$("#client_name .modal-body").html("<div class='row'><h1 class='nametxt'>"+arr[i].nome_cl+"</h1><div class='col-xs-4'><h4 class='infotxt'><span class='glyphicon glyphicon-plane'></span> "+arr[i].voo+"</h4></div><div class='col-xs-8'><h4 class='infotxt'><span class='glyphicon glyphicon-screenshot'></span> "+arr[i].local_entrega+"</h4></div></div>");
arr[i].destino_endereco ? $('.closing-'+arr[i].id).hide(): $('.closing-'+arr[i].id).show();
    }
 $(".back").fadeOut();
    d = new Date();
   day = d.setDate(d.getDate());
   day_out= moment(day).format("DD-MM-YYYY");
   $('#search').append("Olá "+user+" tem "+servico_hj+" Serviço(s) para hoje "+day_out+".");
     }
    },
    error:function(data){
 $(".back").fadeOut();
    d = new Date();
   day_h = d.setDate(d.getDate());
   day_out= moment(day_h).format("DD-MM-YYYY");
     $('.debug-url').html('Erro ao obter Serviços do Dia de Hoje ('+day_out+') , p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });
}



/*NOTIFICAÇAO SERVIÇOS NOVO*/

setInterval( function() { checkTransfer(user_is); }, 5000);

function checkTransfer(user_is){
    dataValue="user="+user_is+"&action=check_transfers";
    $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST',
    'dataType': 'html', 
    success:function(data){
/*
    if (data != servico_hj){
    playAudio();
    $(".new_transfer").addClass('btn-danger');
}
else{$(".new_transfer").removeClass('btn-danger');}
    
*/
},
    error:function(data){
    console.log(data);
    }
  });
}







/**/


/* INICIO ENVIO COORDENADAS PARA ARRAY */
var gpsdata= [{"nome":"", "pos1":"" , "pos2":"", "pos3":"", "pos4":"", "pos5":"", "pos6":"","pos7":"","pos8":"","pos9":"", "pos10":"", "pos11":"", "pos12":""}];


function writeInArray(gps_positions){
if (gpsdata[0].nome==""){ gpsdata[0].nome = $("#userrec").val(); flag0=1;}
if (gpsdata[0].pos1==""){ gpsdata[0].pos1 = gps_positions; flag1=1; flag2=0; return;}
else if (gpsdata[0].pos2==""){ gpsdata[0].pos2 = gps_positions; flag2=1; flag3=0; return;}
else if (gpsdata[0].pos3==""){ gpsdata[0].pos3 = gps_positions; flag3=1; flag4=0; return;}
else if (gpsdata[0].pos4==""){ gpsdata[0].pos4 = gps_positions; flag4=1; flag5=0; return;}
else if (gpsdata[0].pos5==""){ gpsdata[0].pos5 = gps_positions; flag5=1; flag6=0; return;}
else if (gpsdata[0].pos6==""){ gpsdata[0].pos6 = gps_positions; flag6=1; flag7=0; return;}
else if (gpsdata[0].pos7==""){ gpsdata[0].pos7 = gps_positions; flag7=1; flag8=0; return;}
else if (gpsdata[0].pos8==""){ gpsdata[0].pos8 = gps_positions; flag8=1; flag9=0; return;}
else if (gpsdata[0].pos9==""){ gpsdata[0].pos9 = gps_positions; flag9=1; flag10=0; return;}
else if (gpsdata[0].pos10==""){ gpsdata[0].pos10 = gps_positions; flag10=1; flag11=0; return;}
else if (gpsdata[0].pos11==""){ gpsdata[0].pos11 = gps_positions; flag11=1; flag12=0; return;}
else if (gpsdata[0].pos12==""){ gpsdata[0].pos12 = gps_positions; flag12=1; arrfill=1; flag1=0; return;}
}

function RewriteInArray(gps_positions){
}


function updPst(user_is){
if (navigator.geolocation) {
  var timeoutVal = 10 * 1000 * 1000;
  navigator.geolocation.getCurrentPosition(
    displayPositionGps, 
    displayErrorGps,
    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0,}
  );
}
else {
    setTimeout(function(){
     console.log(data);
     }, 500);
}
}

navigator.permissions.query({name:'geolocation'})
  .then(function(permissionStatus) {  
   console.log(permissionStatus.state);
    permissionStatus.onchange = function() {  
    console.log(this.state);
    };
  });


function displayPositionGps(position) {
gps_positions = position.coords.latitude+","+position.coords.longitude;
writeInArray(gps_positions);


console.log(gpsdata[0].nome+"->"+gpsdata[0].pos1+"->"+gpsdata[0].pos2+"->"+gpsdata[0].pos3+"->"+gpsdata[0].pos4+"->"+gpsdata[0].pos5+"->"+gpsdata[0].pos6+"->"+gpsdata[0].pos7+"->"+gpsdata[0].pos8+"->"+gpsdata[0].pos9+"->"+gpsdata[0].pos10+"->"+gpsdata[0].pos11+"->"+gpsdata[0].pos12+"\n"+Object.keys(gpsdata[0]).length);

dataValue="action=gps&user="+user_is+"&lat="+position.coords.latitude+"&long="+position.coords.longitude;
$.ajax({
  method: "POST",
  url: "gps.php",
  data: dataValue,
success: function(data){
detectmob() ? precisao="":precisao="<br /><div style='text-align:center;'>Modo precisão está <strong>Desligado</strong><br />Coordenadas obtidas do <strong>ponto de acesso + próximo.</strong></div>"; 
  setTimeout(function(){
console.log(data);
  }, 500);
 },
error:function(data){
    setTimeout(function(){
console.log(data);
    }, 500);
  }
});


}

function displayErrorGps(error) {
  var errors = { 
    1: 'Permissão negada',
    2: 'Posição indisponivel',
    3: 'Tempo do pedido esgotado'
  };

/*
  setTimeout(function(){
     $('.debug-url').html("Surgiu o seguinte Erro:\n" + errors[error.code]+",\ndados não enviados");
     $("#mensagem_ko").trigger('click');
   }, 500);*/


}

setInterval( function() { updPst(user_is); }, 10000);


/* FIM ENVIO COORDENADAS PARA ARRAY*/


function getAmanha(user){
 $(".back").fadeIn();
$('#servicos').fadeIn();
    dataValue="user="+user+"&action=ver_amanha";
     $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
 $("#changedaynr").val(2);
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1){
    $('#search').empty();
   var d = new Date();
   day_a = d.setDate(d.getDate()+1);
   day_out= moment(day_a).format("DD-MM-YYYY");
$("#servicos").empty().append("<hr><div class='row'><div class='col-xs-10 col-xs-offset-1'><h3 style='margin-top: 10px; text-align:center;'>Olá "+user+", lamentamos mas ainda não foram atribuídos serviços para amanhã:<br />("+day_out+")</h3></div></div>");
$(".back").fadeOut();    
}
     else {
     $('#servicos, #search').empty();
     for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data_servico*1000).format("DD-MM-YYYY");
       hora_out = moment(arr[i].hrs*1000).format("H:mm");
       servico= i+1;

arr[i].cobrar_direto =='0' || !arr[i].cobrar_direto ? arr[i].cobrar_direto = '-/-' : arr[i].cobrar_direto = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€";
arr[i].cmx_st  =='0' || !arr[i].cmx_st  ? arr[i].cmx_st  = '-/-' : arr[i].cmx_st  = parseFloat(arr[i].cmx_st).toFixed(2)+"€";

      $("#servicos").append("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'><span><label>&nbsp;Nº</label> "+servico+"&nbsp;</span><span class='ct'><label></label>"+arr[i].servico+"</span><span style='float:right;'><label>&nbsp;ID:</label> #"+arr[i].id+"</span></h3></div><div class='panel-body'><div class='bd ct col-md-2 col-xs-5'><label>Data</label><br/>"+data_out+"</div><div class='bd ct col-md-1 col-xs-3'><label>Hora</label><br/>"+hora_out+"</div><div class='bd ct col-md-2 col-xs-4'><label>Equipa</label><br/>"+arr[i].staff+"</div><div class='bd col-md-2 col-xs-4'><label>Nº Voo</label><br/><font id='voo-"+arr[i].id+"'>&nbsp;"+arr[i].voo+"</font></div><div class='bd col-md-5 col-xs-8'><label>Cliente</label><br/><font id='nome-"+arr[i].id+"'>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd col-md-4 col-xs-12'><label>Pick Up</label><br />&nbsp;"+arr[i].local_recolha+"</div><div class='bd col-md-4 col-xs-12'><label>Destino</label><br/><font id='destino-"+arr[i].id+"'>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd col-md-4 col-xs-12'><label>Pt.Referência</label><br> &nbsp;"+arr[i].ponto_referencia+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Px</label><br />&nbsp;"+arr[i].px+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Cr</label><br/>&nbsp;"+arr[i].cr+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Bb</label><br/>&nbsp;"+arr[i].bebe+"</div><div class='bd col-md-9 col-xs-12'><label>Observações</label><br/>&nbsp;"+arr[i].obs+"</div><div class='bd col-md-5 col-xs-6'><label>Operador</label><br />&nbsp;"+arr[i].operador+"</div><div class='bd col-md-3 col-xs-6'><label>Ticket</label><br/>&nbsp;"+arr[i].ticket+"</div><div class='bd rt col-md-2 col-xs-6'><label>Cobrar Direto</label><br/>&nbsp;"+arr[i].cobrar_direto+"</div><div class='bd rt col-md-2 col-xs-6'><label>Comissão</label><br/>&nbsp;"+arr[i].cmx_st+"</div></div><div class='panel-footer'></div></div>");
}
$(".back").fadeOut();
    d = new Date();
   day = d.setDate(d.getDate()+1);
   day_out= moment(day).format("DD-MM-YYYY");
   $('#search').append("Olá "+user+" tem "+servico+" Serviço(s) para amanhã "+day_out+".");
     }
    },
    error:function(data){
$(".back").fadeOut();
   d = new Date();
   day_a = d.setDate(d.getDate()+1);
   day_out= moment(day_a).format("DD-MM-YYYY");
      $('.debug-url').html('Erro ao obter Serviços de Amanhã ('+day_out+'), p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

function getOntem(user){
 $(".back").fadeIn();
$('#servicos').fadeIn();
    dataValue="user="+user+"&action=ver_ontem";
     $.ajax({
    url:'action.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
console.log(data);
 $("#changedaynr").val(0);
    arr=[];
    arr =  JSON.parse(data);
   if (arr == null || arr.length < 1){
   $('#search').empty();
   var d = new Date();
   day_o = d.setDate(d.getDate()-1);
   day_out= moment(day_o).format("DD-MM-YYYY");
    $("#servicos").empty().append("<hr><div class='row'><div class='col-xs-10 col-xs-offset-1'><h3 style='margin-top: 10px; text-align:center;'>Olá "+user+" não teve Serviços ontem "+day_out+"</h3></div></div><hr>");
 $(".back").fadeOut();
    }
 else {
    $('#servicos, #search').empty();
      for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data_servico*1000).format("DD-MM-YYYY");
       hora_out = moment(arr[i].hrs*1000).format("H:mm");
       servico= i+1;

arr[i].cobrar_direto =='0' || !arr[i].cobrar_direto ? arr[i].cobrar_direto = '-/-' : arr[i].cobrar_direto = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€";
arr[i].cmx_st  =='0' || !arr[i].cmx_st  ? arr[i].cmx_st  = '-/-' : arr[i].cmx_st  = parseFloat(arr[i].cmx_st).toFixed(2)+"€";

      $("#servicos").append("<div class='panel panel-default'><div class='panel-heading'><h3 class='panel-title'><span><label>&nbsp;Nº</label> "+servico+"&nbsp;</span><span class='ct'><label></label>"+arr[i].servico+"</span><span style='float:right;'><label>&nbsp;ID:</label> #"+arr[i].id+"</span></h3></div><div class='panel-body'><div class='bd ct col-md-2 col-xs-5'><label>Data</label><br/>"+data_out+"</div><div class='bd ct col-md-1 col-xs-3'><label>Hora</label><br/>"+hora_out+"</div><div class='bd ct col-md-2 col-xs-4'><label>Equipa</label><br/>"+arr[i].staff+"</div><div class='bd col-md-2 col-xs-4'><label>Nº Voo</label><br/><font id='voo-"+arr[i].id+"'>&nbsp;"+arr[i].voo+"</font></div><div class='bd col-md-5 col-xs-8'><label>Cliente</label><br/><font id='nome-"+arr[i].id+"'>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd col-md-4 col-xs-12'><label>Pick Up</label><br />&nbsp;"+arr[i].local_recolha+"</div><div class='bd col-md-4 col-xs-12'><label>Destino</label><br/><font id='destino-"+arr[i].id+"'>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd col-md-4 col-xs-12'><label>Pt.Referência</label><br> &nbsp;"+arr[i].ponto_referencia+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Px</label><br />&nbsp;"+arr[i].px+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Cr</label><br/>&nbsp;"+arr[i].cr+"</div><div class='bd ct col-md-1 col-xs-4'><label>Nº Bb</label><br/>&nbsp;"+arr[i].bebe+"</div><div class='bd col-md-9 col-xs-12'><label>Observações</label><br/>&nbsp;"+arr[i].obs+"</div><div class='bd col-md-5 col-xs-6'><label>Operador</label><br />&nbsp;"+arr[i].operador+"</div><div class='bd col-md-3 col-xs-6'><label>Ticket</label><br/>&nbsp;"+arr[i].ticket+"</div><div class='bd rt col-md-2 col-xs-6'><label>Cobrar Direto</label><br/>&nbsp;"+arr[i].cobrar_direto+"</div><div class='bd rt col-md-2 col-xs-6'><label>Comissão</label><br/>&nbsp;"+arr[i].cmx_st+"</div></div><div class='panel-footer'></div></div>");
    }
 $(".back").fadeOut();
    d = new Date();
   day_o = d.setDate(d.getDate()-1);
   day_out= moment(day_o).format("DD-MM-YYYY");
   $('#search').append("Olá "+user+" teve "+servico+" Serviço(s) ontem "+day_out+".");
     }
    },
    error:function(data){
 $(".back").fadeOut();
 d = new Date();
   day_o = d.setDate(d.getDate()-1);
   day_out= moment(day_o).format("DD-MM-YYYY");
      $('.debug-url').html('Erro ao obter dados de Serviço de Ontem ('+day_out+'), p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

function logOut(){
  window.open('logout.php','_self');
}

function clientName(id){
nome = $("#nome-"+id).text();
voo = $("#voo-"+id).text();
destino = $("#destino-"+id).text();
$(".client_content").html("<h2> "+nome+" <br /></h2><hr><h9><span class='glyphicon glyphicon-plane'></span> "+voo+"</h9><br /><hr><h9><span class='glyphicon glyphicon-road'></span> "+destino+"</h9>");
$("#fulldiv").fadeIn();
}


function clearMe(){
$(".client_content").empty();
$("#fulldiv").fadeOut();
}



function goToPrint(){
  $('code').removeClass('code');
  $('.print').removeClass('shadow');
    for(i=1;i<20;i++){
      if ($('input#col_'+i).is(':checked'))$('td.col_'+i).hide();
        $('input#col_'+i).hide();
    }
  $('input,.no_print').hide();
  setTimeout(function(){window.print();}, 500);
  setTimeout(function(){
    $('code').addClass('code');
    $('.print').addClass('shadow');
    $(".no_print").show();
    for(i=1;i<29;i++){
      $('td.col_'+i+',input#col_'+i).show();
    }
    }, 1250);
}

function getLocation(id) {
id=id;
$("#close_mod").trigger('click');
$(".back").fadeIn();
if (navigator.geolocation) {
  var timeoutVal = 10 * 1000 * 1000;
  navigator.geolocation.getCurrentPosition(
    displayPosition, 
    displayError,
    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0,}
  );
}
else {
    setTimeout(function(){
      $(".back").fadeOut();
      $('.debug-url').html('Geo-localização não suportada pelo navegador.');
      $("#mensagem_ko").trigger('click');
     }, 500);
}
}

navigator.permissions.query({name:'geolocation'})
  .then(function(permissionStatus) {  
   console.log(permissionStatus.state);
    permissionStatus.onchange = function() {  
    console.log(this.state);
    };
  });

function displayPosition(position) {
dataValue="id="+id+"&location="+position.coords.latitude+"°\n"+position.coords.longitude+"°&action=long";
$.ajax({
  method: "POST",
  url: "action.php",
  data: dataValue,
success: function(data){
if (data == 1)
{
detectmob() ? precisao="":precisao="<br /><div style='text-align:center;'>Modo precisão está <strong>Desligado</strong><br />Coordenadas obtidas do <strong>ponto de acesso + próximo.</strong></div>"; 
  setTimeout(function(){
    $('.debug-url').html('Serviço #'+id+', coordenadas anexadas com sucesso.'+precisao);
    $("#mensagem_ok").trigger('click');
    getHoje(user_is);
  }, 500);
}
else{
    $('.debug-url').html('No Serviço #'+id+', as coordenadas não foram gravadas, p.f. tente mais tarde.'+precisao);
    $("#mensagem_ko").trigger('click');
    getHoje(user_is);

}

},
error:function(data){
    setTimeout(function(){
      $(".back").fadeOut();
      $('.debug-url').html('Erro, no Serviço #'+id+', as coordenadas não foram gravadas, pf. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }, 500);
  }
});
}

function displayError(error) {
  var errors = { 
    1: 'Permissão negada, p.f. ligue o GPS no dispositivo',
    2: 'Posição indisponivel',
    3: 'Tempo do pedido esgotado'
  };
  setTimeout(function(){
     $(".back").fadeOut();
     $('.debug-url').html("Surgiu o seguinte Erro:\n" + errors[error.code]+",\ndados não enviados");
     $("#mensagem_ko").trigger('click');
   }, 500);
}

function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
    return true;
  }
 else {
    return false;
  }
}
