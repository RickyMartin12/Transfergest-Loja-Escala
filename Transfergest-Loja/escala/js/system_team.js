function staffLink(vl){

$('.back').fadeIn();

switch(vl){

  case 1:
	setTimeout(function(){
                $.ajax({url: "team/new_team_form.php",error:function(){
                        $('.debug-url').html('Erro ao obter o formulário de Novo Staff, p.f. verifique a ligação Wi-Fi.');
                        $("#Modalko").modal();}
                })
                .done(function( html ) {$( "#insert" ).html(html);});
	}, 500);
	$('.back').fadeOut();
        break;

/*CRIAR NOVA CATEGORIA TABELA STAFF FIXO*/
  case 2:
	setTimeout(function(){
    		$.ajax({url: "team/call_staff_category.php",error:function(){		
        		$('.debug-url').html('Erro ao obter Nova Categoria de Staff, p.f. verifique a ligação Wi-Fi.');
        		$("#ModalKo").modal();}
		})
		.done(function( html ) { $( "#insert" ).html(html);});
	}, 500);
	$('.back').fadeOut();	
	break;

/*CRIAR NOVA TABELAS STAFF FIXO*/

  case 3:
	setTimeout(function(){
    		$.ajax({url: "team/call_staff_tables.php",error:function(){		
        		$('.debug-url').html('Erro ao obter as Categorias de Staff, p.f. verifique a ligação Wi-Fi.');
        		$("#Modalko").modal();}
		})
		.done(function( html ) { $( "#insert" ).html(html);});
	}, 500);
	$('.back').fadeOut();	
	break;

  case 4:
  setTimeout(function(){
    $.ajax({url: "team/call_team_payment.php",error:function(){
      $('.debug-url').html('Erro ao obter o formulário Vencimentos Staff, p.f. verifique a ligação Wi-Fi.');
      $("#Modalko").modal();}
    })
    .done(function( html ) {$( "#insert" ).html(html);});
  }, 500);
  $('.back').fadeOut(); 
  break;

  case 5:
    setTimeout(function(){
      $.ajax({url: "team/call_daily_staff.php",error:function(){
        $('.debug-url').html('Erro ao obter o formulário do Cobranças Staff, p.f. verifique a ligação Wi-Fi.');
        $("#Modalko").modal();}
      })
      .done(function( html ) {$( "#insert" ).html(html);});
    }, 500);
    $('.back').fadeOut(); 
    break;
  
  case 6:
  setTimeout(function(){
    $.ajax({url: "team/call_team_services.php",error:function(){
      $('.debug-url').html('Erro ao obter o formulário Cobranças Staff, p.f. verifique a ligação Wi-Fi.');
      $("#Modalko").modal();}
    })
    .done(function( html ) {$( "#insert" ).html(html);});
  }, 500);
  $('.back').fadeOut(); 
  break;

  case 7:
  setTimeout(function(){
    $.ajax({url: "team/call_team_services_and_expensies.php",error:function(){
      $('.debug-url').html('Erro ao obter o formulário Cobranças e Despesas de Staff, p.f. verifique a ligação Wi-Fi.');
      $("#Modalko").modal();}
    })
    .done(function( html ) {$( "#insert" ).html(html);});
  }, 500);
  $('.back').fadeOut(); 
  break;

}
}
