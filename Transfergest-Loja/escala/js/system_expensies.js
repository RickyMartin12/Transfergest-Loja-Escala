function confirmDeleteExpensies(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Despesa #<strong>"+id+"</strong>",
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
     dataValue='id='+id+'&action=2';
     $.ajax({
      type: "POST",
      url: "expensies/action_expensies.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){
          searchDataExpensies();
          $('.debug-url').html('A despesa #'+id+' foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('A despesa #'+id+' não foi apagada, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}


function confirmDeleteExpensiesFixed(id){
bootbox.dialog({
  message: "Tem a certeza que pretende apagar a Despesa #<strong>"+id+"</strong>",
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
     dataValue='id='+id+'&action=10';
     $.ajax({
      type: "POST",
      url: "expensies/action_expensies.php",
      data: dataValue,
      cache:false,
      success: function(data){
        if(data == 2){
          searchDataExpensies();
          $('.debug-url').html('A despesa #'+id+' foi apagada com sucesso.');
          $("#mensagem_ok").trigger('click');
          setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
        }
      },
      error:function(data){
        $('.debug-url').html('A despesa #'+id+' não foi apagada, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');
      }
   });
      }
    },
  }
});
}



/*CALL EXPENSIES FIXED*/


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

function searchDataExpensies(){
valor_tot =0;
valor = 0;
expensiesf='';
dataValue='';
despesa='';
dia_f = $("#day_date").val();
mes_f = $("#mes_date").val();
fact = $("#fatura_id").val();

switch (flag){
case 0:
if (fact) dataValue='action=11&fatura='+fact;
break;
case 1:
if(dia_f && !fact) dataValue='action=11&dia='+dia_f;
else if(dia_f && fact) dataValue='action=11&dia='+dia_f+'&fatura='+fact;

break;
case 2:
if(mes_f && !fact) dataValue='action=11&mes='+mes_f;
else if(mes_f && fact) dataValue='action=11&mes='+mes_f+'&fatura='+fact;
break;
}

if (flag==0 && !fact || flag==1 && !dia_f || flag==2 && !mes_f){
 $('#Modalko .debug-url').html('Os campos para efetuar a pesquisa estão vazios, p.f. preencha e volte a tentar.');
 $("#mensagem_ko").trigger('click');
return;}

if(dataValue.length > 2){

$('.back').fadeIn();
setTimeout(function(){
     $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST',
    cache:false, 
    success:function(data){
    $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('#Modalko .debug-url').html('Não foram encontradas Despesas, pf modifique a pesquisa!');
        $("#mensagem_ko").trigger('click');
        $(".back").fadeOut();
        $('#expensies-fixed').empty();
        $('.search_results').fadeIn();
        $('.btn-print').addClass('disabled');
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags' style='font-size:16px;'></span>&nbsp; Registos : 0");
      }
      else {
        $("#delete_team").empty();
     for(i=0;i<arr.length;i++){
       data_out = moment(arr[i].data*1000).format("DD/MM/YYYY");
       despesa= i+1;

         if( arr[i].valor) valor_tot += parseFloat(arr[i].valor);
        
          arr[i].valor ? valor = parseFloat(arr[i].valor).toFixed(2)+"€" : valor = '--/--';
         
     expensiesf +="<tr id='del_expensies_fixed"+arr[i].id+"'><td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'><input type='text' id='col-1-"+arr[i].id+"' class='datetimepicker_dt frm-item' value='"+data_out+"'><label>"+data_out+"</label></td><td class='col-2'><input type='text' id='col-2-"+arr[i].id+"' class='frm-item' value='"+arr[i].fatura+"'><label>"+arr[i].fatura+"</label></td><td class='col-3'><input type='text' id='col-3-"+arr[i].id+"' class='frm-item' value='"+arr[i].descricao+"'><label>"+arr[i].descricao+"</label></td><td class='col-4'><input type='number' step='any' min='0' id='col-4-"+arr[i].id+"' class='frm-item' value='"+arr[i].valor+"'><label class='txt-fr'>"+valor+"</label></td><td class='col-5 nosearchprint' id='action-"+arr[i].id+"'><button title='Apagar Despesa' class='btn btn-danger'onclick='confirmDeleteExpensiesFixed("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left:9px;' class='btn btn-info' title='Editar Despesa'onclick='showFrmExpensiesFixed("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></td></tr>";
}

$("#expensies-fixed").html(expensiesf);

        $('.btn-print').removeClass('disabled');
        $('.search_results').fadeIn();
        $('#nr_resultados').html("<span class='glyphicon glyphicon-tags'></span>&nbsp; Resultados : "+despesa);

        valor_tot !=0 ? $('#valor_tot').html("<label class='txt-fr'>"+valor_tot.toFixed(2)+"€</label>") : $('#valor_tot').html("<label class='txt-fr'>--/--</label>");
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
}


/*MOSTRA CAMPOS EDIÇÃO DSPESAS FIXAS*/

function showFrmExpensiesFixed(id){
var date = new Date();
d = date.setDate(date.getDate());
$('#del_expensies_fixed'+id+' .datetimepicker_dt').datetimepicker({
    format: 'DD/MM/YYYY', 
    locale: 'pt'
});

$('#del_expensies_fixed'+id).addClass('list-group-item-success');
  for(i=1;i<5;i++){
    $(" #col-"+i+"-"+id).show().next().hide();
    }
    $("#action-"+id).html('<button class="btn btn-success safe_it" title="Guardar" onclick="saveItemExpensiesFixed('+id+');"><span class="glyphicon glyphicon-save-file"></span></button><button style="margin-left: 9px;" class="btn btn-default "onclick="cancelExpensiesFixed('+id+');" title="Fechar"><span class="glyphicon glyphicon-remove-sign"></span></button>');


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
 }, 150);
}



/*FECHAR OS CAMPOS DE EDIÇÃO DESPESAS FIXA*/
function cancelExpensiesFixed(id){
   for(i=1;i<5;i++){
    $("#col-"+i+"-"+id).hide().next().show();
    }
$('#del_expensies_fixed'+id).removeClass('list-group-item-success');
    $("#action-"+id).html("<button title='Apagar Despesa' class='btn btn-danger' onclick='confirmDeleteExpensies("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 9px;'class='btn btn-info' title='Editar despesa' onclick='showFrmExpensiesFixed("+id+")'><span class='glyphicon glyphicon-edit'></span></button>");

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
 }, 150);
 }


/* EDITAR/ALTERAÇÃO GRAVAR DESPESAS FIXAS*/
function saveItemExpensiesFixed(id){
  $(".back").fadeIn();
  setTimeout(function(){ 
  var dataValue='';
  for(i=1;i<5;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue +="id="+id+"&action=12";
  $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
    $(".back").fadeOut();
    if (data == 1){
      $('.debug-url').html('A despesa <b>'+id+'</b> foi modificada com sucesso.');
      $("#mensagem_ok").trigger('click');
      searchDataExpensies();
      setTimeout(function(){  $('#Modalok').modal('hide');}, 2500);
    }
    else if (data ==0){
     $('.debug-url').html('Erro, ao modificar a despesa <b>'+id+'</b>.');
     $("#mensagem_ko").trigger('click');
    }
},
    error:function(){
      $(".back").fadeOut();
      $('#Modalko .debug-url').html('A despesa <b>'+id+'</b> não foi modificada, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
 }, 750);
}




/**/









/*CARREGA PHP COM FILTROS DE PESQUISA*/
function callExpensiesFilters(){
      $('#insert-action').empty();
      $.ajax({url: "expensies/filter_expensies.php",error:function(){
        $('.debug-url').html('Erro ao obter o formulário das despesas, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');}
})
      .done(function( html ) {$('#insert-action').empty(); $( "#insert" ).html(html);callVehiculeToFilter();});
}



/*CARREGA PHP COM FORMULARIO PARA NOVA DESPESA VIATURAS*/
function callNewExpenseForm(){
      $('#insert-action').empty();
      $.ajax({url: "expensies/new_expense_form.php",error:function(){
        $('.debug-url').html('Erro ao obter o formulário das despesas, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');}
})
      .done(function( html ) {$('#insert-action').empty(); $( "#insert" ).html(html); callTeamToExpensies();callVehiculeToExpensies();});
}


/*CARREGA TEMPLATE/NAVTABS PARA NOVA DESPESA FIXA*/
function callNewExpenseFormFixed(){
      $('#insert-action').empty();
      $.ajax({url: "expensies/all_expensies_fixed.php",error:function(){
        $('.debug-url').html('Erro ao obter o modulo das despesas fixas, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');}
})
      .done(function( html ) {$('#insert-action').empty(); $( "#insert" ).html(html);callNewExpenseFormFixedInto();});
}

/*CARREGA FORMULARIO NOVA DESPESA FIXA*/
function callNewExpenseFormFixedInto(){
      $('#insert-action').empty();
      $.ajax({url: "expensies/new_fixed_expense.php",error:function(){
        $('.debug-url').html('Erro ao obter o formulário das despesas fixas, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');}
})
      .done(function( html ) { $( "#despesasfixas" ).html(html);});
}


/*CARREGA EDIÇÃO DAS DESPESAS FIXAS*/
function callExpensiesFixedActions(){
      $('#insert-action').empty();
      $.ajax({url: "expensies/call_expensies_fixed_actions.php",error:function(){
        $('.debug-url').html('Erro ao obter o formulário das despesas fixas, p.f. verifique a ligação Wi-Fi.');
        $("#mensagem_ko").trigger('click');}
})
      .done(function( html ) { $( "#editardespesafixa" ).html(html);});
}



/*CARREGAR OS ELEMENTOS DA EQUIPA PARA O FORMULARIO NOVA DESPESA*/
function callTeamToExpensies(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=5';
     $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      $(".back").fadeOut();
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
      $('.debug-url').html('Não foram encontrados elementos do staff para adicionar as despesas , p.f. crie os elementos.');
      $("#mensagem_ko").trigger('click');
      }
      else {
        for(i=0;i<arr.length;i++){
          if (arr[i].equipa)
            $('#expcol_17').append('<option>'+arr[i].equipa+'</option>');
        }
      }
    },
    error:function(data){
      $('.debug-url').html('Erro ao obter dados do staff, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
      $(".back").fadeOut();
    }
  });
}, 500);
}

