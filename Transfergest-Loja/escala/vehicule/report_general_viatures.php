<style type="text/css">
.panel-danger {
    border-color: #333;
}

.panel-body {
    padding: 0px;
}


.line-grey {
    text-align: center;
    padding: 5px;
    border-left: 1px solid #ccc;
}

.bdr-w {
    border-right: 1px solid #ccc;
    padding: 5px;
    text-align: center;
}


.panel-danger>.panel-heading {
    color: #000;
}

.red {
    background-color: #d9534f!important;
    color: #fff;
    border-color: #d9534f!important;
}

.green
{
  background-color: #5cb85c!important;
  color: #fff;
  border-color: #5cb85c!important;
}


.search_results {
    left: calc(50% - 81px);
    top: -30px;
    position: absolute;
}

</style>

<div class="panel panel-default">
  <div class="panel-heading my-orange">
    <div class="row">
      <h3 class="panel-title col-xs-12 col-md-6 col-lg-6">
        <i class="fa fa-calculator" aria-hidden="true"></i> Rendimento
      </h3>
      <div class="col-xs-12 col-md-6 col-lg-6" style="text-align:right;">
        <button type="reset" class="btn btn-default btn-reset"><span class="glyphicon glyphicon-erase"></span>
          <font class="hidden-xs"> Limpar</font>
        </button>
        <button onclick="PesquisaValoresRelatorioGeral($('#fornecedor').val(),$('#nome_fornecedor').val(),$('#data_inicio').val(), $('#data_fim').val())" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>
          <font class='hidden-xs'> Pesquisa</font>
        </button>
      </div>
    </div>
  </div>

  <div class="panel-body" id="form_result_viature">
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group">
          <span class="input-group-addon req ft18"><span class="fa fa-life-ring"></span></span>
          <select class="form-control" id="fornecedor" onchange="select_valor(this.value)">
            <option value="" selected>Staff / Viatura</option>
            <option value="staff"> Staff</option>
            <option value="matricula"> Matricula</option>
          </select>
        </div>
      </div>
      <div class='col-md-3 col-xs-12'>
        <div class='form-group input-group'>
          <span class='input-group-addon req ft18'><span class='fa fa-list-alt'></span></span>
          <select type='text' disabled class='form-control' id='nome_fornecedor' placeholder='Escolha Staff ou Matricula'></select>
        </div>
      </div>
      <div class='col-md-3 col-xs-12'>
        <div class="form-group input-group" id="data_value">
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          <input type="text" title="Data Inicio"  class="form-control" name="data_inicio" id="data_inicio" placeholder="Data de Inicio *" readonly style="border-right: 0px; background-color: #fff;">
          <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
      <div class="col-md-3 col-xs-12">
        <div class="form-group input-group" id="data_value_fim"> 
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
          <input type="text" title="Data Fim"  class="form-control" name="data_fim" id="data_fim" placeholder="Data de Fim *" readonly style="border-right: 0px; background-color: #fff;">
          <span class="input-group-addon" style="background-color: #fff;"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
      </div>
    </div>
    <div class="panel-footer my-orange"></div>
    <div id="search"></div>
  </div>
</div>


<div id="add_values"></div>

<div id="add_edit"></div>

