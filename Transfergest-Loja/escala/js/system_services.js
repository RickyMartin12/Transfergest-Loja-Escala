/*CARREGA PHP PARA INDEX  PARA VER  SITUAÇÃO ACTUAL DOS SERVIÇOS*/
function callServicesTemplate(){
  $.ajax({url: "services/services_template.php",error:function(){
    $('#Modalko .debug-url').html('Erro ao obter o modulo dos Serviços, p.f. verifique a ligação Wi-Fi ou rede.');
    $("#mensagem_ko").trigger('click');
    $('.back').fadeOut();}
  })
  .done(function( html ) { $('.back').fadeOut(); $( "#services" ).html(html); StartMapPositions(); getStaffLogfile();});
}

function getStaffPositions(){
    dataValue='action=1';
     $.ajax({ url:'services/action_services.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    localStorage.setItem("markers", data);
   },
 error:function(){}
  });
} 

function getStaffLogfile(){
    dataValue='action=2';
     $.ajax({ url:'services/action_services.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      arr=[];
      var val='';
      var marque='';
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1)
      return;
      else {
        for(i=0;i<arr.length;i++){
        arr[i].accao == "Recebido" ? nrid='-/-' :nrid='ID'+arr[i].servico;
        id=arr[i].servico;

if(arr[i].accao =="Rejeitado"){
rej="<font class='blink'style='color:#FFB231;'>"+arr[i].causa+"</font>";
}
else {
rej= arr[i].accao;
}
        val += "<div class='row' style='margin-top: 0px;margin-bottom: 0px; font-size:11px;'><div class='col-xs-3 no_pd' style='width:55px;'>"+arr[i].hora+"</div><div class='col-xs-3 no_pd' style='width:80px;color: #5bc0de;'>"+arr[i].staff+"</div><div class='col-xs-2 no_pd rej' style='width:70px;'>"+rej+"</div><div style='width:75px; color: #5bc0de;' class='accao no_pd col-xs-2'>"+arr[i].tipo+"</div><div class='col-xs-2 no_pd' style='width:50px; cursor:pointer;' onclick='searchServic("+id+")' title ='Ver serviço ID"+arr[i].servico+"'>"+nrid+"</div></div>";
marque += "<span style='font-size: 11px; color: #FFB231' class='glyphicon glyphicon-road'></span> <font> "+arr[i].hora+" - "+arr[i].staff+" - "+rej+" - "+arr[i].tipo+" - "+nrid+" </font>&nbsp;&nbsp;";
        }
  $("#logs15").empty().html(val);
  $("#instant-info").empty().html(marque);
      }
    },
 error:function(){
    }
  });
} 
function currentServices(){
    dataValue='action=3';
     $.ajax({ url:'services/action_services.php',
    data:dataValue,
    type:'POST',
    cache:false,
     success:function(data){
      arr=[];
      var val='';
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1)
      return;
      else {
  $("#ontime").empty();
        for(i=0;i<arr.length;i++){
         date = new Date(arr[i].hrs*1000);   
         hours = date.getHours();
         minutes = "0" + date.getMinutes();    
         hora = hours + ':' + minutes.substr(-2);
         d = new Date();
         n = d.getTime();
           mt = '"'+arr[i].matricula+'"';
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

 $("#ontime").append("<div class='row' id='services-"+arr[i].id+"' style='border-bottom:1px solid #333; padding-bottom: 2px; font-size:11px;'><div id='lg-id-"+arr[i].id+"' class='col-xs-3 no_pd hv' style='width:40px; cursor:pointer' title='Ver serviço "+arr[i].id+"'onclick='searchServic("+arr[i].id+")'>&nbsp;"+arr[i].id+"</div><div id='lg-hr-"+arr[i].id+"' class='col-xs-3 no_pd' style='width:40px;'>"+hora+"</div><div class='col-xs-2 no_pd' style='max-width:100px; min-width:75px;'>"+arr[i].staff+"</div><div style='width:90px;' class='accao no_pd col-xs-2'>"+arr[i].estado+"</div><div class='col-xs-2 no_pd' style='width:40px; text-align:center;'><i id='lg-bus-"+arr[i].id+"' class='fa fa-bus fa-2x' aria-hidden='true' style='cursor:pointer; 'title='"+matr+"'></i></div><div class='col-xs-1 no_pd' style='width:22px;' ><span title='Ver Rota Gps' style='float:right; font-size:18px; cursor:pointer;' onclick='carRoute("+mt+")' class='info_cl glyphicon glyphicon-map-marker'></span></div></div>");

/*SERVICO A COMECAR DENTRO DE 1 HORA*/
clr = arr[i].hrs*1000-n;
clr <3600000 ? $('#lg-bus-'+arr[i].id).css('color','blue'):false;//hora
clr <1800000 ? $('#lg-bus-'+arr[i].id).css('color','green'):false;// 1/2hora
clr <900000 ? $('#lg-bus-'+arr[i].id).css('color','orange'):false;// 1/4 hora
n>(arr[i].hrs*1000) ? $('#lg-bus-'+arr[i].id).css('color','red'):false; // não fechado e passou do tempo
arr[i].estado == 'Fechado' ? $('#services-'+arr[i].id).hide():false; //fechado e passou do tempo.
}
}
},
 error:function(){
/*
  $('.back').fadeOut();
   $('.debug-url').html('Não foi possivel obter os dados dos serviços a realizar no prazo de 90 minutos" , p.f. verifique a ligação Wi-Fi.');
   $("#mensagem_ko").trigger('click');*/
    }
  });
} 

