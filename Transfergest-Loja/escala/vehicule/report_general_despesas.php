<style type="text/css">
.table{margin-bottom:0px;}
.txt-r{float:right;}
.line-grey {text-align: center;padding: 5px;border-left: 1px solid #ccc;}
.bdr-w{text-align:right;padding: 4px;}
.red { background-color: #d9534f!important;color: #fff;border-color: #d9534f!important;}
.green { background-color: #5cb85c!important; color: #fff; border-color: #5cb85c!important;}
.panel-body {padding: 0px;}
.line-green {border-top: 2px solid #5cb85c!important;}
.line-red {border-top: 2px solid #d9534f!important; }
.line-blue {border-top: 2px solid #5bc0de!important;}
.myfoot{ color: #333; background-color: #FFB231!important;}
.between_days, .one_day, .tipo_pesquisa, #table-expensies{display:none;}
</style>

<div class="panel panel-default">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12 col-md-6 col-lg-6">
        <i class="fa fa-university"></i> Despesas Viaturas
      </h3>
      <div class="col-xs-12 col-md-6 col-lg-6" style="text-align:right;">
        <button type="reset" class="btn btn-default btn-reset"><span class="glyphicon glyphicon-erase"></span><font class='hidden-xs'> Limpar</font></button>
        <button onclick="PesquisaValoresRelatorioGeral($('#fornecedor').val(),$('#nome_fornecedor').val(),$('#tipo_dia').val(), $('#data_dia').val(),$('#data_inicio').val(), $('#data_fim').val())" class="btn btn-info"><span class="glyphicon glyphicon-search"></span><font class='hidden-xs'> Pesquisa</font></button>
      </div>
    </div>
  </div>

  <div class="panel-body" id="form_result_viature" >

    <div class="row">

      <div class='col-md-3 col-xs-12' style="display:none;">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><i class="fa fa-life-ring"></i></span>
          <select class="form-control" id="fornecedor" onchange="select_valor(this.value)">
            <option value="0"selected>Tudo(Staff & Matricula)</option>
            <option value="1">Staff</option>
            <option value="2">Matricula</option>
          </select>
        </div>
      </div>
      <div class='col-md-3 col-xs-12 tipo_pesquisa' style="display:none;">
        <div class='input-group'>
          <span class='input-group-addon req ft18'><span class='fa fa-list-alt'></span></span>
          <select type='text' class='form-control' disabled id='nome_fornecedor'></select>
        </div>
      </div>

      <div class='col-md-3 col-xs-12'>
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="glyphicon glyphicon-calendar"></span></span>
          <select class="form-control" id="tipo_dia" onchange="tipo_dia(this.value)">
            <option value=""selected>Escolha Data</option>
            <option value="1">Dia</option>
<!--
            <option value="2">Entre Dias</option>
-->
          </select>
        </div>
      </div>

      <div class='col-md-3 col-xs-12 one_day'>
        <div class="form-group input-group" id="data_d">
          <input type="text" title="Data" class="form-control" name="data_dia" id="data_dia" placeholder="Data" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>

      <div class='col-md-3 col-xs-12 between_days'>
        <div class="form-group input-group" id="data_value">
          <input type="text" title="Data Inicio" class="form-control" name="data_inicio" id="data_inicio" placeholder="Data Inicio" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>

      <div class='col-md-3 col-xs-12 between_days'>
        <div class="form-group input-group" id="data_value_fim"> 
          <input type="text" title="Data Fim"  class="form-control" name="data_fim" id="data_fim" placeholder="Data Fim" readonly>
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>  
  </div>
  <div class="panel-footer my-orange"></div>
</div>


<div id="search"></div>


  <div class="panel panel-default" id="table-expensies">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12"><i class="fa fa-university"></i> Resultados</h3>
    </div>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="my-gray">
          <th class='bdr-w'>ID</th>
          <th class='bdr-w'>Data</th>
          <th class='bdr-w'>Motorista</th>
          <th class='bdr-w'>Matricula</th>
          <th class='bdr-w'>Despesa</th>
          <th class='bdr-w'>Fatura</th>
          <th class='bdr-w'>Entidade</th>
          <th class='bdr-w'>Coordenadas GPS</th>
          <th class='bdr-w'>Hora</th>
          <th class='bdr-w'>KM</th>
          <th class='bdr-w line-green'>Combustivel</th>
          <th class='bdr-w line-green'>Portagens</th>
          <th class='bdr-w line-green'>Lavagem</th>
          <th class='bdr-w line-green'>Parque</th>
          <th class='bdr-w line-green'>Outra</th>
          <th class='bdr-w line-red'>Mecânica</th>
          <th class='bdr-w line-red'>Revisão</th>
          <th class='bdr-w line-red'>Sinistro</th>
          <th class='bdr-w line-red'>Outra</th>
          <th class='bdr-w line-blue'>Selo</th>
          <th class='bdr-w line-blue'>Inspecção</th>
          <th class='bdr-w line-blue'>Seguro</th>
          <th class='bdr-w line-blue'>Renda</th>
          <th class='bdr-w'>Observações</th>
        </thead>
        <tbody id="exp_table_head">
        </tbody>
        <tfoot id='exp_table_footer' class="my-gray">
        </tfoot>
      </table>
    </div>
  </div>
  <div class="panel-footer my-orange"></div>
</div>


<script>

  $("#data_value, #data_d").datetimepicker({
    ignoreReadonly: true, format: 'DD/MM/YYYY',locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});

  $("#data_value_fim").datetimepicker({
    ignoreReadonly: true, format: 'DD/MM/YYYY', locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});

  $("#data_value").on("dp.change", function (e) {
      $("#data_value_fim").data("DateTimePicker").minDate(e.date);
  });
    
  $("#data_value_fim").on("dp.change", function (e) {
      $("#data_value").data("DateTimePicker").maxDate(e.date);
  });

  $('.btn-reset').click(function(){
    $("#nome_fornecedor").val('0').change();
    $("#data_dia, #data_inicio, #data_fim, #fornecedor, #tipo_dia").val('');
    $('.between_days, .one_day, .tipo_pesquisa').hide(); 
    $("#nome_fornecedor").val('0').change().prop('disabled',true);
  })

  function tipo_dia(vl){
    if(vl== 1){$('.one_day').show(); $('.between_days').hide();}
    else if (vl== 2){ $('.between_days').show(); $('.one_day').hide();}
    else { $('.between_days, .one_day').hide(); $("#data_dia, #data_inicio, #data_fim").val('');}
  }

   function select_valor(vl){
    if (vl == '1'){
      $('.tipo_pesquisa').show();
      $("#nome_fornecedor").prop('disabled',false); 
      arr = JSON.parse(localStorage.getItem("staff"));
      opt='<option selected disabled value="">Staff *</option>';
      for (i=0;i<arr.length;i++){
        opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
      }
      $('#nome_fornecedor').html(opt).select2();
    }
    else if (vl == '2') 
    {
      $('.tipo_pesquisa').show();
      $("#nome_fornecedor").prop('disabled',false); 
      arr = JSON.parse(localStorage.getItem("matricula"));
      opt='<option selected disabled value="">Matricula *</option>';
      for (i=0;i<arr.length;i++){
        opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
      }
      $('#nome_fornecedor').html(opt).select2();
    }

    else {
      $('.tipo_pesquisa').hide();
      $("#nome_fornecedor").val('').change().prop('disabled',true);
    }
  }

  function PesquisaValoresRelatorioGeral(f,tf,td,d,di,df){

  /*PESQUISA TUDO NO DIA*/
  if (f==0 && td == 1 && d){ getExpensiesValues('action=19&data='+d);}

  /*PESQUISA TUDO ENTRE DATAS*/
  else if (f==0 && td == 2 && di && df ){getExpensiesValues('action=22&data_i='+di+'&data_f='+df);}

  /*PESQUISA TUDO NO DIA COM STAFF*/
  else if (f==1 && tf && td == 1 && d){ getExpensiesValues('action=21&data='+d+'&staff='+tf);} 

  /*PESQUISA TUDO ENTRE DATAS COM STAFF*/
  else if (f==1 && tf && td == 2 && di && df ){ getExpensiesValues('action=20&data_i='+di+'&data_f='+df+'&staff='+tf);}

  /*PESQUISA TUDO NO DIA COM MATRICULA*/
  else if (f==2 && tf && td == 1 && d){ getExpensiesValues('action=24&data='+d+'&matricula='+tf)} 

  /*PESQUISA TUDO ENTRE DATAS COM MATRICULA*/
  else if (f==2 && tf && td == 2 && di && df ){getExpensiesValues('action=23&data_i='+di+'&data_f='+df+'&matricula='+tf);}

  else{ $('.debug-url').html("Os campos para pesquisa estão vazios!!");
      $("#mensagem_ko").trigger('click');}

  }

  function getExpensiesValues (vl){
    sum_km = 0, sum_hrs = 0, sum_combs = 0, sum_portagens = 0, sum_lavagens = 0, sum_parque = 0, sum_outra1 = 0, sum_mecanica = 0, sum_revisao = 0, sum_sinistro = 0, sum_outra2 = 0, sum_selo = 0, sum_inspeccao = 0, sum_seguro = 0, sum_renda = 0, s = 0;
    var data_val ='';

    $('.back').fadeIn();
    setTimeout(function(){
      $.ajax({ url:'vehicule/action_expensies.php',
        data:vl,
        type:'POST',
        cache:false,
        success:function(data){
          $(".back").fadeOut();
          console.log(data);
          arr=[];
          arr = JSON.parse(data);
          if (arr == null || arr.length < 1){
            $('.debug-url').html('Não existem resultados!');
            $("#mensagem_ko").trigger('click');
            $('#search, #table-expensies').hide();
          }
          else { 

            for(i=0;i<arr.length;i++){
                matricula = arr[i].matricula;
                sum_km += arr[i].km;
                sum_hrs += (arr[i].horas_f - arr[i].horas_i);
                fs = matricula.substring(0, 2);
                md = matricula.substring(2, 4);
                fn = matricula.substring(4, 6);
                matr = fs+"-"+md+"-"+fn;
                if(arr[i].coord.length < 5 ) arr[i].coord ='-/-' ;

                //DIARIA
                
                arr[i].outra1 ? outra_diaria = parseFloat(arr[i].outra1).toFixed(2)+'€' : outra_diaria ='-/-';
                arr[i].Parque || arr[i].parque ? parque = parseFloat(arr[i].Parque).toFixed(2)+'€' : parque ='-/-';
                arr[i].Lavagem || arr[i].lavagem ? lavagem = parseFloat(arr[i].Lavagem).toFixed(2)+'€' : lavagem ='-/-';
                arr[i].Portagem || arr[i].portagem ? portagem = parseFloat(arr[i].Portagem).toFixed(2)+'€' : portagem ='-/-';
                arr[i].Combustivel || arr[i].combustivel ? combustivel = parseFloat(arr[i].Combustivel).toFixed(2)+'€' : combustivel ='-/-';

                if(arr[i].outra1)sum_outra1 += parseFloat(arr[i].outra1);
                if(arr[i].Parque)sum_parque += parseFloat(arr[i].Parque);
                if(arr[i].Lavagem)sum_lavagens += parseFloat(arr[i].Lavagem);
                if(arr[i].Portagem) sum_portagens += parseFloat(arr[i].Portagem);
                if(arr[i].Combustivel) sum_combs += parseFloat(arr[i].Combustivel);


                //MANUTENCAO
                var outra_manutencao = parseInt(arr[i].outra2);
                var sinistro = parseInt(arr[i].sinistro);
                var revisao = parseInt(arr[i].revisao);
                var mecanica = parseInt(arr[i].mecanica);

                isNaN(outra_manutencao) ? outra_manutencao = 0 : false;
                isNaN(sinistro) ? sinistro = 0 : false;
                isNaN(revisao) ? revisao = 0 : false;
                isNaN(mecanica) ? mecanica = 0 : false;

                //Manutencao
                sum_mecanica = sum_mecanica + mecanica;
                sum_revisao = sum_revisao + revisao;
                sum_sinistro = sum_sinistro + sinistro;
                sum_outra2 = sum_outra2 + outra_manutencao;       
              // Fixas
          var t = parseInt(arr[i].selo);
          //var inspeccao = parseInt(arr[i].inspeccao);
          var seguro = parseInt(arr[i].seguro);
          var renda = parseInt(arr[i].renda);
          isNaN(t) ? t = 0 : false;
          //isNaN(inspeccao) ? inspeccao = 0 : false;
          arr[i].inspeccao ? inspeccao = parseFloat(arr[i].outra1).toFixed(2)+'€' :  inspeccao ='-/-';
          isNaN(seguro) ? seguro = 0 : false;
          isNaN(renda) ? renda = 0 : false;

          //Fixas
          sum_selo = sum_selo + t;
          sum_inspeccao = sum_inspeccao + inspeccao;
          sum_seguro = sum_seguro + seguro;
          sum_renda = sum_renda + renda;
          data_val += "<tr><td class='line-grey'><font>"+arr[i].id+"</font></td><td class='line-grey'><font>"+arr[i].data+"</font></td><td class='line-grey'><font>"+arr[i].staff+"</font></td><td class='line-grey'><font>"+matr+"</font></td><td class='line-grey'><font>"+arr[i].tipo+"</font></td><td class='line-grey'><font>"+arr[i].fatura+"</font></td><td class='line-grey'><font>"+arr[i].entidade+"</font></a></td><td class='line-grey'><font>"+arr[i].coord+"</font></td><td class='line-grey'><font>"+arr[i].hora+"</font></td><td class='line-grey'><font>"+arr[i].km+"</font></td><td class='line-grey'><font class='txt-r'>"+combustivel+"</font></td><td class='line-grey'><font class='txt-r'>"+portagem+"</font></td><td class='line-grey'><font class='txt-r'>"+lavagem+"</font></td><td class='line-grey'><font class='txt-r'>"+parque+"</font></td><td class='line-grey'><font class='txt-r'>"+outra_diaria+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].mecanica+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].revisao+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].sinistro+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].outra2+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].selo+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].inspeccao+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].seguro+"</font></td><td class='line-grey'><font class='txt-r'>"+arr[i].renda+"</font></td><td class='line-grey'><font>"+arr[i].obs+"</font></td></tr>";
       }
       var hrs_tt = moment().startOf('day').seconds(sum_hrs).format('H:mm');
       $("#exp_table_head").html(data_val);


    sum_outra1 
  $("#exp_table_footer").html("<th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'>"+parseFloat(sum_combs).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_portagens).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_lavagens).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_parque).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_outra1).toFixed(2)+"</th><th class='bdr-w'>"+parseFloat(sum_mecanica).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_revisao).toFixed(2)+"</th><th class='bdr-w'>"+parseFloat(sum_sinistro).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_outra2).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_selo).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_inspeccao).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_seguro).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_renda).toFixed(2)+"€</th><th class='bdr-w'></th></tfoot></table></div>");

      $('#search').html("<div class='search_results' style='display: block;'><div class='form-group'><h3 style='text-align:center; font-size:21px;'><span class='label label-default' id='nr_resultados' style='padding: 10px;''><span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+i+"</span></h3></div></div>").show();
$('#table-expensies').show();

      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

</script>