<script>


    $("#data_value").datetimepicker({ ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', widgetPositioning: {horizontal: 'right',vertical: 'bottom'}});

    $("#data_value_fim").datetimepicker({ignoreReadonly: true, format: 'DD/MM/YYYY', 
    locale: 'pt', useCurrent: false,widgetPositioning: {horizontal: 'right',vertical: 'bottom'} //Important! See issue #1075
        });

    $("#data_value").on("dp.change", function (e) {
        $("#data_value_fim").data("DateTimePicker").minDate(e.date);
    });
    
    $("#data_value_fim").on("dp.change", function (e) {
        $("#data_value").data("DateTimePicker").maxDate(e.date);
    });

    $('.btn-reset').click(function(){
      $("#fornecedor, #nome_fornecedor").val('').change();
      $("#data_inicio, #data_fim").val('');
    })

   function select_valor(vl)
   { 
    if (vl == 'staff')
    {
      $("#nome_fornecedor").prop('disabled',false); 
      arr = JSON.parse(localStorage.getItem("staff"));
      opt='<option selected disabled value="">Staff *</option>';
      for (i=0;i<arr.length;i++){
        opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
      }
      $('#nome_fornecedor').html(opt).select2();
    }
    else if (vl == 'matricula')
    {
      $("#nome_fornecedor").prop('disabled',false); 
      arr = JSON.parse(localStorage.getItem("matricula"));
      opt='<option selected disabled value="">Matricula *</option>';
      for (i=0;i<arr.length;i++){
       opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
       }
      $('#nome_fornecedor').html(opt).select2();
    }

    else $("#nome_fornecedor").val('0').change().prop('disabled',true);
}


/*OBTER DADOS DO SERVIDOR*/

function PesquisaValores(get)
{

  var sum_km = 0, sum_hrs = 0, sum_despesas = 0, sum_receitas = 0;
  var data_val ='';
  $('.back').fadeIn();
  setTimeout(function(){
    dataValue=get;
    $.ajax({ url:'vehicule/action_expensies.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();

      console.log(data);


    
      arr=[];

      arr = JSON.parse(data);


      if (arr == null || arr.length < 1 || arr[0].diario == null ){
        $('.debug-url').html('Não existem resultados!');
        $("#mensagem_ko").trigger('click');
        $(".back").fadeOut();
        $("#add_edit, #add_values").empty();
        $('#search').css('display', 'none');
      }
      else {
        v = [];
        datas = [];
        $('#search').css('display', 'block');
        
        
          

        for(i=0;i<arr[0].diario.length;i++)
        {
          
                    data_normal = arr[0].diario[i].data;
                   matricula = arr[0].diario[i].matricula;
                    sum_km += arr[0].diario[i].km;
                    sum_hrs += (arr[0].diario[i].horas_total1);
                    
                    
                    fs = matricula.substring(0, 2);
                    md = matricula.substring(2, 4);
                    fn = matricula.substring(4, 6);
                    matr = fs+"-"+md+"-"+fn;
                   arr[0].diario[i].hrs_init == "00:00" || !arr[0].diario[i].hrs_init ? arr[0].diario[i].hrs_init="<font>-/-</font>":arr[0].diario[i].hrs_init="<font>"+arr[0].diario[i].hrs_init+"</font>";
                   arr[0].diario[i].hrs_fim == "00:00" || !arr[0].diario[i].hrs_fim ? arr[0].diario[i].hrs_fim = "<font>-/-</font>":arr[0].diario[i].hrs_fim="<font>"+arr[0].diario[i].hrs_fim+"</font>";
                   arr[0].diario[i].hrs_total == "00:00" || ! arr[0].diario[i].hrs_total ? arr[0].diario[i].hrs_total="<font>-/-</font>":arr[0].diario[i].hrs_total="<font>"+arr[0].diario[i].hrs_total+"</font>";



                   arr[0].diario[i].gps_init.length < 10 ? 
                   getgpsi = '<font>-/-</font>' :
                   getgpsi = "<a href='http://www.google.com/maps/place/"+arr[0].diario[i].lat_ini+","+arr[0].diario[i].long_ini+"'><font>"+arr[0].diario[i].gps_init+"</font></a>";

                   arr[0].diario[i].gps_fim.length < 10 ? 
                   getgpsf = '<font>-/-</font>' :
                   getgpsf = "<a href='http://www.google.com/maps/place/"+arr[0].diario[i].lat_fim+","+arr[0].diario[i].long_fim+"'><font>"+arr[0].diario[i].gps_fim+"</font></a>";

                   var cob = arr[0].diario[i].cob;
                   if (arr[0].diario[i].cob == "undefined")
                    {
                      cob = 0;
                    }

                    if (isNaN(cob))
                    {
                      cob = 0;
                    }

                    sum_receitas += cob;
                    sum_despesas += arr[0].diario[i].total;




                   



                   

                   data_val += "<tr><td class='line-grey'><font>"+data_normal+"</font></td><td class='line-grey'><font>"+arr[0].diario[i].staff+"</font></td><td class='line-grey'><font>"+matr+"</font></td><td class='line-grey'>"+getgpsi+"</td><td class='line-grey'>"+arr[0].diario[i].hrs_init+"</td><td class='line-grey'><font>"+arr[0].diario[i].km_init+"</font></td><td class='line-grey'>"+getgpsf+"</td><td class='line-grey'>"+arr[0].diario[i].hrs_fim+"</td><td class='line-grey'><font>"+arr[0].diario[i].km_fim+"</font></td><td class='line-grey'><font>"+arr[0].diario[i].hrs_total+"</font></td><td class='line-grey'><font>"+arr[0].diario[i].km+"</font></td><td class='line-grey'><font>"+parseFloat(arr[0].diario[i].total).toFixed(2)+" €</font></td><td class='line-grey'><font>"+parseFloat(cob).toFixed(2)+" €</font></td></tr>";



                   

                    
                    
            }

            

       var hrs_tt = moment().startOf('day').seconds(sum_hrs).format('H:mm');
       var result = sum_receitas - sum_despesas;

       $("#add_values").html("<div class='row'><div class='col-md-2 col-xs-12'><div class='form-group'><input type='text' class='form-control' readonly value ='Horas: "+hrs_tt+"h'></div></div><div class='col-md-2 col-xs-12'><div class='form-group'><input type='text' class='form-control' readonly value ='Km: "+sum_km+"Km'></div></div><div class='col-md-3 col-xs-12'><div class='form-group'><input type='text' class='form-control' readonly value ='Despesas: "+parseFloat(sum_despesas).toFixed(2)+"€'></div></div><div class='col-md-2 col-xs-12'><div class='form-group'><input type='text' class='form-control' readonly value ='Receitas: "+parseFloat(sum_receitas).toFixed(2)+"€'></div></div><div class='col-md-3 col-xs-12'><div class='form-group'><input type='text' id='result' class='form-control' readonly value ='Resultado: "+parseFloat(result).toFixed(2)+"€'></div></div></div>");
        $("#add_edit").html("<div class='panel panel-default'><div class='panel-heading my-orange'><h3 class='panel-title'></h3></div><div class='panel-body'><div class='table-responsive'><table class='table table-striped' style='margin-bottom:0px;'><thead class='my-gray'><th class='bdr-w'>Data</th><th class='bdr-w'>Motorista</th><th class='bdr-w'>Matricula</th><th class='bdr-w'>GPS Inicio</th><th class='bdr-w'>Hora Inicio</th><th class='bdr-w'>Km Inicio</th><th class='bdr-w'>GPS Fim</th><th class='bdr-w'>Hora Fim</th><th class='bdr-w'>KM Fim</th><th class='bdr-w'>Total Horas</th><th class='bdr-w'>Total KM</th><th class='bdr-w'>Total Despesas</th><th class='bdr-w'>Total Receitas</th></tr></thead><tbody>"+data_val+"</tbody></table></div></div><div class='panel-footer my-orange'></div></div>");
       if (result < 0)
       {
         $("#result").addClass('w3-pale-red');
       }
       else
       {
         $("#result").addClass('w3-pale-green');
       }
      }
      $('#search').html("<div class='search_results' style='display: block;'><div class='form-group'><h3 style='text-align:center; font-size:21px;'><span class='label label-default' id='nr_resultados' style='padding: 10px;''><span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados: "+i+"</span></h3></div></div>");
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados das viaturas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

/*FILTRAR DADOS PARA OBTER DADOS */

function PesquisaValoresRelatorioGeral(tipo, val, data_inicio, data_fim) {

if (!val) {
  $('.debug-url').html('Os campos para pesquisa estão vazios!!');
  $("#mensagem_ko").trigger('click');
  }
  switch (tipo) {
    case 'matricula' : 
        if (data_inicio == '' && data_fim == '')
        {
          get = 'action=14&matricula='+val;
          PesquisaValores(get);
        }
        else if (data_inicio != '' && data_fim != '')
        {
          get = 'action=16&matricula='+val+'&data_inicio='+data_inicio+'&data_fim='+data_fim;
          PesquisaValores(get);
        }
        else if (data_inicio != '' && data_fim == '')
        {
          get = 'action=18&matricula='+val+'&data_inicio='+data_inicio;
          PesquisaValores(get);
        }
    break;

    case 'staff':
        if (data_inicio == '' && data_fim == '')
        {
          val = 'action=13&staff='+val;
          PesquisaValores (val);
        }

        else if (data_inicio != '' && data_fim != '')
        {
          get='action=15&staff='+val+'&data_inicio='+data_inicio+'&data_fim='+data_fim;
          PesquisaValores(get);
        }

        else if (data_inicio != '' && data_fim == '')
        {
          get = 'action=17&staff='+staff+'&data_inicio='+data_inicio;
          PesquisaValores(get);
        }
    break;
  }
}

</script>