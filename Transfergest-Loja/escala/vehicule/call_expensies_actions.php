
<input type="hidden" id="piechart_in"></input>
<input type="hidden" id="piechart_out"></input>
<input type="hidden" id="piechart_total"></input>

<div class="expensies-filters">
    <div class="company"></div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><span class="glyphicon glyphicon-filter"></span> Relatórios</h3>
        <span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Relatórios Despesas" style="float: right;top: -14px;cursor: pointer;"></span>
        <div class='search_results'>
            <div class="form-group">
              <h3 style="text-align:center; font-size:21px;">
                  <span class="label label-default" id='nr_resultados' style="padding: 10px;"></span>
              </h3>
            </div>
        </div>
        <hr style='border-top: 1px solid #FFF;'>
        <div class='searchprint'></div>
        <div class="nosearchprint">
<div class='row'>
<div class='col-sm-4 col-xs-12' style='margin: 8px 0px;'>
<label class="col-sm-4 col-xs-12 checkbox-inline" style='margin-left:0px;margin-bottom:10px;'><input type="checkbox" id='staff_date' value="">Staff</label>
<label class="col-sm-4 col-xs-12 checkbox-inline" style='margin-left:0px;margin-bottom:10px;'><input type="checkbox" id='matricula_date' value="">Matricula</label>
<label class="col-sm-4 col-xs-12 checkbox-inline" style='margin-left:0px;margin-bottom:10px;'><input type="checkbox" id="in_date" value=""> Data </label>
<label class="col-sm-4 col-xs-12 checkbox-inline" style='margin-left:0px;margin-bottom:10px;'><input type="checkbox" id="between_date"  value=""> Datas </label>
</div>


<div class="staff_date" style="display:none;">
<div class='col-sm-2 col-xs-12'>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
<input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Nome Staff">
</div>
</div>
</div>
</div>


<div class="matricula_date" style="display:none;">
<div class="col-sm-2 col-xs-12">
 <div class="form-group mrg">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-wrench"></span></span>
<select class="form-control" name="matricula_name" id="matricula_name">
<option value="Escolha">Escolha</option>
</select>
</div>
</div>
</div>
</div>
<div class="in_date" style="display:none;">
 <div class='col-sm-2 col-xs-12'>
  <div class="form-group">
    <div class="input-group datetimepicker_se">
      <input type="text" class="form-control" id="day_date" name="day_date" placeholder="Dia da pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>

<div class="between_date" style="display:none;">
 <div class='col-sm-2 col-xs-12'>
  <div class="form-group">
    <div class="input-group datetimepicker_se">
      <input type="text" class="form-control" id="date_ini" name="date_ini" placeholder="Dia Inicio pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
 <div class='col-sm-2 col-xs-12'>
  <div class="form-group">
    <div class="input-group datetimepicker_se">
      <input type="text" class="form-control" id="date_fim" name="date_fim" placeholder="Dia Fim pesquisa">
      <span class="input-group-addon" style="cursor:pointer;">
       <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>
</div>
</div>
    <div style='float:right;'>
      <div class="form-group ">
    <p style="text-align:right">
  <a href="#" onclick='searchDataExpensies()' id='search_action' class="btn btn-info" title="Atualizar pesquisa"><span class="glyphicon glyphicon-filter"></span></a>
 <a href="#" class="btn btn-default btn-print hidden-xs disabled" onclick='goToPrint(1);' title="Imprimir Relatório"><span class="glyphicon glyphicon-print"></span></a>
  
</p>
  </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive w-example">
