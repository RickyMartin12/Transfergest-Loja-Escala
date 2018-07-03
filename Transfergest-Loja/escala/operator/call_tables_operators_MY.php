<style>
.input-group-addon {color:initial;background-color:initial;}
.btn-success {color: #fff;background-color: #5cb85c;border-color: #4cae4c;}
.btn-default {color: #333;background-color: #fff;border-color: #ccc;}
.fa-1x {font-size:1.29em;}
.btn-sm {margin-left: 3px;}
td>button{margin: 0px 0px 0px 4px!important;}
.bdrp{border: 1px solid #333;padding: 3px 1px;border-radius: 3px;font-size: 11px;}
.bdr-w{padding: 8px;}
.panel-nopd{padding: 0px;}
</style>

<div class="company"></div>

<div class="panel panel-default table-operadores">
  <div class="panel-heading my-orange">
    <h3 class="panel-title">
     <span class="glyphicon glyphicon-list-alt"></span> Tabelas Operadores
    </h3>
   </div>
 <div class="panel-body panel-nopd">
  <div class="table-responsive">
    <table class="table table-striped print-hide op-tables" style="margin-bottom:0px; font-size:12px;">
     <thead class="op-header my-gray">
     </thead>
     <tbody class="op-body">
     </tbody>
    </table>
   </div>
  </div>
<div class="panel-footer my-orange"></div>
</div>

<div class="panel panel-default">
<div class="panel-heading my-orange" style="padding: 10px 0px;">
<div class="row">
<div class='col-sm-7 col-xs-12'>
<h3 class="panel-title" style="color:#333;margin-bottom: 10px;">
<span class="glyphicon glyphicon-eur"></span> Preços Operadores </h3>
</div>
<div class='col-sm-2 hidden-xs print-hide'>
<a style="float:right;" href="#" class="btn btn-default btn-print disabled" onclick="goToPrint(5);" title="Imprimir Tabela"><span class="glyphicon glyphicon-print"></span></a>
</div>
<div class='col-sm-3 col-xs-12'>
<div class='input-group  print-hide'>
<input type='number' class='form-control' placeholder='Calcular PO em %' step='any' min='-100' max='100'/><a href="#" class='disabled my-percent-calc btn btn-success input-group-addon' onclick='tablePercentCalc($(this).prev().val())' title='Validar percentagem a todos os valores do operador'><span class='glyphicon glyphicon-ok'></span></a>
</div>
</div>
</div>
</div>

<div class='table-responsive'>
<table class='table table-striped' style='margin-bottom:0px; font-size:12px;' id="operator-tables">
</table>
</div>
<div class="panel-footer my-orange">
</div>
</div>

<script>

 op_pr = '';
 dataValue="action=110";
 $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
 
   op_pr = JSON.parse(data);
 
    buildTable();
    },
    error:function(data){
     $('.debug-url').html('Erro ao obter os preços, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
    }
  });


function buildTable(){

lbl = 0;
lbl_oper = 0;

/*CABECALHO TABELA OPERADORES*/

oper = JSON.parse(localStorage.getItem("operadores"));
prods = JSON.parse(localStorage.getItem("prods_category"));

   x = "<th class='bdr-w'>Operador</th><th class='bdr-w'>Tipo</th>";

   for (i=0;i<prods.length;i++){
      x +='<th class="bdr-w column-'+prods[i].cat+'">'+prods[i].label+'</th>';

    }
$('.op-header').html(x);

/*CAMPO LINHA OPERADORES E CATEGORIAS*/
/* OBJECTO LINHA C/ OPERADORES */

y='';

/* OBJECTO ACÇÕES BOTÕES*/

e='';

c='';

/* OPERADORES TIPO TABELA EXISTENTES */

  for (i=0;i<oper.length;i++){

   /* CATEGORIAS EXISTENTES */

     for (j=0;j<prods.length;j++){

    /* TABELA PREÇOS OPERADORES*/

          cat = "'"+prods[j].label+"'";
          op = "'"+oper[i].label+"'";

/*TABELA OPERADORES PREÇOS SEM VALORES*/

/*ESCRITA EM CADA BLOCO CATEGORIA*/
if (op_pr[0].actions == null || op_pr[0].actions < 1 || op_pr[0].actions =='null'){
e= '<span class="create-table-'+oper[i].value+'-'+prods[j].cat+'"><button class="btn-primary btn btn-sm" title="Criar Tabela de: '+prods[j].label+' para operador: '+oper[i].label+'"onclick="tableOperatorActions(3,'+oper[i].value+','+prods[j].cat+','+cat+','+op+')"><span class="glyphicon glyphicon-plus"></span></button></span>';
}

else{

for (r = 0 ; r < op_pr[0].actions.length ; r++){

 e = '<span class="create-table-'+oper[i].value+'-'+prods[j].cat+'"><button class="btn-primary btn btn-sm" title="Criar Tabela de: '+prods[j].label+' para operador: '+oper[i].label+'"onclick="tableOperatorActions(3,'+oper[i].value+','+prods[j].cat+','+cat+','+op+')"><span class="glyphicon glyphicon-plus"></span></button></span><span class="update-table-'+oper[i].value+'-'+prods[j].cat+' hidden"><button class="btn-warning btn btn-sm" onclick="tableOperatorActions(4,'+oper[i].value+','+prods[j].cat+','+cat+','+op+')"><span class="glyphicon glyphicon-refresh" title="Actualizar Tabela de: '+prods[j].label+' para operador: '+oper[i].label+'"></span></button></span><span class="edit-table-'+oper[i].value+'-'+prods[j].cat+' hidden"><button class="btn-info btn btn-sm" title="Editar Tabela de: '+prods[j].label+' para operador: '+oper[i].label+'" onclick="tableOperatorActions(2,'+oper[i].value+','+prods[j].cat+','+cat+','+op+')"><span class="glyphicon glyphicon-edit"></span></button><button title="Apagar Tabela de: '+prods[j].label+' para operador: '+oper[i].label+'"  class="btn btn-sm btn-danger" onclick="tableOperatorActions(1,'+oper[i].value+','+prods[j].cat+','+cat+','+op+')"><span class="glyphicon glyphicon-trash"></span></button> <font title="Ultima % atribuida" class="bdrp hidden bdrp-'+oper[i].value+'-'+prods[j].cat+'"></font></span>';
}

}

/*OBJECTO DE PARA CADA TIPO DE CATEGORIA/OPERADOR */

c +='<td>'+e+'</td>';
}

/*INSERIR FILAS DOS OPERADORES TIPO TABELA E CATEGORIAS*/

if (oper[i].tipo =='Tabela' || oper[i].tipo == 'Tabela Percentagem')
   y += "<tr class='row-"+oper[i].value+"'><td>"+oper[i].label+"</td> <td>"+oper[i].tipo+"</td>"+c+"</tr>";
   c='';
}

$('.op-body').html(y);
if (op_pr[0].actions == null || op_pr[0].actions < 1 || op_pr[0].actions =='null'){}
else{

for (r = 0 ; r < op_pr[0].actions.length ; r++){

op_pr[0].actions[r].valor ? vl = (op_pr[0].actions[r].valor)*100 : vl = 0;

$('.edit-table-'+op_pr[0].actions[r].id_operador+'-'+op_pr[0].actions[r].id_categoria).removeClass('hidden');
$('.create-table-'+op_pr[0].actions[r].id_operador+'-'+op_pr[0].actions[r].id_categoria).addClass('hidden');
$('.update-table-'+op_pr[0].actions[r].id_operador+'-'+op_pr[0].actions[r].id_categoria).addClass('hidden');
$('.bdrp-'+op_pr[0].actions[r].id_operador+'-'+op_pr[0].actions[r].id_categoria).text(parseFloat(vl).toFixed(1)+'%').removeClass('hidden');




}






}


}





function tableOperatorActions(action,ope,cat,n1,n2){
  $(".back").fadeIn();

  switch(action) {
    case 1:
    /*APAGAR TABELAS DOS PARA OPERADORES*/
    confirmDeleteTableOperator(ope,cat);
    break;

    case 2:
      searchLocalTables(ope,cat);
      pcrtg = '-/-';
      $('.bdrp-'+ope+'-'+cat).text() ? pcrtg = $('.bdrp-'+ope+'-'+cat).text() : pcrtg;

      $('.table-operadores').hide();

if ($('.cat-txt').text().length < 1){

      leg = '<span style="font-size: 15px;"><input type="hidden" id="id-op" value='+ope+'><input type="hidden" id="id-cat" value='+cat+'> <strong>Categoria: </strong><span class="op-txt">'+n1+'</span> <strong>Operador: </strong><span class="cat-txt">'+n2+'</span><span class="percentagem print-hide"><strong> Ultima % atribuida: </strong>'+pcrtg+'</span></span>';
       $('.panel-title').html(leg);
}

       break;

    case 3:
      createCategoryTableOperator(ope,cat,n1,n2);
      break;

    case 4:
      createCategoryTableOperator(ope,cat,n1,n2);
     break;

  }
}




function createCategoryTableOperator(ope,cat,n1,n2){
  dataValue='operador='+ope+'&cat='+cat+'&action=102';
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    operadorLink(3);
    },
    error:function(data){
      $(".back").fadeOut();
      $('.debug-url').html('Não foi possivel obter os produtos da Categoria, p.f. verifique se tem produtos associados.');
      $("#mensagem_ko").trigger('click');
    }
  });
}