/*PARA TODO OS INTERVALO DO TEMPO REAL*/
function stopIntervals() {
clearInterval(interval0, interval1, interval2, interval3);
}

/*INTERVALO 1" PARA MOSTAR RELOGIO */
var interval0 = setInterval(function(){
myClock(); }, 1000);

/*INTERVALO 7" PEDIDO SERVIDOR DOS ESTADOS DOS SERVIÇOS */
var interval1 = setInterval(function(){ 
  getStaffLogfile();
}, 7000);

/*INTERVALO 8.5" PARA MOSTAR RELOGIO */
var interval2 = setInterval(function(){
currentServices();
}, 8500);



/*INTERVALO 30" PEDIDO AO SERVIDOR DOS PONTOS GPS ENVIADOS PARA A BD */
var interval3 = setInterval(function(){
  getStaffPositions();
  clearOverlays();
  ShowAll(); 
}, 30000);


/*INTERVALO 7.5" PEDIDO SERVIDOR DOS ESTADOS DOS SERVIÇOS 
var interval1 =  setInterval(function(){ getStaffLogs();}, 8000);
INTERVALO 15" PEDIDO SERVIDOR DOS ESTADOS DOS SERVIÇOS 
var interval2 =  setInterval(function(){ getStaffLogsT();}, 14000);*/




/*MOSTRA/FECHA OS SERVIÇOS EM TEMPO REAL */
function showRealTime(){
  if ($("#real_time_container").hasClass('open')){
    $('.myrealtime').hide();
    $('.myrealtime').attr("title","Ver Em Tempo Real");
    $("#real_time_container").animate({top: '150vh'}).removeClass('open');
setTimeout(function(){  
    $('.myrealtime').fadeIn();
}, 500);
  }
  else {
$('.myrealtime').hide();
    $('.myrealtime').attr("title","Fechar Em Tempo Real");
    $("#real_time_container").animate({top: '0'}).addClass('open');
setTimeout(function(){  
    $('.myrealtime').fadeIn();
}, 500);
  }
}