<div aria-hidden="true" class="floatThead-container"></div>
<div class="">
<table class="table table-striped table-condensed with-responsive-wrapper nowrap">
    <thead class='table-header'>
      <tr>
        <th class='min-sz col-0'><input class="hidden-xs" id="col_0" type="checkbox"><span class="glyphicon green color_print_0 glyphicon-print hidden-xs no_print"></span><br/>ID</th>
        <th class='min-sz col-1'><input class="hidden-xs" id="col_1" type="checkbox"><span class="glyphicon green color_print_1 glyphicon-print hidden-xs no_print"></span><br/>Data</th>
        <th class='min-sz col-2'><input class="hidden-xs" id="col_2" type="checkbox"><span class="glyphicon green color_print_2 glyphicon-print hidden-xs no_print"></span><br/>Matricula</th>
        <th class='min-sz col-3'><input class="hidden-xs" id="col_3" type="checkbox"><span class="glyphicon green color_print_3 glyphicon-print hidden-xs no_print"></span><br/>Km.Inicio</th>
        <th class='min-sz col-4'><input class="hidden-xs" id="col_4" type="checkbox"><span class="glyphicon green color_print_4 glyphicon-print hidden-xs no_print"></span><br/>Km.Fim</th>
        <th class='min-sz col-5'><input class="hidden-xs" id="col_5" type="checkbox"><span class="glyphicon green color_print_5 glyphicon-print hidden-xs no_print"></span><br/>Dif.Km</th>
        <th class='min-sz col-6'><input class="hidden-xs" id="col_6" type="checkbox"><span class="glyphicon green color_print_6 glyphicon-print hidden-xs no_print"></span><br/>Fatura</th>
        <th class='min-sz col-7'><input class="hidden-xs" id="col_7" type="checkbox"><span class="glyphicon green color_print_7 glyphicon-print hidden-xs no_print"></span><br/>Selo</th>
        <th class='min-sz col-8'><input class="hidden-xs" id="col_8" type="checkbox"><span class="glyphicon green color_print_8 glyphicon-print hidden-xs no_print"></span><br/>Seguro</th>
        <th class='min-sz col-9'><input class="hidden-xs" id="col_9" type="checkbox"><span class="glyphicon green color_print_9 glyphicon-print hidden-xs no_print"></span><br/>Inspecção</th>
        <th class='min-sz col-10'><input class="hidden-xs" id="col_10" type="checkbox"><span class="glyphicon green color_print_10 glyphicon-print hidden-xs no_print"></span><br/>Revisão</th>
        <th class='min-sz col-11'><input class="hidden-xs" id="col_11" type="checkbox"><span class="glyphicon green color_print_11 glyphicon-print hidden-xs no_print"></span><br/>Sinistro</th>
        <th class='min-sz col-12'><input class="hidden-xs" id="col_12" type="checkbox"><span class="glyphicon green color_print_12 glyphicon-print hidden-xs no_print"></span><br/>Mecânica</th>
        <th class='min-sz col-13'><input class="hidden-xs" id="col_13" type="checkbox"><span class="glyphicon green color_print_13 glyphicon-print hidden-xs no_print"></span><br/>Staff</th>
        <th class='min-sz col-14'><input class="hidden-xs" id="col_14" type="checkbox"><span class="glyphicon green color_print_14 glyphicon-print hidden-xs no_print"></span><br/>Combustivel</th>
        <th class='min-sz col-15'><input class="hidden-xs" id="col_15" type="checkbox"><span class="glyphicon green color_print_15 glyphicon-print hidden-xs no_print"></span><br/>Portagem</th>
        <th class='min-sz col-16'><input class="hidden-xs" id="col_16" type="checkbox"><span class="glyphicon green color_print_16 glyphicon-print hidden-xs no_print"></span><br/>Lavagem</th>
        <th class='min-sz col-17'><input class="hidden-xs" id="col_17" type="checkbox"><span class="glyphicon green color_print_17 glyphicon-print hidden-xs no_print"></span><br/>Parque</th>
        <th class='min-sz col-18'><input class="hidden-xs" id="col_18" type="checkbox"><span class="glyphicon green color_print_18 glyphicon-print hidden-xs no_print"></span><br/>Diversos</th>
        <th class='min-sz col-19'><input class="hidden-xs" id="col_19" type="checkbox"><span class="glyphicon green color_print_19 glyphicon-print hidden-xs no_print"></span><br/>Descrição</th>

        <th class='min-sz col-20'><input class="hidden-xs" id="col_20" type="checkbox"><span class="glyphicon green color_print_20 glyphicon-print hidden-xs no_print"></span><br/>Validado</th>

        <th class='min-sz col-21'>Acções</th>
      </tr>
    </thead>
    <tbody id="delete_team">
    </tbody>