function searchLocalTables(prod,cat){
  precos ='';
  paxs ='';
  body='';
  p ='';

  $('.back').fadeIn();

  dataValue="cat="+cat+"&operador="+prod+"&action=15";
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){

      $('.op-tables').hide();
      $('.back').fadeOut();
      prods = JSON.parse(data);
      if (prods == null || prods.length < 1 || prods =='null'){ 
        $('.btn-print,.my-percent-calc').addClass('disabled');
        $('#operator-tables').empty();
        $('.debug-url').html('Não tem produtos criados na categoria seleccionada! P.f. crie em "Produtos --> Produto --> Criar Rota".');
        $("#mensagem_ko").trigger('click');
        return;
      }
      else{

        /*TODAS AS CLASSES PARA HEADER DA TABLE PREÇOS OPERADORES*/

        $('.btn-print, .my-percent-calc').removeClass('disabled');

        for(i=0;i<prods[0].labels.length;i++){
          paxs += "<th class='bdr-w'>"+prods[0].labels[i].nome+"</th>";
       }

      header = "<thead class='my-gray'><tr><th class='bdr-w'>Locais</th>"+paxs+"<th class='print-hide' style='text-align: center; min-width:80px;'></th></tr></thead>";

      for (i=0;i<prods.length;i++){

        for (j=0;j<prods[i].pvp.length;j++){

          /* CAMPOS PVP */
          prods[i].pvp[j].valor ?  pvp_u = parseFloat(prods[i].pvp[j].valor).toFixed(2)+'€' : pvp_u = '-/-';
          pvp = '<div class="my-medium-gray pvp-price"><font class="my-t-f-b">PVP:</font><font class="pricepvp"> '+pvp_u+'</font></div>';

          /* CAMPOS PO */

          prods[i].po[j].valor ? po_u = prods[i].po[j].valor : po_u ='0';
          po = '<div class="my-medium-gray po-price"><font class="col-'+j+'-'+prods[i].id+'"><strong>PO: </strong>'+parseFloat(po_u).toFixed(2)+'€</font><input min="0" data-id="'+prods[i].po[j].id+'" class="frm-item form-control editprice-'+prods[i].id+' val-'+j+'-'+prods[i].id+'" value="'+po_u+'" type="number" step="any"></div>';


          /* CAMPOS PN */  
          prods[i].noturno[j].valor ? pn_u = prods[i].noturno[j].valor : pn_u ='0';
          pn = '<div class="my-medium-gray pn-price"><font class="col-'+j+'-'+prods[i].id+'-pn"><strong>PN: </strong>'+parseFloat(pn_u).toFixed(2)+'€</font><input min="0" data-id="'+prods[i].noturno[j].id+'" class="frm-item form-control editprice-pn-'+prods[i].id+' val-'+j+'-'+prods[i].id+'" value="'+pn_u+'" type="number" step="any"></div>';



          /*INSERIR ELEMENTOS PVP E PO*/
          precos += '<td>'+pvp+''+po+''+pn+'</td>';
        }

        /* LINHA OPERADOR, CATEGORIAS E ACÇÕES */
        p +='<tr class="tabela-oper-'+prods[i].id+'"><td scope="row"><div class="my-medium-gray"><font class="my-t-f-b">De: </font>'+prods[i].local+'</div><div class="my-medium-gray"><font class="my-t-f-b">Para: </font>'+prods[i].local_fim+'</div></td>'+precos+'<td id="action-prices-'+prods[i].id+'" class="print-hide"><div style="float: right;" role="group"><button class="btn btn-info btn-sm btn-'+prods[i].id+'" onclick="StartEditFrmTablePrices('+prods[i].id+')"><span class="glyphicon glyphicon-edit"></span></button></div></td></tr>';
        precos='';
     }

     body = '<tbody style="font-size: 12px;">'+p+'</tbody>;'

  }

  $('#operator-tables').html(header+''+body);
  },
    error:function(data){
      $('.btn-print').removeClass('disabled');
      $('.back').fadeOut();
      $('.debug-url').html('Erro ao obter os Produtos, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
  });
}