/*

MENU BOTÃO DESPESAS ACÇÕES
OBTEM TODOS AS DESPESAS PARA ACÇÕES APAGAR
function callExpensiesActions(){
$('#insert-action').empty();
      $.ajax({url: "expensies/call_expensies_actions.php",error:function(){
       $('.debug-url').html('Erro ao obter os dados das despesas, p.f. verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');}

})
      .done(function( html ) {$('#insert-action').empty(); $( "#insert" ).html(html);callTeamEditExpensies();});
}

*/


/*MOSTRAR OS CAMPOS PARA EDIÇAO DESPESAS*/
function showFrmExpensies(id){
var date = new Date();
d = date.setDate(date.getDate());
$('#del_expensies_'+id+' .datetimepicker_dt').datetimepicker({
    format: 'DD/MM/YYYY', 
    locale: 'pt'
});

$('#del_expensies_'+id).addClass('list-group-item-success');

arr = JSON.parse(localStorage.getItem("team_operator"));

arrVeh = JSON.parse(localStorage.getItem("vehicle"));

if ($('#col-12-'+id+' option').size() <=1){
for(i=0;i<arr.length;i++){
          if (arr[i].equipa)
            $('#col-12-'+id).append('<option>'+arr[i].equipa+'</option>');
        }

for(i=0;i<arrVeh.length;i++){
            $('#col-2-'+id).append('<option>'+arrVeh[i].matricula+'</option>');
        }

}
  for(i=1;i<19;i++){
    $(" #col-"+i+"-"+id).fadeIn().next().hide();
    }
    $("#action-"+id).html('<button class="btn btn-success safe_it" title="Guardar" onclick="saveItemExpensies('+id+');"><span class="glyphicon glyphicon-save-file"></span></button><button style="margin-left: 9px;" class="btn btn-default "onclick="cancelExpensies('+id+');" title="Fechar"><span class="glyphicon glyphicon-remove-sign"></span></button>');


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
 }, 150);

}


