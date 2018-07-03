function escalasLinks(vl) {
	$('.back').fadeIn();
	switch(vl){

		case 1:
			setTimeout(function(){
                                $.ajax({url: "registries/call_validations.php",error:function(){
                                $('.debug-url').html('Erro ao obter o formulário de Validações, p.f. verifique a ligação Wi-Fi.');
                                $("#mensagem_ko").trigger('click');}
                                })
                               .done(function( html ) { $( "#insert" ).html(html);});
			}, 500);
			$('.back').fadeOut();	
		break;

       }
}