/*CALCULO DA PERCENTAGEM SOBRE OS PRODUTOS */


function tablePercentCalc(vl){
  vl > 100 ? vl = 100 : vl;
  vl < -100 ? vl= -100 : vl;
  if (!vl || vl == 0 ){
    $('.debug-url').html('Para calcular os valores percentagem, p.f insira valor maior que -100 e menor que 100 no campo <b>Calcular</b> e tente novamente.');
    $("#mensagem_ko").trigger('click');
    return;
  }
  else {
    bootbox.dialog({
    message: "Por favor escolha calculo com base em: <select style='margin:0 auto;width: 230px;' class='form-control' id='precos'><option value='0'> PO (Preço Operador)</option><option value='1'> PVP (Preço Venda Publ.)</option></select>",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
    },
    danger: {
      label: "<span class='glyphicon glyphicon-ok'></span> Confirmar",
      className: "btn-success",
      callback: function() {
      $(".back").fadeIn();

     /*CALCULO SOBRE PO = 0 OU PVP = 1 */
     $('#precos').val() == 0 ?
     
     dataValue="oper="+$('#id-op').val()+"&vl="+vl+"&cat="+$('#id-cat').val()+"&action=16" : 
     
     dataValue="oper="+$('#id-op').val()+"&vl="+vl+"&cat="+$('#id-cat').val()+"&action=103";

  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){

    if (data.match(/0/g)){
      $(".back").fadeOut();
      $('.debug-url').html('Não foi possivel alterar os valores, p.f. tente novamente mais tarde.');
      $("#mensagem_ko").trigger('click');
    }
    else {
     $('.my-percent-calc').prev().val('');
     $('.op-tables').hide();
     tableOperatorActions(2,$('#id-op').val(),$('#id-cat').val(),$('.cat-txt').text(),$('.op-txt').text());
     $('.percentagem').html('<strong> Ultima % atribuida: </strong>'+parseFloat(vl).toFixed(1)+'%');
    }
  },
  error:function(){
    $('.back').fadeOut();
    $('.debug-url').html('Os valores não foram alterados, p.f. verifique a ligação WiFi.');
    $("#mensagem_ko").trigger('click');
   }
 });
    }
  },
  }
});
}
}


