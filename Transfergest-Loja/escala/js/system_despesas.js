/* OPÇÕES NAVEGAÇÃO */

function callNewVehExpense(template){
  $('.back').fadeIn();
  switch (template){

/*LANCAR NOVA VIATURA*/
    case 0:
      $.ajax({url: "vehicule/new_vehicule_form.php"})
      .done(function( html ) { $( "#insert" ).html(html); callVehicule();});
    break;


/* MANUTENCAO */
    case 1:
      $.ajax({url: "vehicule/manutencao_form.php"})
      .done(function( html ) { $( "#add_type" ).html(html); $("#add_type_edit").empty();});
    break;

/* ESCOLHA DE TIPO DE DESPESA */
    case 2:
      $.ajax({url: "vehicule/new_management_form.php"})
      .done(function( html ) { $( "#insert" ).html(html); callNewVehExpense(5);});
    break;

/* MANUTENCAO */
   case 3:
     $.ajax({url: "vehicule/fixo_form.php"})
     .done(function( html ) { $( "#add_type" ).html(html); $("#add_type_edit").empty();});
   break;

/* FIXA */
   case 4:
    $.ajax({url: "vehicule/fixo_form.php",error:function(){
     $('.debug-url').html('Erro ao obter o formulário das viaturas, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');}
    })
   .done(function( html ) {$( "#add_type" ).html(html);});
   break;

/*DIARIA*/
   case 5:
     $.ajax({url: "vehicule/diaria_form.php"})
    .done(function( html ) {  $( "#add_type" ).html(html); $("#add_type_edit").empty();}); 
   break;

/*GESTAO 1*/
   case 6:
      $.ajax({url: "vehicule/report_general_viatures.php"})
     .done(function( html ) { $( "#insert" ).html(html);});  
   break;


/*VER TOTAL DESPESAS*/
   case 8:
      $.ajax({url: "expensies/call_datatables_expensies.php"})
      .done(function( html ) { $( "#insert" ).html(html);});
   break;


/*VER RELATORIO VELHO DESPESAS*/
   case 9:
      $.ajax({url: "/expensies/call_expensies_actions.php"})
      .done(function( html ) { $( "#insert" ).html(html); callTeamEditExpensies();});
   break;
 }

$('.back').fadeOut();



}


function callReportViatures(){
      $.ajax({url: "vehicule/call_report_viatures_actions.php",error:function(){
$('.debug-url').html('Erro ao obter as viaturas, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $('.back').fadeOut(); $( "#insert-action" ).html(html); });
}