</body>
 <tfoot class="footer_tot" style="border-top: 2px solid #888;">
    <tr>
      <td class='col-0' id='reg_tot'><label>Total:<label></td>
      <td class='col-1'></td>
      <td class='col-2'></td>
      <td class='col-3'></td>
      <td class='col-4'></td>
      <td class='col-5'></td>
      <td class='col-6'></td>
      <td class='col-7'></td>
      <td class='col-8'></td>
      <td class='col-9'></td>
      <td class='col-10'></td>
      <td class='col-11'></td>
      <td class='col-12'></td>
      <td class='col-13'></td>
      <td class='col-14'></td>
      <td class='col-15'></td>
      <td class='col-16'></td>
      <td class='col-17'></td>
      <td class='col-18 col-19'><label class="txt-fr">Geral:</label></td>
      <td class='col-19 col-18'id="geral_tot"class='txt-rt'></td>
      <td class='col-20'></td>
      <td class='col-21'></td>
    </tr>
  </tfoot>

 <tfoot class="footer_tot">
    <tr>
      <td class='col-0' id='reg_tot'><label>Sub-Total:<label></td>
      <td class='col-1'></td>
      <td class='col-2'></td>
      <td class='col-3'></td>
      <td class='col-4'></td>
      <td class='col-5' id='dif_tot'></td>
      <td class='col-6'></td>
      <td class='col-7' id='selo_tot'></td>
      <td class='col-8' id='segur_tot'></td>
      <td class='col-9' id='inspeccao_tot'></td>
      <td class='col-10' id='revisao_tot'></td>
      <td class='col-11' id='sinistro_tot'></td>
      <td class='col-12' id='mecanica_tot'></td>
      <td class='col-13'></td>
      <td class='col-14' id='combustivel_tot'></td>
      <td class='col-15' id='portagem_tot'></td>
      <td class='col-16' id='lavagem_tot'></td>
      <td class='col-17' id='parque_tot'></td>
      <td class='col-18' id='diversos_tot'></td>
      <td class='col-19'></td>
      <td class='col-20'></td>
      <td class='col-21' id="geral_tot"class='txt-rt'></td>
    </tr>
  </tfoot>
</tbody>
  </table>
</div>
</div>


<script type="text/javascript">


staff = JSON.parse(localStorage.getItem("staff"));
    $("#staff_name").autocomplete({
        source: staff,
        focus: function (event, ui) {
            event.preventDefault();
            $("#staff_name").val(ui.item.label);
        },
        select: function (event, ui) {
            event.preventDefault();
            $("#staff_name").val(ui.item.label);
        }
    });




$('.table-responsive input[type=checkbox]').each(function(index){
$(this).click(function(){
if ($(this).is(':checked')){
$('.color_print_'+index).removeClass('green').addClass('red');
}
else{
$('.color_print_'+index).removeClass('red').addClass('green');
}
});
});

$('.datetimepicker_se').datetimepicker({
    format: 'DD/MM/YYYY', 
    locale: 'pt'
});

