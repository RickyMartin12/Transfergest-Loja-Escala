<style>
.show_days{background:#d9edf7;}
.hh, .day_more, .cmx_calc,.payments{display:none;}
.gly{padding-left:2px;padding-right:2px;}
td,th{font-size:12.5px;}
.payments{margin-bottom: 30px; border-color:#DDD;}
</style>

<div class="expensies-filters">
  <div class="company"></div>
  <div class="panel panel-default no-print">
    <div class="panel-heading my-orange">
      <div class="row">
        <div class="col-md-6">
          <h3 class="panel-title" style="color:#000!important;">
           <span class="glyphicon glyphicon-user"></span> Cobranças
          </h3>
        </div>
        <div class="col-md-6" style="text-align: right;">
          <a href="#" onclick='verifyExpensies()' class="validated btn btn-primary disabled" title="Validar Despesas"><span class="glyphicon glyphicon-saved"></span></a>
          <a href="#" onclick='Services()' class="received btn btn-success disabled" title="Validar serviços como valor recebido no campo Cob.Direto"><span class="glyphicon glyphicon-eur"></span></a>
          <a href="#" onclick='searchStaffDailyProvits($("#staff_name").val(),$("#paymentfilterdates").val(),$("#day_date").val(),$("#date_ini").val(),$("#date_fim").val())' class="btn btn-info" title="Atualizar pesquisa"><span class="glyphicon glyphicon-filter"></span></a>
          <a href="#" class="btn btn-default btn-print hidden-xs disabled" onclick='goToPrint(3);' title="Imprimir Relatório"><span class="glyphicon glyphicon-print"></span></a>
        </div>
      </div>
      <div class="search_results">
        <div class="form-group">
          <h3 style="text-align:center; font-size:21px;">
            <span class="label label-default" id="nr_resultados" style="padding: 10px;"></span>
          </h3>
        </div>
      </div>
      <div class="searchprint"></div>
      <div class="row nosearchprint no-print">
        <div class="col-sm-3 col-xs-12 staff_date">
          <div class="form-group input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <select type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Nome Staff">
            </select>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12">
          <div class="form-group input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            <select class="form-control" id="paymentfilterdates" onchange="paymentFilterDates(this.value)">
              <option value="">Escolha Data</option>
              <option value="1"> Dia </option>
              <option value="2"> Entre Datas </option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 col-xs-12 in_date" style="display:none;">
          <div class="form-group input-group datetimepicker_se">
            <input type="text" readonly="" class="form-control" id="day_date" name="day_date" placeholder="Dia da pesquisa">
            <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
        <div class='col-sm-3 col-xs-12 between_date' style="display:none;">
          <div class="form-group input-group" id="datetimepicker6">
            <input type="text" readonly class="form-control" id="date_ini" name="date_ini" placeholder="Dia Inicio pesquisa">
            <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
        <div class='col-sm-3 col-xs-12 between_date' style="display:none;">
          <div class="form-group input-group" id="datetimepicker7">
            <input type="text" readonly class="form-control" id="date_fim" name="date_fim" placeholder="Dia Fim pesquisa">
            <span class="input-group-addon" style="cursor:pointer;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class='panel panel-default payments'>
  <div class='panel-heading'>
    <h3 class='panel-title'>
      <i class="fa fa-list-alt"></i><span style='float: right;' class='daily-name'></span> Relatório
    </h3>
  </div>
  <div class="daily_team_in">
    <span class='label label-default'>Cobranças</span>
    <table class='table' style='margin-bottom: 0px;'>
      <thead style='background: #dedede'>
        <tr>
          <th>ID#</th>
          <th>Hora</th>
          <th>Recolha</th>
          <th>Entrega</th>
          <th class='nr'>Cob.Operador</th>
          <th class='nr'>Cob.Direto</th>
        </tr>
      </thead>
      <tbody id='daily_team_in'>
      </tbody>
    </table>
  </div>
  <div class="daily_team_out">
    <span class='label label-default'>Despesas</span>
    <table class='table' style='margin-bottom: 0px;'>
      <thead style='background: #dedede'>
        <tr>
          <th>ID#</th>
          <th>Matricula</th>
          <th class='nr'>Combustivel</th>
          <th class='nr'>Lavagem</th>
          <th class='nr'>Portagem</th>
          <th class='nr'>Parque</th>
          <th class='nr'>Diversos</th>
          <th class='nr'>Tipo</th>
          <th class='nr'>Valor</th>
        </tr>
      </thead>
      <tbody id='daily_team_out'>
      </tbody>
    </table>
  </div>
  <div class="daily_team_total">
    <span class='label label-default'>Totais</span>
    <table class='table' style='margin-bottom: 0px;'>
      <thead style='background: #dedede'>
        <tr>
          <th>Descrição</th>
          <th class='nr'>Valor</th>
        </tr>
      </thead>
      <tbody id='daily_team_total'>
      </tbody>
    </table>
  </div>
</div>

<div class='signatures row'>
  <div class="col-xs-5" style="border-bottom:1px solid #000;">Administrador:<p></p></div>
  <div class="col-xs-2"></div>
  <div class="col-xs-5" style="border-bottom:1px solid #000;">Staff:<p></p></div>
</div>

<script>

  $('#datetimepicker6').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt'});    
  
  $('#datetimepicker7').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY HH:mm', locale: 'pt', useCurrent: false});
  
  $("#datetimepicker6").on("dp.change", function (e) {
    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
  });
  
  $("#datetimepicker7").on("dp.change", function (e) {
    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
  });
    
  $('.datetimepicker_se').datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt'});

  arr = JSON.parse(localStorage.getItem("staff"));
  opt='<option selected disabled value="">Staff</option>';
  for (i=0;i<arr.length;i++){
  opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
  }

  $('#staff_name').html(opt).select2();


  services=[];
  expensies_arr=[];

function searchStaffDailyProvits(st,tp,dt,dti,dtf){
/*PESQUISA PELO DIA*/
  if (st && tp=='1' && dt)
   callDailyProvits('action=11&nome='+st+'&data='+dt,dt);
/*PESQUISA ENTRE DATAS*/
  else if(st && tp=='2' && dti && dtf)
    callDailyProvits('action=16&nome='+st+'&data_ini='+dti+'&data_fim='+dtf,dti+' a '+dtf);
  else{
    $('.payments').hide();
    $('#Modalko .debug-url').html('Os campos para pesquisa estão vazios!!');
    $("#mensagem_ko").trigger('click');
    setTimeout(function(){$('.close').trigger('click');},2500);
  }
}

function callDailyProvits(vl,tm) {
txt = '';
txte = '';
services.splice(0);
expensies_arr.splice(0);

$('.back').fadeIn();

  $.ajax({ url:'team/action_team.php',
    data:vl,
    type:'POST',
    cache:false,
    success:function(data){
    $('.back').fadeOut();
    staff=''; tcop=0; tcomb=0; tcdi=0; tot_out=''; income=''; expensies=''; tlav=0; tport= 0; tdiv=0; tpar=0; desp=0; tfa=0;
    t1=0; t2=0; t3=0; t4=0; t5=0; t6=0; tot_2=0;
    arr=[];
    arr =  JSON.parse(data);
    if (arr == null || arr.length < 1 ){
       $('#Modalko .debug-url').html('Não foram encontrados Registos, p.f. modifique a pesquisa!');
       $("#mensagem_ko").trigger('click');
       $('#daily_team_in, #daily_team_out, #daily_team_total, .daily-name').empty();
       $('.daily_team_out, .daily_team_in, .daily_team_total, .payments').hide();
       $('.btn-print,.received,.validated').addClass('disabled');
       return false;
    }
    else{
       $('.payments').show();
      if (arr.prov == null || arr.prov.length < 1 ){
        $('.daily_team_in').hide();
        $('.received').addClass('disabled');
        }
        else {
         $('.received').removeClass('disabled');
         for(i=0;i<arr.prov.length;i++){
          staff = arr.prov[i].staff;
          hora= moment(arr.prov[i].hrs*1000).format("H:mm");
          if(arr.prov[i].cobrar_operador && arr.prov[i].cobrar_operador != 0){
           services.push(arr.prov[i].id);
           txt += arr.prov[i].id+", ";
           cop = parseFloat(arr.prov[i].cobrar_operador).toFixed(2)+"€";
           tcop += parseFloat(arr.prov[i].cobrar_operador)
          }
          else cop = '-/-';
          if(arr.prov[i].cobrar_direto){
           txt += arr.prov[i].id+", ";
           services.push(arr.prov[i].id);
           cdi = parseFloat(arr.prov[i].cobrar_direto).toFixed(2)+"€";
           tcdi += parseFloat(arr.prov[i].cobrar_direto);
          }
          else cdi = '-/-';
         income += "<tr><td class='closeservices'>"+arr.prov[i].id+"</td><td>"+hora+"</td><td>"+arr.prov[i].local_recolha+"</td><td>"+arr.prov[i].local_entrega+"</td><td class='nr'>"+cop+"</td><td class='nr'>"+cdi+"</td></tr>";
         }
         $('.daily_team_total, .daily_team_in, .payments').show();
         $('.btn-print').removeClass('disabled');
        }   
       if (arr.dev == null){
        $('.daily_team_out').hide();
        $('.validated').addClass('disabled');
        }
       else {
         $('.validated').removeClass('disabled'); 
        for(i=0;i<arr.dev.length;i++){

           txte += arr.dev[i].nid+",";
           expensies_arr.push(arr.dev[i].nid);

          fs = arr.dev[i].matricula.substring(0, 2);
          md = arr.dev[i].matricula.substring(2, 4);
          fn =arr.dev[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

         arr.dev[i].tipo_despesa ? tpdespesa =  arr.dev[i].tipo_despesa : tpdespesa='-/-';

         if(arr.dev[i].total){
           fa = parseFloat(arr.dev[i].total).toFixed(2)+"€";
           tfa +=  parseFloat(arr.dev[i].total);            
         }
          else fa='-/-'


          if(arr.dev[i].combustivel){
           comb = parseFloat(arr.dev[i].combustivel ).toFixed(2)+"€";
           tcomb +=  parseFloat(arr.dev[i].combustivel);            
          }
          else comb ='-/-';
          if(arr.dev[i].lavagem){
           lav = parseFloat(arr.dev[i].lavagem ).toFixed(2)+"€";
           tlav +=  parseFloat(arr.dev[i].lavagem);            
          }
          else lav ='-/-';
          
          if(arr.dev[i].portagem){
           port = parseFloat(arr.dev[i].portagem ).toFixed(2)+"€";
           tport += parseFloat(arr.dev[i].portagem);   
          }
          else port ='-/-';
         
          if(arr.dev[i].diversos){
           div = parseFloat(arr.dev[i].diversos ).toFixed(2)+"€"
           tdiv += parseFloat(arr.dev[i].diversos);
          }
          else div ='-/-';
          if(arr.dev[i].parque){
           par = parseFloat(arr.dev[i].parque ).toFixed(2)+"€" 
           tpar += parseFloat(arr.dev[i].parque);
          }
          else par ='-/-';

expensies += "<tr><td>"+arr.dev[i].nid+"</td><td>"+matr+"</td><td class='nr'>"+comb+"</td><td class='nr'>"+lav+"</td><td class='nr'>"+port+"</td><td class='nr'>"+par+"</td><td class='nr'>"+div+"</td><td class='nr'>"+tpdespesa+"</td><td class='nr'>"+fa+"</td></tr>";
       }
       $('.daily_team_total, .daily_team_out').show();
       $('.btn-print').removeClass('disabled');
     }
}

tcop ? tcop = parseFloat(tcop).toFixed(2)+"€": tcop = '-/-';
tcdi ? tcdi = parseFloat(tcdi).toFixed(2)+"€": tcdi = '-/-';
sub_tot_in ="<tr style='background: #eee;'><td>Sub-total</td><td></td><td></td><td></td><td class='nr'>"+tcop+"</td><td class='nr'>"+tcdi+"</td></tr>";
$("#daily_team_in").html(income+""+sub_tot_in);

if(tcomb){ t1=tcomb; tcomb = parseFloat(tcomb).toFixed(2)+"€";} else tcomb = '-/-';
if(tlav) { t2=tlav; tlav = parseFloat(tlav).toFixed(2)+"€";} else tlav = '-/-';
if(tport) { t3=tport; tport = parseFloat(tport).toFixed(2)+"€";} else tport = '-/-';
if(tpar) { t4=tpar; tpar = parseFloat(tpar).toFixed(2)+"€";} else tpar = '-/-';
if(tdiv) { t5=tdiv; tdiv = parseFloat(tdiv).toFixed(2)+"€";}else  tdiv = '-/-';
if(tfa) { t6=tfa; tfa = parseFloat(tfa).toFixed(2)+"€";}else  tfa = '-/-';

sub_tot_out = "<tr style='background: #eee;'><td>Sub-total</td><td></td><td class='nr'>"+tcomb+"</td><td class='nr'>"+tlav+"</td><td class='nr'>"+tport+"</td><td class='nr'>"+tpar+"</td><td class='nr'>"+tdiv+"</td><td class='nr'>-/-</td><td class='nr'>"+tfa+"</td></tr>";

$("#daily_team_out").html(expensies+""+sub_tot_out);
$('.daily-name').html("<strong>Staff</strong>: "+staff+"<strong> Dia(s)</strong>: "+tm); 

$("#daily_team_total").html(tot_out);

desp = t1+t2+t3+t4+t5+t6;

tot_2 = parseFloat(tcdi)-parseFloat(desp);
tot_2 ? tot_2 = "<td class='nr'><strong>"+parseFloat(tot_2).toFixed(2)+"€</strong></td>" : tot_2="<td class='nr'>-/-</td>";
desp || desp != '0' ? desp = "<td class='nr' style='color:red'>"+parseFloat(desp).toFixed(2)+"€</td>": desp="<td class='nr'>-/-</td>";

tot_out = "<tr><td>Cob.Direto</td><td class='nr'>"+tcdi+"</td></tr><tr'><td>Despesas</td>"+desp+"</tr><tr style='background: #eee;'><td>Total (Cob.Direto - Despesas) </td>"+tot_2+"</tr>";

$("#daily_team_total").html(tot_out);

    },
    error:function(data){
      $('.back').fadeOut();
      $('.payments').hide();
      $('#Modalko .debug-url').html('P.f. verifique a ligação Wi-fi.!');
      $("#mensagem_ko").trigger('click');
      setTimeout(function(){$('.close').trigger('click');},2500);
    }
  });
}



function verifyExpensies(){
if (expensies_arr.length >=1){
bootbox.dialog({
  message: "Tem a certeza que pretende validar "+expensies_arr.length+" despesa(s) com ID: <strong>"+txte+"</strong>?<br>O valor total validado é: "+desp+".</strong>",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-saved'></span> Validar",
      className: "btn-warning",
      callback: function() {
      dataValue = JSON.stringify(expensies_arr);
      $.ajax({ 
      url:'team/action_verify_expensies.php',
      data: {data : dataValue}, 
      type:'POST',
      cache:false,
      success: function(data){
       if(data.match(/1/g)){  
         $('.debug-url').html(+expensies_arr.length+' despesa(s) com ID: <strong>'+txte+'</strong> validada(s).');
         $("#mensagem_ok").trigger('click');
         $('.validated').addClass('disabled');
         txte='';
         setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
       }
       else if(data.match(/0/g)){
         $('.debug-url').html(expensies_arr.length+' despesa(s) com ID: <strong>'+txte+'</strong> não validada(s), p.f. tente novamente.');
         $("#mensagem_ko").trigger('click');
       }
     },
      error:function(data){
$('.debug-url').html('A(s) '+expensies_arr.length+' despesas(s) com ID: <strong>'+txte+'</strong> não validada(s), p.f. verifique a ligação Wi-Fi.');
$("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}
else{
$('.debug-url').html('Não tem Despesas para Validar, p.f modifique a pesquisa.');
$("#mensagem_ko").trigger('click');
}
}



flag = 0;
function paymentFilterDates(vl){
switch (vl){

case '0': $('.in_date, .between_date').hide();
$('#day_date, #date_ini, #date_fim').val('');
flag = 0;
break;

case '1': $('.in_date').show();$('.between_date').hide();
$('#date_ini, #date_fim').val('');
flag = 1;
break;

case '2': $('.in_date').hide();$('.between_date').show();
$('#day_date').val('');
flag = 2;
break;

default:$('.in_date, .between_date').hide();
$('#day_date, #date_ini, #date_fim').val('');
flag = 0;
break;
}

}



function Services(){
if (services.length >=1){
bootbox.dialog({
  message: "Tem a certeza que pretende validar "+services.length+" serviço(s) com ID: <strong>"+txt+"</strong> como recebidos no Campo Cobranças Direto?<br>O valor total é de: "+tcdi+".</strong>",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-eur'></span> Validar",
      className: "btn-warning",
      callback: function() {
      dataValue = JSON.stringify(services);
      $.ajax({ 
      url:'team/action_close_pay.php',
      data: {data : dataValue}, 
      type:'POST',
      cache:false,
      success: function(data){
       if(data.match(/1/g)){  
         $('.debug-url').html('O(s) '+services.length+' serviço(s) com ID: <strong>'+txt+'</strong> validado(s) como Recebido(s).');
         $("#mensagem_ok").trigger('click');
         $('.received').addClass('disabled');
         txt='';
         setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
       }
       else if(data.match(/0/g)){
         $('.debug-url').html('O(s) '+services.length+' serviço(s) com ID: <strong>'+txt+'</strong> não validado(s), p.f. tente novamente.');
         $("#mensagem_ko").trigger('click');
       }
     },
      error:function(data){
$('.debug-url').html('O(s) '+services.length+' serviço(s) com ID: <strong>'+txt+'</strong> não validado(s), p.f. verifique a ligação Wi-Fi.');
$("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}
else{
$('.debug-url').html('Não tem Cobranças Direto para Validar, p.f modifique a pesquisa.');
$("#mensagem_ko").trigger('click');
}
}



</script>