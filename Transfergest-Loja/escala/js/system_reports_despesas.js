function callReportDespesasActions(){
$('#insert-action').empty();
      $.ajax({url: "expensies/report_general_despesas_all.php",error:function(){
       $('.debug-url').html('Erro ao obter os dados das despesas, p.f. verifique a ligação Wi-Fi.');
     $("#mensagem_ko").trigger('click');}

})
      .done(function( html ) {$('#insert-action').empty(); $( "#insert" ).html(html);callReportDespesas();});
}



function callReportDespesas(){
      $.ajax({url: "expensies/call_report_despesas_actions.php",error:function(){
$('.debug-url').html('Erro ao obter as viaturas, p.f. verifique a ligação.');
     $("#mensagem_ko").trigger('click');
$('.back').fadeOut();}

})
      .done(function( html ) { $('.back').fadeOut(); $( "#insert-action" ).html(html); });
}