function searchDataExpensies(){
di = $('#date_ini').val();
df = $('#date_fim').val();
on = $('#matricula_name').val().replace(/-/g, "");
sn = $('#staff_name').val();
dd = $('#day_date').val();
dt1='';
dt2='';
dt3='';
dt4='';
if ($('#in_date').val()=='1')
	dd ? dt1='&dd='+dd : dt1='&dd='+ moment().format("DD/MM/YYYY");
if ($('#between_date').val()=='1'){
	di ? di= di : di = moment().add(-1, 'days').format("DD/MM/YYYY"); 
	df ? df = df : df = moment().add(1, 'days').format("DD/MM/YYYY"); 
	dt2='&di='+di+'&df='+df;
}
if( $('#staff_date').val()=='1')
	sn ? dt3='&sn='+sn : dt3='&sn=----';
if($('#matricula_date').val()=='1')
	on ? dt4='&on='+on : dt4 ='&on=----';
$('.back').fadeIn();
despesa='0'; 
setTimeout(function(){
    dataValue='action=6'+dt1+''+dt2+''+dt3+''+dt4;
     $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    console.log(data);
    $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não foram encontradas Despesas, pf modifique a pesquisa!');
        $("#mensagem_ko").trigger('click');
        $(".back").fadeOut();
$('#selo_tot, #segur_tot, #inspeccao_tot, #revisao_tot, #sinistro_tot, #mecanica_tot,#dif_tot, #combustivel_tot,#portagem_tot,#lavagem_tot,#parque_tot,#diversos_tot, #geral_tot,#delete_team').empty();
        $('.search_results').fadeIn();
        $('.btn-print').addClass('disabled');
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags' style='font-size:16px;'></span>&nbsp; Registos : 0");
      }
      else {
        $("#delete_team").empty();
selo_tot = 0;
seguro_tot = 0; 
inspeccao_tot = 0; 
revisao_tot = 0;
sinistro_tot = 0;
mecanica_tot = 0;
combustivel_tot = 0;
portagem_tot = 0;
lavagem_tot = 0;
parque_tot = 0;
diversos_tot = 0;
geral_tot = 0;
dif = 0 ;
dif_tot= 0 ;

for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data*1000).format("DD/MM/YYYY");
      despesa= i+1;
          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;


          if( arr[i].km_inicio && arr[i].km_fim){
            arr[i].km_inicio < arr[i].km_fim ? dif = parseInt(arr[i].km_fim) - parseInt(arr[i].km_inicio) : dif = 0;
            dif_tot += dif;
          }


         if( arr[i].selo) selo_tot += parseFloat(arr[i].selo);
         if( arr[i].seguro) seguro_tot += parseFloat(arr[i].seguro);
         if( arr[i].inspeccao) inspeccao_tot += parseFloat(arr[i].inspeccao);
         if( arr[i].revisao) revisao_tot += parseFloat(arr[i].revisao);
         if( arr[i].sinistro) sinistro_tot += parseFloat(arr[i].sinistro);
         if( arr[i].mecanica) mecanica_tot += parseFloat(arr[i].mecanica);
         if( arr[i].combustivel) combustivel_tot += parseFloat(arr[i].combustivel);
         if( arr[i].portagem) portagem_tot += parseFloat(arr[i].portagem);
         if( arr[i].lavagem) lavagem_tot += parseFloat(arr[i].lavagem);
         if( arr[i].parque) parque_tot += parseFloat(arr[i].parque);
        if( arr[i].diversos) diversos_tot += parseFloat(arr[i].diversos);
         
          arr[i].selo ? selo = parseFloat(arr[i].selo).toFixed(2)+"€" : selo = '';
          arr[i].seguro ? seguro = parseFloat(arr[i].seguro).toFixed(2)+"€" : seguro = '';
          arr[i].inspeccao ? inspeccao = parseFloat(arr[i].inspeccao).toFixed(2)+"€" : inspeccao = '';
          arr[i].revisao ? revisao = parseFloat(arr[i].revisao).toFixed(2)+"€" : revisao = '';
          arr[i].sinistro ? sinistro = parseFloat(arr[i].sinistro).toFixed(2)+"€" : sinistro = '';
          arr[i].mecanica ? mecanica = parseFloat(arr[i].mecanica).toFixed(2)+"€" : mecanica = '';
          arr[i].combustivel ? combustivel = parseFloat(arr[i].combustivel).toFixed(2)+"€" : combustivel = '';
          arr[i].portagem ? portagem = parseFloat(arr[i].portagem).toFixed(2)+"€" : portagem = '';
          arr[i].lavagem ? lavagem = parseFloat(arr[i].lavagem).toFixed(2)+"€" : lavagem = '';
          arr[i].parque ? parque = parseFloat(arr[i].parque).toFixed(2)+"€" : parque = '';
          arr[i].diversos ? diversos = parseFloat(arr[i].diversos).toFixed(2)+"€" : diversos = '';

      $("#delete_team").append("<tr id='del_expensies_"+arr[i].id+"'><td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'><input type='text' id='col-1-"+arr[i].id+"' class='datetimepicker_dt frm-item' value='"+data_out+"'><label>"+data_out+"</label></td><td class='col-2'><select id='col-2-"+arr[i].id+"' class='frm-item form_select'><option value='"+arr[i].matricula+"'>"+matr+"</option></select><label>"+matr+"</label></td><td class='col-3'><input type='number' min='0' id='col-3-"+arr[i].id+"' class='frm-item' value='"+arr[i].km_inicio+"'><label>"+arr[i].km_inicio+"</label></td><td class='col-4'><input type='number' min='0' id='col-4-"+arr[i].id+"' class='frm-item' value='"+arr[i].km_fim+"'><label>"+arr[i].km_fim+"</label></td><td class='col-5'><label>"+dif+"</label></td><td class='col-6'><input type='text' id='col-5-"+arr[i].id+"' class='frm-item' value='"+arr[i].fatura+"'><label>"+arr[i].fatura+"</label></td><td class='col-7'><input type='number' step='any' id='col-6-"+arr[i].id+"' class='frm-item' value='"+arr[i].selo+"'><label class='txt-fr'>"+selo+"</label></td><td class='col-8'><input type='number' step='any' id='col-7-"+arr[i].id+"' class='frm-item' value='"+arr[i].seguro+"'><label class='txt-fr'>"+seguro+"</label></td><td class='col-9'><input type='number' step='any' id='col-8-"+arr[i].id+"' class='frm-item' value='"+arr[i].inspeccao+"'><label class='txt-fr'>"+inspeccao+"</label></td><td class='col-10'><input type='number' step='any' id='col-9-"+arr[i].id+"' class='frm-item' value='"+arr[i].revisao+"'><label class='txt-fr'>"+revisao+"</label></td><td class='col-11'><input type='number' step='any' id='col-10-"+arr[i].id+"' class='frm-item' value='"+arr[i].sinistro+"'><label class='txt-fr'>"+sinistro+"</label></td><td class='col-12'><input type='number' step='any' id='col-11-"+arr[i].id+"' class='frm-item' value='"+arr[i].mecanica+"'><label class='txt-fr'>"+mecanica+"</label></td><td class='col-13'><select id='col-12-"+arr[i].id+"' class='frm-item form_select'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><label>"+arr[i].staff+"</label></td><td class='col-14'><input type='number' step='any' id='col-13-"+arr[i].id+"' class='frm-item' value='"+arr[i].combustivel+"'><label class='txt-fr'>"+combustivel+"</label></td><td class='col-15'><input type='number' step='any' id='col-14-"+arr[i].id+"' class='frm-item' value='"+arr[i].portagem+"'><label class='txt-fr'>"+portagem+"</label></td><td class='col-16'><input type='number' step='any' id='col-15-"+arr[i].id+"' class='frm-item' value='"+arr[i].lavagem+"'><label class='txt-fr'>"+lavagem+"</label></td><td class='col-17'><input type='number' step='any' id='col-16-"+arr[i].id+"' class='frm-item' value='"+arr[i].parque+"'><label class='txt-fr'>"+parque+"</label></td><td class='col-18'><input type='number' step='any' id='col-17-"+arr[i].id+"' class='frm-item' value='"+arr[i].diversos+"'><label class='txt-fr'>"+diversos+"</label></td><td class='col-19'><input type='text' id='col-18-"+arr[i].id+"' class='frm-item' value='"+arr[i].descricao+"'><label>"+arr[i].descricao+"</label></td><td class='col-20'><a title='Validar despesa' class='vld-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+")' style='margin-left: 7px;'><span class='glyphicon glyphicon-saved'></span></a><select id='col-20-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].validado+"'>"+arr[i].validado+"</option><option value='Não'>Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].validado+"</label></td><td class='col-21' id='action-"+arr[i].id+"'style='display:inline-flex'><button title='Apagar Despesa' class='btn btn-danger'onclick='confirmDeleteExpensies("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left:9px;' class='btn btn-info' title='Editar Despesa'onclick='showFrmExpensies("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></td></tr>");
arr[i].validado == 'Sim' ? $('.vld-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.vld-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');



}