/*RELOGIO NO CABECALHO TEMPO REAL*/
function myClock() {
  d = new Date();
  s = d.getSeconds();
  m = d.getMinutes();
  h = d.getHours();
  s < 10 ? s = '0'+ s : s;
  m < 10 ? m = '0'+ m : m;
  h < 10 ? h = '0'+ h : h;
  $('#timenow').text(moment().format(h+':'+m+':'+s));
  $('.timenow').text(moment().format(h+':'+m));
}

/* EXPANDE CABECALHO DO LOG FILE TEMPO REAL, O DO INTERVALO 15"*/
function showTeamLogs(){
if (!$("#panel-heading").hasClass('isopen')){
  $('#panel-heading').addClass('isopen');
  $('#panel-heading').addClass('heading_full').removeClass('heading_small');
  $('#ontime_container').removeClass('ontime_full').addClass('ontime_small');
  $('.ontime_small').fadeOut();
  $('.seemore').attr('title','Fechar ver mais...').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');}
else{
  $('#panel-heading').removeClass('isopen');
  $('#panel-heading').removeClass('heading_full').addClass('heading_small');
  $('.ontime_small').fadeIn();
  $('#ontime_container').removeClass('ontime_small').addClass('ontime_full');
  $('.seemore').attr('title','Abrir ver mais...').addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');}
}

flag_map_staff='';
function myStaff(){
if (!flag_map_staff){
  staff = JSON.parse(localStorage.getItem("markers"));
  for(i=0;i<staff.length;i++){

st = '"'+staff[i].equipa+'"';
    $(".inner_scr_hrz").css('width',(i+2)*100+'px').append("<button style='padding:3px;' class='btn btn-sm btn-default item color-"+i+"'  title ='Centrar mapa no staff, "+staff[i].equipa+"' onclick='newMap("+st+")'>"+staff[i].equipa+"</button>");
    flag_map_staff=1;
    }
  }
StartMapPositions();
}

var markers = [];
var markersArray = [];
var map;
var marker;

function newMap(st) {
    dataValue='action=5&staff='+st;
     $.ajax({ url:'services/action_services.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
    arr=[];
    arr =  JSON.parse(data);
 if (arr == null || arr.length < 1|| !arr[0].lat || !arr[0].lng ){
   $('.debug-url').html('Não existem Coordenadas do Staff <strong>'+st+'</strong>, p. f. tente novamente mais tarde.');
   $("#mensagem_ko").trigger('click');
} 
else{
 var myLatlng = {lat: parseFloat(arr[0].lat), lng: parseFloat(arr[0].lng)};
    var mapOptions = {
   center: myLatlng,
        zoom: 16,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("mymap"), mapOptions);
        ShowAll();
}



},
    error:function(){
   $('.debug-url').html('Não foi possivel obter GPS da Viatura, p.f. verifique a ligação Wi-Fi ou rede.');
   $("#mensagem_ko").trigger('click');
    }
  });
};

function SetMarker(position) {
    //Set Marker on Map.
    var data = markers[position];
    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
    marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: data.icon,
        title: data.equipa
    });
    markersArray.push(marker);
};

/* CRIA/MOSTRA TODOS OS ELEMENTOS DA EQUIPA NO MAPA */
function ShowAll(){
    markers = JSON.parse(localStorage.getItem("markers"));
      if (markers == null || markers.length < 1){
      return false;
      }
      else {
       for(i=0;i<markers.length;i++){
        markers[i].icon='markers/'+i+'_Marker'+markers[i].equipa.charAt(0)+'.png';
        SetMarker(i);
       }  
     }
}

/* APAGAR TODOS OS MARKERS DA EQUIPA E METE NOVAS POSIÇÕES NO MAPA */
function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray.length = 0;
}