/*FECHAR OS CAMPOS DE EDIÇÃO DESPESAS*/
function cancelExpensies(id){
   for(i=1;i<19;i++){
    $("#col-"+i+"-"+id).fadeOut().next().show();
    }
$('#del_expensies_'+id).removeClass('list-group-item-success');
    $("#action-"+id).html("<button title='Apagar Despesa' class='btn btn-danger' onclick='confirmDeleteExpensies("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 9px;'class='btn btn-info' title='Editar despesa' onclick='showFrmExpensies("+id+")'><span class='glyphicon glyphicon-edit'></span></button>");

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
 }, 150);
 }


/* EDITAR/ALTERAÇÃO GRAVAR DESPESAS*/
function saveItemExpensies(id){
  var dataValue='';
  for(i=1;i<19;i++){
    dataValue+="col_"+i+"_"+id+"="+$("#col-"+i+"-"+id).val()+"&";
  }
  dataValue+="id="+id+"&action=4";
  $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      arr=[];
      arr =  JSON.parse(data);
      i=0;
      data_out = moment(arr[0].data*1000).format("DD/MM/YYYY");

          fs = arr[i].matricula.substring(0, 2);
          md = arr[i].matricula.substring(2, 4);
          fn =arr[i].matricula.substring(4, 6);
          matr = fs+"-"+md+"-"+fn;


        if( arr[i].km_inicio && arr[i].km_fim){
            arr[i].km_inicio < arr[i].km_fim ? dif = parseInt(arr[i].km_fim) - parseInt(arr[i].km_inicio) : dif = 0;
          }

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

 $('#del_expensies_'+arr[0].id).fadeOut().html("<td class='col-0'><label>"+arr[i].id+"</label></td><td class='col-1'><input type='text' id='col-1-"+arr[i].id+"' class='datetimepicker_dt frm-item' value='"+data_out+"'><label>"+data_out+"</label></td class='col-2'><td><select id='col-2-"+arr[i].id+"' class='frm-item' style='margin-top: 2px;'><option value='"+arr[i].matricula+"'>"+matr+"</option></select><label>"+matr+"</label></td><td class='col-3'><input type='number' min='0' id='col-3-"+arr[i].id+"' class='frm-item' value='"+arr[i].km_inicio+"'><label>"+arr[i].km_inicio+"</label></td><td class='col-4'><input type='number' min='0' id='col-4-"+arr[i].id+"' class='frm-item' value='"+arr[i].km_fim+"'><label>"+arr[i].km_fim+"</label></td><td class='col-5'><label>"+dif+"</label></td><td class='col-6'><input type='text' id='col-5-"+arr[i].id+"' class='frm-item' value='"+arr[i].fatura+"'><label>"+arr[i].fatura+"</label></td><td class='col-7'><input type='number' step='any' id='col-6-"+arr[i].id+"' class='frm-item' value='"+arr[i].selo+"'><label class='txt-fr'>"+selo+"</label></td><td class='col-8'><input type='number' step='any' id='col-7-"+arr[i].id+"' class='frm-item' value='"+arr[i].seguro+"'><label class='txt-fr'>"+seguro+"</label></td><td class='col-9'><input type='number' step='any' id='col-8-"+arr[i].id+"' class='frm-item' value='"+arr[i].inspeccao+"'><label class='txt-fr'>"+inspeccao+"</label></td><td class='col-10'><input type='number' step='any' id='col-9-"+arr[i].id+"' class='frm-item' value='"+arr[i].revisao+"'><label class='txt-fr'>"+revisao+"</label></td><td class='col-11'><input type='number' step='any' id='col-10-"+arr[i].id+"' class='frm-item' value='"+arr[i].sinistro+"'><label class='txt-fr'>"+sinistro+"</label></td><td class='col-12'><input type='number' step='any' id='col-11-"+arr[i].id+"' class='frm-item' value='"+arr[i].mecanica+"'><label class='txt-fr'>"+mecanica+"</label></td><td class='col-13'><select id='col-12-"+arr[i].id+"' class='frm-item form_select'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><label>"+arr[i].staff+"</label></td><td class='col-14'><input type='number' step='any' id='col-13-"+arr[i].id+"' class='frm-item' value='"+arr[i].combustivel+"'><label class='txt-fr'>"+combustivel+"</label></td><td class='15'><input type='number' step='any' id='col-14-"+arr[i].id+"' class='frm-item' value='"+arr[i].portagem+"'><label class='txt-fr'>"+portagem+"</label></td><td class='16'><input type='number' step='any' id='col-15-"+arr[i].id+"' class='frm-item' value='"+arr[i].lavagem+"'><label class='txt-fr'>"+lavagem+"</label></td><td class='17'><input type='number' step='any' id='col-16-"+arr[i].id+"' class='frm-item' value='"+arr[i].parque+"'><label class='txt-fr'>"+parque+"</label></td><td class='18'><input type='number' step='any' id='col-17-"+arr[i].id+"' class='frm-item' value='"+arr[i].diversos+"'><label class='txt-fr'>"+diversos+"</label></td><td class='19'><input type='text' id='col-18-"+arr[i].id+"' class='frm-item' value='"+arr[i].descricao+"'><label>"+arr[i].descricao+"</label></td><td class='col-20'><a title='Validar despesa' class='vld-"+arr[i].id+" btn btn-warning' onclick='paymentCheck("+arr[i].id+")' style='margin-left: 7px;'><span class='glyphicon glyphicon-saved'></span></a><select id='col-20-"+arr[i].id+"' class='frm-item'><option value='"+arr[i].validado+"'>"+arr[i].validado+"</option><option value='Não'>Não</option><option value='Sim'> Sim</option></select><label class='txt-fr'>"+arr[i].validado+"</label></td><td class='21' id='action-"+arr[i].id+"'style='display:inline-flex'><button title='Apagar Despesa' class='btn btn-danger' onclick='confirmDeleteExpensies("+id+")'><span class='glyphicon glyphicon-trash'></span></button><button style='margin-left: 9px;' class='btn btn-info' title='Editar Despesa'onclick='showFrmExpensies("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span></button></td>").fadeIn().addClass('blink').removeClass('list-group-item-success');
 $("html, body").animate({scrollTop: $('#del_expensies_'+arr[0].id).offset().top-20}, 500);
$('#selo_tot ,#segur_tot, #inspeccao_tot, #revisao_tot, #sinistro_tot, #mecanica_tot, #combustivel_tot , #portagem_tot, #lavagem_tot, #parque_tot , #diversos_tot, #geral_tot,#dif_tot').empty();
arr[i].validado == 'Sim' ? $('.vld-'+arr[i].id).removeClass('btn-warning').addClass('btn-success') : $('.vld-'+arr[i].id).addClass('btn-warning').removeClass('btn-success');



  setTimeout(function(){
    $('tr').removeClass('blink');
  }, 5000);

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
 }, 150);

    },
    error:function(){
      $('#Modalko .debug-url').html('A despesa <b>'+id+'</b> não foi modificada, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}

function callTeamEditExpensies(){
$('.back').fadeIn();
setTimeout(function(){
    dataValue='action=5';
     $.ajax({ url:'expensies/action_expensies.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    $(".back").fadeOut();
    localStorage.setItem("team_operator", data);
    },
    error:function(data){
      $('.back').fadeOut();
      $('#Modalko .debug-url').html('Erro ao obter dados do staff, p.f. verifique a ligação.');
      $("#mensagem_ko").trigger('click');
    }
  });
}, 500);
}





function paymentCheck(id){
/*VALIDAR DESPESAS*/
vl = $('#col-20-'+id).val();
vl == 'Sim' ? vl='Não' : vl='Sim';
     dataValue="action=8&id="+id+"&vl="+vl;
     $.ajax({ url:'expensies/action_expensies.php',
     data:dataValue,
     type:'POST', 
     success:function(data){
     if (data==1){
      $('#col-20-'+id).val(vl).next().text(vl);
      vl == 'Sim' ? $('.vld-'+id).removeClass('btn-warning').addClass('btn-success'): $('.vld-'+id).removeClass('btn-success').addClass('btn-warning');
     }
    else {
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Validado com #'+id+'</strong> não foi efetuada, p.f. tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  },
     error:function(){
     $('#Modalko .debug-url').html('A validação para <strong>'+vl+'</strong> no campo <strong> Validado com #'+id+'</strong> não foi efetuada, p.f. verifique a ligação Wi-fi, e tente novamente.');
     $("#mensagem_ko").trigger('click');
    }
  });
}