geral_tot = selo_tot +seguro_tot + inspeccao_tot + revisao_tot +sinistro_tot +mecanica_tot +combustivel_tot +portagem_tot +lavagem_tot +parque_tot +diversos_tot;


$('#dif_tot').html("<label style='font-size:12px;'>"+dif_tot+"</label>")

        $('.btn-print').removeClass('disabled');
        $('.search_results').fadeIn();
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados : "+despesa);
        selo_tot !=0 ? $('#selo_tot').html("<label class='txt-fr'>"+selo_tot.toFixed(2)+"€</label>") : $('#selo_tot').html("<label class='txt-fr'>--/--</label>");
        seguro_tot !=0 ? $('#segur_tot').html("<label class='txt-fr'>"+seguro_tot.toFixed(2)+"€</label>") : $('#segur_tot').html("<label class='txt-fr'>--/--</label>");
        inspeccao_tot !=0 ? $('#inspeccao_tot').html("<label class='txt-fr'>"+inspeccao_tot.toFixed(2)+"€</label>") : $('#inspeccao_tot').html("<label class='txt-fr'>--/--</label>");
        revisao_tot !=0 ? $('#revisao_tot').html("<label class='txt-fr'>"+revisao_tot.toFixed(2)+"€</label>") : $('#revisao_tot').html("<label class='txt-fr'>--/--</label>");
        sinistro_tot !=0 ? $('#sinistro_tot').html("<label class='txt-fr'>"+sinistro_tot.toFixed(2)+"€</label>") : $('#sinistro_tot').html("<label class='txt-fr'>--/--</label>");
    mecanica_tot !=0 ? $('#mecanica_tot').html("<label class='txt-fr'>"+mecanica_tot.toFixed(2)+"€</label>") : $('#mecanica_tot').html("<label class='txt-fr'>--/--</label>");    
    combustivel_tot !=0 ? $('#combustivel_tot').html("<label class='txt-fr'>"+combustivel_tot.toFixed(2)+"€</label>") : $('#combustivel_tot').html("<label class='txt-fr'>--/--</label>");
    portagem_tot !=0 ? $('#portagem_tot').html("<label class='txt-fr'>"+portagem_tot.toFixed(2)+"€</label>") : $('#portagem_tot').html("<label class='txt-fr'>--/--</label>");
    lavagem_tot !=0 ? $('#lavagem_tot').html("<label class='txt-fr'>"+lavagem_tot.toFixed(2)+"€</label>") : $('#lavagem_tot').html("<label class='txt-fr'>--/--</label>");
    parque_tot !=0 ? $('#parque_tot').html("<label class='txt-fr'>"+parque_tot.toFixed(2)+"€</label>") : $('#parque_tot').html("<label class='txt-fr'>--/--</label>");
    diversos_tot !=0 ? $('#diversos_tot').html("<label class='txt-fr'>"+diversos_tot.toFixed(2)+"€</label>") : $('#diversos_tot').html("<label class='txt-fr'>--/--</label>");
