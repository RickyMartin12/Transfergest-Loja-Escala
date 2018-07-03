<style>
.chart_txt{
text-align:center;
color:#555;
font-size:20px;
}
g{
cursor:pointer;
}

.middle{
border-left: 1px solid #ddd;
border-right:1px solid #ddd;
}

@media (max-width: 768px){
.middle{
border-left: 0px solid #ddd;
border-right:0px solid #ddd;
border-top: 1px solid #ddd;
border-bottom:1px solid #ddd;}

}

</style>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span> Pesquisar</h3>
</div>

<div class="panel-body">
<div class="row"> 

<div class="col-sm-3 col-xs-12">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
<select class="form-control" id="chartfilterdate" onchange="ChartFilterDates(this.value)">
<option value="">Escolha Mês:</option>
<option value="1"> Mês </option>
<option value="2"> Entre Meses </option>
</select>
</div>
</div>
</div>


<div class="in_mes" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group datetimepickermes">
      <input type="text" class="form-control" id="mes_date" name="mes_date" placeholder="Mês da pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>

<div class="between_mes" style="display:none;">
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group" id="datetimepickermesini">
      <input type="text" readonly class="form-control" id="mes_ini" name="mes_ini" placeholder="Mês Inicio pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
 <div class='col-sm-3 col-xs-12'>
  <div class="form-group">
    <div class="input-group" id="datetimepickermesfim">
      <input type="text" readonly class="form-control" id="mes_fim" name="mes_fim" placeholder="Mês Fim pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>

<div class="col-xs-12">
<p style="text-align:right;">
  <button type="button" onclick='SearchGraphicsData()' class="btn btn-info">
  <span class="glyphicon glyphicon-filter" title="Pesquisar dados"></span></button>
</p>
</div>
</div>
</div>
<div class="panel-footer"></div>
</div>

<div class="panel panel-info">
<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span> Resultados </h3>
</div>
<div class="panel-body" id="charts">
 <div class="row">
    <div class="col-md-4"><h2 class="chart_txt">Proveitos</h2>
       <div id="piechart_in"></div>
    </div>
    <div class="col-md-4 middle"><h2 class="chart_txt">Despesas</h2>
       <div id="piechart_out"></div>
    </div>
    <div class="col-md-4"><h2 class="chart_txt">Total</h2>
       <div id="piechart_total"></div>
    </div>
  </div>

</div><div class="panel-footer"></div></div>

<script>


$(window).resize(function(){
if (po != 0){
    showChartIn(po,pd);
    showChartOut(ds,dv,dop,df);
    showChartTotal(prov,desp);
}
});


function ChartFilterDates(vl){
switch (vl){
case '0': $('.in_mes, .between_mes').hide();break;

case '1': $('.in_mes').show();$('.between_mes').hide();break;

case '2': $('.in_mes').hide();$('.between_mes').show();break;

default:$('.in_mes, .between_mes').hide();break;
}
}


function showChartIn(x,y){
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
         [
          ['Resultados', ''],
          ['Operador',     x],
          ['Direto',      y]
         ]
);
        var options = {};
        var chart = new google.visualization.PieChart(document.getElementById('piechart_in'));
        chart.draw(data, options);
      }
}


function showChartOut(x,y,z,w){
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
         [
          ['Resultados', ''],
          ['Staff',     x],
          ['Viaturas',      y],
          ['Operador',      z],
          ['Fixo',      w]
         ]
);
        var options = {};
        var chart = new google.visualization.PieChart(document.getElementById('piechart_out'));
        chart.draw(data, options);
      }
}

function showChartTotal(x,y){
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
         [
          ['Resultados', ''],
          ['Proveitos',     x],
          ['Despesas',     y],
         ]
);
        var options = {};
        var chart = new google.visualization.PieChart(document.getElementById('piechart_total'));
        chart.draw(data, options);
      }
}

po = 0;
pd = 0;
dv = 0;
ds = 0;
dop = 0;
df = 0;
prov = 0;
desp = 0;

function SearchGraphicsData(){

if( $('#chartfilterdate').val() == '1'){
$("#mes_date").val() ? dataValue='action=13&mes='+$("#mes_date").val() : false;}
else if( $('#chartfilterdate').val() == '2'){
$("#mes_ini").val() && $("#mes_fim").val() ? dataValue='action=14&mesini='+$("#mes_ini").val

()+'&mesfim='+$("#mes_fim").val() : false;}
if(dataValue.length > 20){
 $('.back').fadeIn();
 setTimeout(function(){
 $.ajax({ url:'definitions/action_definitions.php',
  data:dataValue,
  type:'POST',
  cache:false, 
  success:function(data){
  $('.back').fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontrados dados para elaborar os gráficos, p.f. modifique a pesquisa.');
      $("#mensagem_ko").trigger('click');
      }
      else {
         po = parseInt(arr.p_o);
         pd = parseInt(arr.p_d);
         dv = parseInt(arr.d_v);
         ds = parseInt(arr.d_s);
         dop = parseInt(arr.d_o);
         df = parseInt(arr.d_f);
         prov = po+pd;
         desp = dv+ds+dop+df;
         showChartIn(po,pd);
         showChartOut(ds,dv,dop,df);
         showChartTotal(prov,desp);
    }
    },
    error:function(){
    $('.back').fadeOut();
    $('.debug-url').html('Não foi possivel obter dados para elaborar os gráficos, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
    }
  });
}, 500);
}
else{
$('.back').fadeOut();
      $('.debug-url').html('P.f. Escolha uma opção e preencha o campo Mês ou campos Entre Meses, e tente novamente.');
      $("#mensagem_ko").trigger('click');
}

}

        $('#datetimepickermesini').datetimepicker({ignoreReadonly: true, format: 'MM/YYYY', 
    locale: 'pt'});
        $('#datetimepickermesfim').datetimepicker({ignoreReadonly: true, format: 'MM/YYYY', 
    locale: 'pt', useCurrent: false //Important! See issue #1075
        });
        $("#datetimepickermesini").on("dp.change", function (e) {
            $('#datetimepickermesfim').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepickermesfim").on("dp.change", function (e) {
            $('#datetimepickermesini').data("DateTimePicker").maxDate(e.date);
        });

$('.datetimepickermes').datetimepicker({format: 'MM/YYYY', locale: 'pt'});

</script>