/* BOTÃO INICIAL PARA EDIÇÃO DOS PREÇOS TABELA OPERADOR*/

function StartEditFrmTablePrices(prod){
$('.editprice-'+prod).removeClass('frm-item').prev().hide();
$('.tabela-oper-'+prod).addClass('w3-pale-green');
$('.tabela-oper-'+prod+' input').css('margin-top','4px');
EditTable(prod);
}

/*REPOR BOTÃO INICIAL PARA EDICÃO/GRAVAR*/

function cancelFrmTableEdit(prod){
$('#action-prices-'+prod).html("<div style='float: right;' role='group'><button class='btn btn-info btn-sm btn-"+prod+"' onclick='StartEditFrmTablePrices("+prod+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
  $('#container-calc-'+prod).empty();
  $('.tabela-oper-'+prod).removeClass('w3-pale-green');
  $('.tabela-oper-'+prod+' input').css('margin-top','0');

  $('.editprice-'+prod).addClass('frm-item').prev().show();
  $('#heading-'+prod+' select').val('0');
}




/* BOTÃO PARA EDITAR/UPDATE */

function EditTable(prod){
$('#action-prices-'+prod).html("<div style='float:right;' role='group'><button title='Guardar' class='btn btn-sm btn-success' onclick='EditTableData("+prod+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Fechar Edição' class='btn btn-sm btn-default' onclick='cancelFrmTableEdit("+prod+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}


/* ATUALIZAR DADOS */

function EditTableData(prod){
 dataArray= [];
  $( '.editprice-'+prod ).each(function() {
      !$(this).val() ? $(this).val(0) : false;
        dataArray.push({id:$(this).data('id'),val:$(this).val()});
 });
 updateTablePriceOperator(dataArray,prod);
}

/*EDITAR REGISTOS TABELA OPERADOR*/
function updateTablePriceOperator(dataA,prod){

$(".back").fadeIn();
  dataValue="arr="+JSON.stringify(dataA)+"&oper="+$('#id-op').val()+"&cat="+$('#id-cat').val()+"&action=11";
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
     $(".back").fadeOut(); 
      if (data.match(/0/g)){
       $('.debug-url').html('Surgiu um erro, os valores não foram alterados, p.f. tente novamente mais tarde.');
       $("#mensagem_ko").trigger('click');
      }
      else {
        for( j=0 ; j<dataA.length; j++ ){
          $('.col-'+j+'-'+prod).html('<strong>PO: </strong>'+parseFloat($('.val-'+j+'-'+prod).val()).toFixed(2)+'€');
        }
      cancelFrmTableEdit(prod);

      }
   },
 error:function(){
   $(".back").fadeOut();
   $('.debug-url').html('Os valores não foram alterados, p.f. verifique a ligação WiFi.');
   $("#mensagem_ko").trigger('click');
   }
  });
}



/* EVENTO TECLA ENTER */
document.getElementsByClassName('btn-key-down').onkeydown = function(e){
   if(e.keyCode == 13){
   getCategoriesProds($('#get_operador').val(),$('#prods_category option:selected').data('id'));
   }
};


/*MOSTRAR CAMPOS PARA EDITAR REGISTO DE PREÇOS POR PAX (1)*/

function showFrmTableEdit(id){
id_op = $('#val').val();
  $("#tables-"+id).addClass('w3-pale-green');
  for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Guardar' class='btn btn-info safe_it btn-sm' onclick='saveTableEditPrice("+id+","+id_op+")'><span class='glyphicon glyphicon-edit'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelTableEdit("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS EDIÇÃO REGISTO DE PREÇOS POR PAX */
function cancelTableEdit(id){
  $("#tables-"+id).removeClass('w3-pale-green');
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-info btn-sm' title='Editar Preço'  onclick='showFrmTableEdit("+id+")'><span class='glyphicon glyphicon-edit'></span></button></div>");
}

/* EDITAR GRAVAR VALORES POR PAX NOS OPERADORES */
function saveTableEditPrice(id,id_op){
  $(".back").fadeIn();
  setTimeout(function(){ 
  var dataValue='';
  for(i=1;i<5;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id_prod="+id+"&id_op="+id_op+"&action=9";
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
if (data == 11){
      $('.debug-url').html('Os valores foram alterados com sucesso.');
      $("#mensagem_ok").trigger('click');
      $('#tables-'+id).removeClass('w3-pale-green');
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
}
else if (data == 10){
       $('.debug-url').html('Surgiu um erro, os valores não foram alterados, p.f. tente novamente mais tarde.');
      $("#mensagem_ko").trigger('click');}
   },
 error:function(){
   $(".back").fadeOut();
   $('.debug-url').html('Os valores não foram alterados, p.f. verifique a ligação WiFi.');
   $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}



/*LANCAMENTO NOVOS PRECOS */

/*MOSTRAR CAMPOS PARA CRIAR NOVO REGISTO DE PREÇOS POR PAX (1)*/
function showFrmTableNew(id){
id_op = $('#val').val();
  $("#tables-"+id).addClass('w3-pale-green');
  for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button title='Guardar' class='btn btn-success safe_it btn-sm' onclick='saveTableNewPrice("+id+","+id_op+")'><span class='glyphicon glyphicon-save-file'></span></button><button title='Cancelar' class='btn btn-default btn-sm' onclick='cancelItem("+id+")'><span class='glyphicon glyphicon-remove-sign'></span></button></div>");
}
 
/*FECHAR OS CAMPOS DE NOVO REGISTO DE PREÇOS POR PAX */
function cancelItem(id){
  $("#tables-"+id).removeClass('w3-pale-green');
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
    $("#action-"+id).html("<div class='btn-group btn-group' style='float: right;' role='group'><button class='btn btn-success btn-sm op-bt-new' title='Criar Preço'  onclick='showFrmTableNew("+id+")'><span class='glyphicon glyphicon-save-file'></span></button></div>");
}

/* EDITAR GRAVAR LOCAIS */
function saveTableNewPrice(id,id_op){
  $(".back").fadeIn();
  setTimeout(function(){ 
  var dataValue='';
  for(i=1;i<5;i++){
   dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id_prod="+id+"&id_op="+id_op+"&action=8";
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      $(".back").fadeOut();
if (data == 11){
       $('.debug-url').html('Os valores foram guardados com sucesso.');
      $("#mensagem_ok").trigger('click');
      $('#tables-'+id).removeClass('w3-pale-green');
      searchOperadores($('#val').val());
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
}
else if (data == 10){
       $('.debug-url').html('Surgiu um erro, os valores não foram guardados, p.f. tente novamente mais tarde.');
      $("#mensagem_ko").trigger('click');}
   },
 error:function(){
   $(".back").fadeOut();
   $('.debug-url').html('Os valores não foram guardados com sucesso, p.f. verifique a ligação WiFi.');
   $("#mensagem_ko").trigger('click');
    }
  });
    }, 1000);
}





function confirmDeleteTableOperator(ope,cat){

bootbox.dialog({
  message: "Tem a certeza que pretende apagar os preços da Tabela do Operador",
   title: "<span style='color:#f0ad4e;'><span class='glyphicon glyphicon-exclamation-sign'></span> Confirmar</span>",
  buttons: {
    default: {
      label: "<span class='glyphicon glyphicon-remove-sign'></span> Fechar",
      className: "btn-default",
      callback: function() {$(".back").fadeOut();}
    },
    danger: {
      label: "<span class='glyphicon glyphicon-trash'></span> Apagar",
      className: "btn-danger",
      callback: function() {
    dataValue='operador='+ope+'&cat='+cat+'&action=101';
     $.ajax({
      type: "POST",
      url: "operator/action_operator.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 1){
          $('#Modalok .debug-url').html('Os preços da tabela foram apagados com sucesso.');
          $("#mensagem_ok").trigger('click');
          operadorLink(3);
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
        else{
          $('#Modalko .debug-url').html('Não foi possivel apagar os preços da tabela, tente novamente mais tarde.');
          $("#mensagem_ko").trigger('click');
        }

      },
      error:function(data){
        $('#Modalko .debug-url').html('Não foi possivel apagar, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}




</script>