geral_tot !=0 ? $('#geral_tot').html("<label class='txt-fr'>"+geral_tot.toFixed(2)+"€</label>") : $('#geral_tot').html("<label class='txt-fr'>--/--</label>");
}






/*CORRECAO TABELA*/
setTimeout(function(){
 $(".table.with-responsive-wrapper").floatThead({
        responsiveContainer: function($table){
            return $table.closest(".table-responsive");
        },
        zIndex: function($table){
            return 1;},
        top: function($table){
            return 51;

        }
    });
window.dispatchEvent(new Event('resize'));
 }, 550);

    },
    error:function(data){
      $('#Modalko .debug-url').html('Erro ao obter dados Despesas, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

 $('#in_date').change(function () {
    if ($(this).is(':checked')) {
        $('#in_date').val('1');
        $('#search_action').removeClass('disabled');
        $('.in_date').fadeIn();
        $('#between_date').val('0');
         $('.between_date').hide();
         document.getElementById("between_date").checked = false;
    };
    if ($(this).is(':checked') == false) {
        $('#in_date').val('0');
         $('.in_date').hide();
    };
});

  $('#between_date').change(function () {
    if ($(this).is(':checked')) {
        $('#between_date').val('1');
        $('#search_action').removeClass('disabled');
        $('.between_date').fadeIn();
        $('#in_date').val('0');
         $('.in_date').hide();
         document.getElementById("in_date").checked = false;
    };
    if ($(this).is(':checked') == false) {
        $('#between_date').val('0');
         $('.between_date').hide();
    };
});

  $('#staff_date').change(function () {
    if ($(this).is(':checked')) {
    	$('#search_action').removeClass('disabled');
        $('#staff_date').val('1');
        $('.staff_date').fadeIn();
    };
    if ($(this).is(':checked') == false) {
        $('#staff_date').val('0');
         $('.staff_date').hide();
    };
});

noload = 0;
    $('#matricula_date').change(function () {
    if ($(this).is(':checked')) {
      if (noload == 0){
        callVehiculeToFilter();
        noload =1;
        }
    	$('#search_action').removeClass('disabled');
        $('#matricula_date').val('1');
        $('.matricula_date').fadeIn();
    };
    if ($(this).is(':checked') == false) {
        $('#matricula_date').val('0');
         $('.matricula_date').hide();
    };
});

</script>