function carRoute(m){
    dataValue='action=4&matricula='+m;
     $.ajax({ url:'services/action_services.php',
    data:dataValue,
    type:'POST', 
    cache:false,
    success:function(data){
    arr=[];
    arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){    
       $('.debug-url').html('Não dados gps da viatura.');
       $("#mensagem_ko").trigger('click');
       return;
      }
      else {

   localStorage.removeItem("carRoute");
   localStorage.setItem("carRoute", data);
   window.open('rotas.php', '_blank');

   }    
},
    error:function(){/*
   $('.debug-url').html('Não foi possivel obter GPS da Viatura, p.f. verifique a ligação Wi-Fi ou rede.');
   $("#mensagem_ko").trigger('click');*/
    }
  });
} 

function searchServic(id){
transfersLinks(2);
searchServiceIdr(id);
}

function searchServiceIdr(id){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=7&id='+id;
     $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não foram encontrados Registos, pf modifique a pesquisa!');
        $("#mensagem_ko").trigger('click');
        $(".back").fadeOut();
        $('#delete_team').empty();
      }
      else {
        $("#delete_team").empty();
        $('.btn-print').removeClass('disabled');
        for(i=0;i<arr.length;i++){
        data_out = moment(arr[i].data_servico*1000).format("DD/MM/YYYY");
        hora_out = moment(arr[i].hrs*1000).format("H:mm");

arr[i].cobrar_direto ? cob_dir = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€":cob_dir = '--/--';
arr[i].cobrar_operador ? cob_ope = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€":cob_ope = '--/--';

          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

       $("#delete_team").append("<div class='row' id='del_registry_"+arr[i].id+"'><div class='servico'><h5 class='col-xs-12'><span class='label label-default mylabel' style='padding: 4px;'><span class='glyphicon glyphicon-tags'></span> Serviço</span></h5><div class='bd myid col-md-1 col-sm-3 col-xs-6'><label>ID</label><br/><input style='cursor:not-allowed;' type='text' id='col-0-"+arr[i].id+"' class='frm-item form-control' readonly='true' value='"+arr[i].id+"'><font>"+arr[i].id+"</font></div><div class='bd myref col-md-2 col-sm-3 col-xs-6'><label>Ref</label><br/><input data-toggle='tooltip' data-placement='top' title='Ao alterar a Referência verifique se tem retorno, se sim tem que alterar ambas as Referências (valores iguais)!' type='text' id='col-1-"+arr[i].id+"' class='frm-item form-control'value='"+arr[i].referencia+"'><font>"+arr[i].referencia+"</font></div><div class='bd mydata col-md-2 col-sm-3 col-xs-6'><label>Data</label><br><input type='text' id='col-2-"+arr[i].id+"' class='datetimepicker_dt frm-item form-control' value='"+data_out+"'><font>"+data_out+"</font></div><div class='bd myhora col-md-1 col-sm-3 col-xs-6'><label>Hora</label><br/><input type='text' id='col-3-"+arr[i].id+"' class='datetimepicker_h frm-item form-control' value='"+hora_out+"'><font>"+hora_out+"</font></div><div class='bd mystaff col-md-2 col-sm-6 col-xs-6'><label>Staff</label><br><select id='col-4-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><font>&nbsp;"+arr[i].staff+"</font></div><div class='bd myservico col-md-2 col-sm-6 col-xs-6'><label>Servico</label><br><select id='col-5-"+arr[i].id+"' class='add_servico frm-item form-control'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><font>&nbsp;"+arr[i].servico+"</font></div><div class='bd myestado col-md-1 col-sm-6 col-xs-6'><label>Estado</label><br><select id='col-6-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option> <option value='Aguarda'> Aguarda</option><option value='Aceite'> Aceite</option><option value='Rejeitado'> Rejeitado</option><option value='Iniciado'> Iniciado</option><option value='Fechado'> Fechado</option></select><font>&nbsp;"+arr[i].estado+"</font></div><div class='bd mymatricula col-md-1 col-sm-6 col-xs-6'><label>Matricula</label><br><select id='col-7-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+matr+"'>"+matr+"</option></select><font class='txt_matr'>&nbsp;"+matr+"</font></div></div><div class='cliente'><h5 class='col-xs-12'><span class='label label-default mylabel' style='padding: 4px;'><span class='glyphicon glyphicon-user'></span> Cliente </span></h5><div class='bd myvoo col-md-2 col-sm-6 col-xs-6'><label>Nº Voo</label><br><input type='text' id='col-8-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].voo+"'><font>&nbsp;"+arr[i].voo+"</font></div><div class='bd mynome col-md-2 col-sm-6 col-xs-6'><label>Nome</label><br><input type='text' id='col-9-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].nome_cl+"'><font>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd myemail col-md-2 col-sm-6 col-xs-6'><label>Email</label><br><input type='text' id='col-10-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].email+"'><font>&nbsp;"+arr[i].email+"</font></div><div class='bd mytel col-md-2 col-sm-6 col-xs-6'><label>Telefone</label><br><input type='text' id='col-11-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].telefone+"'><font>&nbsp;"+arr[i].telefone+"</font></div><div class='bd mypais col-md-2 col-sm-12 col-xs-12'><label>Pais</label><br><input type='text' id='col-12-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].pais+"'><font>&nbsp;"+arr[i].pais+"</font></div><div class='bd myrec col-md-2 col-sm-6 col-xs-12'><label>Recolha</label><br><input type='text' id='col-13-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_recolha+"'><font>&nbsp;"+arr[i].local_recolha+"</font></div><div class='bd myent col-md-2 col-sm-6 col-xs-12'><label>Entrega</label><br><input type='text' id='col-14-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_entrega+"'><font>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd myptref col-md-4 col-sm-12 col-xs-12'><label>P. Referência</label><br><input type='text' id='col-15-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ponto_referencia+"'><font>&nbsp;"+arr[i].ponto_referencia+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Adulto</label><br><input type='number' min='1' id='col-16-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].px+"'><font>&nbsp;"+arr[i].px+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Criança</label><br><input type='number' min='0' id='col-17-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cr+"'><font>&nbsp;"+arr[i].cr+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Bébé</label><br><input type='number' min='0' id='col-18-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].bebe+"'><font>&nbsp;"+arr[i].bebe+"</font></div><div class='bd myobs col-sm-12 col-xs-12'><label>Observações</label><br><input type='text' id='col-19-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].obs+"'><font>&nbsp;"+arr[i].obs+"</font></div></div><div class='operador col-xs-12 col-md-6'><h5 class=''><span class='label label-default mylabel' style='padding: 4px;'><span class='glyphicon glyphicon-tower'></span> Operador</span></h5><div class='bd col-sm-6 xs6 col-xs-6'><label>Operador</label><br><select id='col-20-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><font>&nbsp;"+arr[i].operador+"</font></div><div class='bd xs6 col-sm-6 col-xs-6'><label>Ticket</label><br><input type='text' id='col-21-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ticket+"'><font>&nbsp;"+arr[i].ticket+"</font></div></div><div class='cobrancas col-md-6 col-xs-12'><h5 class=''><span class='label valor label-default mylabel' style='padding: 4px;'><span class='glyphicon glyphicon-eur'></span> Cobranças</span></h5><div class='bd col-sm-6 col-xs-6'><label>Cob.Operador</label><br><input type='number' min='0' step='any' id='col-22-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_operador+"'><font>"+cob_ope+"</font></div><div class='bd col-xs-6 col-sm-6'><label>Directo</label><br><input type='number' step='any' min='0' id='col-23-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_direto+"'><font>"+cob_dir+"</font></div></div><div class='col-md-12 col-xs-12' style='margin-top:15px;' id='action-"+arr[i].id+"'><div class='btn-group btn-group' style='float: right;' role='group'><button title='Apagar Registo' class='btn btn-danger btn-sm' onclick='confirmDeleteRegistries("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Registo' onclick='showFrmRegistry("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span</button></div></div></div><hr class='twoway'>");
    }
    }
showRealTime();
    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter dados dos Registos, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 750);
}
