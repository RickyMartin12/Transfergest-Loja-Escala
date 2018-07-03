function operadorLink(vl){

$('.back').fadeIn();

switch(vl){
  case 1:
	setTimeout(function(){
               $.ajax({url: "operator/new_operator_form.php",error:function(){
                 $('.debug-url').html('Erro ao obter o formulário de operadores, p.f. verifique a ligação Wi-Fi.');
                 $("#mensagem_ko").trigger('click');}
               })
               .done(function( html ) {$( "#insert").html(html);});
	}, 500);
        break;

  case 2:
	setTimeout(function(){
              $.ajax({url: "operator/new_operator_locations_form.php",error:function(){
                $('.debug-url').html('Erro ao obter o formulário de novo local de operadores, p.f. verifique a ligação Wi-Fi.');
                $("#mensagem_ko").trigger('click');}
              })
              .done(function( html ) { $( "#insert" ).html(html);});
	}, 500);
	break;

/*CRIAR NOVA TABELAS STAFF FIXO*/

  case 3:
	setTimeout(function(){
          $.ajax({url: "operator/call_tables_operators.php",error:function(){
           $('.debug-url').html('Erro ao obter a tabela de produtos dos operadores, p.f. verifique a ligação Wi-Fi.');
           $("#mensagem_ko").trigger('click');}
          })
          .done(function( html ) {$( "#insert").html(html);});
	}, 500);
	$('.back').fadeOut();	
	break;

 case 4:
	setTimeout(function(){
          $.ajax({url: "operator/call_operators_payment.php",error:function(){
           $('.debug-url').html('Erro ao obter pagamentos dos operadores, p.f. verifique a ligação Wi-Fi.');
           $("#mensagem_ko").trigger('click');}
          })
          .done(function( html ) {$( "#insert").html(html);});
	}, 500);
	$('.back').fadeOut();	
	break;

 case 5:
	setTimeout(function(){
          $.ajax({url: "operator/call_operators_cmx.php",error:function(){
           $('.debug-url').html('Erro ao obter comissões dos operadores, p.f. verifique a ligação Wi-Fi.');
           $("#mensagem_ko").trigger('click');}
          })
          .done(function( html ) {$( "#insert").html(html);});
	}, 500);
	$('.back').fadeOut();	
	break;

   }
}








