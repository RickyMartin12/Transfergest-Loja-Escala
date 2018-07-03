<style>
/*
.search_results {
    left: calc(50% - 81px);
    top: -30px;
    position: absolute;
}

*/

#table-expensies{display:none;}

.table-responsive {
    min-height: .01%;
    overflow-x: auto;
    border-radius: 3px;
}

.line-grey {
    text-align: center;
    padding: 5px;
    border-left: 1px solid #ccc;

}
.red { background-color: #d9534f!important;
    color: #fff;
    border-color: #d9534f!important;
}

.green { background-color: #5cb85c!important; color: #fff; border-color: #5cb85c!important;}
.panel-body {padding: 0px;}
.line-green {border-top: 4px solid #5cb85c!important;}
.line-red {border-top: 4px solid #d9534f!important; }
.line-blue {border-top: 4px solid #5bc0de!important;}
.myfoot{ color: #333; background-color: #FFB231!important;}

</style>


<div class="panel panel-default">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12 col-md-6 col-lg-6">
        <i class="fa fa-university"></i> Despesas Viaturas oo
      </h3>
      <div class="col-xs-12 col-md-6 col-lg-6" style="text-align:right;">
        <button type="reset" class="btn btn-default btn-reset"><span class="glyphicon glyphicon-erase"></span><font class='hidden-xs'> Limpar</font></button>
        <button onclick="PesquisaValoresRelatorioGeral($('#valor').val(),$('#valor').val(), $('#data_inicio').val(), $('#data_fim').val())" class="btn btn-info"><span class="glyphicon glyphicon-search"></span><font class='hidden-xs'> Pesquisa</font></button>
      </div>
    </div>
  </div>

  <div class="panel-body" id="form_result_viature" >

    <div class="row">
      <div class='col-md-3 col-xs-12'>
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-life-ring"></span></span>
          <select class="form-control" id="tipo" onchange="select_valor(this.value)">
            <option value="0" selected>Staff/Viatura</option>
            <option value="1">Staff</option>
            <option value="2">Matricula</option>
          </select>
        </div>
      </div>
      <div class='col-md-3 col-xs-12'>
        <div class='input-group'>
          <span class='input-group-addon req ft18'><span class='fa fa-list-alt'></span></span>
          <select type='text' class='form-control' id='valor' placeholder='Todos'></select>
        </div>
      </div>

        <div class='col-md-3 col-xs-12'>
          <div class="form-group input-group" id="date-no-past-date">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            <input type="text" title="Data Inicio" class="form-control" name="data_inicio" id="data_inicio" placeholder="Data de Inicio" readonly style="border-right: 0px; background-color: #fff;">
            <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
          </div>
        </div>

      <div class='col-md-3 col-xs-12'>
        <div class="form-group input-group" id="date-no-past-date2"> 
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          <input type="text" title="Data Fim"  class="form-control" name="data_fim" id="data_fim" placeholder="Data de Fim" readonly style="border-right: 0px; background-color: #fff;">
          <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>  
  </div>
  <div class="panel-footer my-orange"></div>
</div>

<div id="search">
</div>



  <div class="panel panel-default" id="table-expensies">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12"><span class="glyphicon glyphicon-plus"></span></h3>
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
        <tfoot id='exp_table_footer'></tfoot>
      </table>
    </div>
  </div>
  <div class="panel-footer my-orange"></div>
</div>





<script>


$('.btn-reset').click(function(){
    $("#number").val('').change();
    $("#valor").val('').change();
    $("#data_inicio").val('');
    $("#data_fim").val('');
});

$('#date-no-past-date').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });
$('#date-no-past-date2').datetimepicker({ignoreReadonly:true, format: 'DD/MM/YYYY', locale: 'pt',daysOfWeekDisabled: [] });

function select_valor(vl)
{
    if ( vl == '1')
    {
      arr = JSON.parse(localStorage.getItem("staff"));
      opt='<option selected value="">Staff *</option>';
      for (i=0;i<arr.length;i++){
      opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
      }
      $('#valor').html(opt).select2();
    }
    else if (vl == '1')
    {
      arr = JSON.parse(localStorage.getItem("matricula"));
      opt='<option selected value="">Matricula *</option>';
      for (i=0;i<arr.length;i++){
      opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
      }
      $('#valor').html(opt).select2();
    }
}


function searchAllExpensies(d){
  sum_km = 0, sum_hrs = 0, sum_combs = 0, sum_portagens = 0, sum_lavangens = 0, sum_parque = 0, sum_outra1 = 0, sum_mecanica = 0, sum_revisao = 0, sum_sinistro = 0, sum_outra2 = 0, sum_selo = 0, sum_inspeccao = 0, sum_seguro = 0, sum_renda = 0, s = 0, t ='', f='';
  $('.back').fadeIn();
    setTimeout(function(){
    dataValue=d;
    $.ajax({ url:'expensies/action_expensies.php',
      data:dataValue,  
      type:'POST',
      cache:false,
      success:function(data){
        $(".back").fadeOut();
        arr=[];
        arr = JSON.parse(data);

        if (arr == null || arr.length < 1){
          $('.debug-url').html('Não existem Resultados!');
          $("#mensagem_ko").trigger('click');
          $('#search, #table-expensies').hide();
        }
        else {
        for(i=0;i<arr.length;i++){
         if (arr[i].id){
          id = arr[i].id;
          matricula = arr[i].matricula;
          sum_km += arr[i].km;
          sum_hrs += (arr[i].horas_f - arr[i].horas_i);

          fs = matricula.substring(0, 2);
          md = matricula.substring(2, 4);
          fn = matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;

          //Diaria
          var outra_diaria = parseInt(arr[i].outra1);
          var parque = parseInt(arr[i].parque);
          var lavagem = parseInt(arr[i].lavagem);
          var portagem = parseInt(arr[i].portagem);
          var combustivel = parseInt(arr[i].combustivel);

          isNaN(outra_diaria) ? outra_diaria = 0 : false;
          isNaN(parque) ? parque = 0 : false;
          isNaN(lavagem) ? lavagem = 0 : false;
          isNaN(portagem) ? portagem = 0 : false;
          isNaN(combustivel) ? combustivel = 0 : false;

          //Diaria
          sum_outra1 = sum_outra1 + outra_diaria;
          sum_parque = sum_parque + parque;
          sum_lavangens = sum_lavangens + lavagem;
          sum_portagens = sum_portagens + portagem; 
          sum_combs = sum_combs + combustivel; 

          //Manutencao
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
          var inspeccao = parseInt(arr[i].inspeccao);
          var seguro = parseInt(arr[i].seguro);
          var renda = parseInt(arr[i].renda);
          isNaN(t) ? t = 0 : false;
          isNaN(inspeccao) ? inspeccao = 0 : false;
          isNaN(seguro) ? seguro = 0 : false;
          isNaN(renda) ? renda = 0 : false;

          //Fixas
          sum_selo = sum_selo + t;
          sum_inspeccao = sum_inspeccao + inspeccao;
          sum_seguro = sum_seguro + seguro;
          sum_renda = sum_renda + renda;

          r += "<tr><td class='line-grey'><font>"+id+"</font></td><td class='line-grey'><font>"+arr[i].data+"</font></td><td class='line-grey'><font>"+arr[i].staff+"</font></td><td class='line-grey'><font>"+matr+"</font></td><td class='line-grey'><font>"+arr[i].tipo+"</font></td><td class='line-grey'><font>"+arr[i].fatura+"</font></td><td scope='row' class='line-grey'><font>"+arr[i].entidade+"</font></a></td><td scope='row' class='line-grey'><font>"+arr[i].coord+"</font></td><td scope='row' class='line-grey'><font>"+arr[i].hora+"</font></td><td class='line-grey'><font>"+arr[i].km+"</font></td><td class='line-grey'><font>"+arr[i].combustivel+"</font></td><td class='line-grey'><font>"+arr[i].portagem+"</font></td><td class='line-grey'><font>"+arr[i].lavagem+"</font></td><td class='line-grey'><font>"+arr[i].parque+"</font></td><td class='line-grey'><font>"+arr[i].outra1+"</font></td><td class='line-grey'><font>"+arr[i].mecanica+"</font></td><td class='line-grey'><font>"+arr[i].revisao+"</font></td><td class='line-grey'><font>"+arr[i].sinistro+"</font></td><td class='line-grey'><font>"+arr[i].outra2+"</font></td><td class='line-grey'><font>"+arr[i].selo+"</font></td><td class='line-grey'><font>"+arr[i].inspeccao+"</font></td><td class='line-grey'><font>"+arr[i].seguro+"</font></td><td class='line-grey'><font>"+arr[i].renda+"</font></td><td class='line-grey'><font>"+arr[i].obs+"</font></td></tr>";
        }
       }
       var hrs_tt = moment().startOf('day').seconds(sum_hrs).format('H:mm');
        
        $("#exp_table_head").html(r);

        $("#exp_table_footer").html("<th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'></th><th class='bdr-w'>"+parseFloat(sum_combs).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_portagens).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_lavangens).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_parque).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_outra1).toFixed(2)+"</th><th class='bdr-w'>"+parseFloat(sum_mecanica).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_revisao).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_sinistro).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_outra2).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_selo).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_inspeccao).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_seguro).toFixed(2)+"€</th><th class='bdr-w'>"+parseFloat(sum_renda).toFixed(2)+"€</th><th class='bdr-w'></th></tfoot></table></div>");
      }
      $('#search').html("<div class='search_results' style='display: block;'><div class='form-group'><h3 style='text-align:center; font-size:21px;'><span class='label label-default' id='nr_resultados' style='padding: 10px;''><span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+i+"</span></h3></div></div>").show();
      $("#table-expensies").show();
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter os dados das despesas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

function PesquisaValoresRelatorioGeral(matricula, staff, data_inicio, data_fim)
{
  if ($("#number").val() == 'matricula')
  {
    if (data_inicio == '' && data_fim == '')
    {
      searchAllExpensies('action=22&matricula='+matricula);
    }
    else if (data_inicio != '' && data_fim != '')
    {
      searchAllExpensies ('action=23&matricula='+matricula+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if (data_inicio != '' && data_fim == '')
    {
      searchAllExpensies ('action=24&matricula='+matricula+'&data_inicio='+data_inicio);
    }
  }
  else
  {
    if (data_inicio == '' && data_fim == '')
    {
      searchAllExpensies ('action=19&staff='+staff);
    }
    else if (data_inicio != '' && data_fim != '')
    {
      searchAllExpensies ('action=20&staff='+staff+'&data_inicio='+data_inicio+'&data_fim='+data_fim);
    }
    else if (data_inicio != '' && data_fim == '')
    {
      searchAllExpensies('action=21&staff='+staff+'&data_inicio='+data_inicio);
    } 
  }      
}
  </script>