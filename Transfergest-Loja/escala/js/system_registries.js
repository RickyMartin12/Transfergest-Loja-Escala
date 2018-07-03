function transfersLinks(vl) {
	$('.back').fadeIn();
	switch(vl){

/*LINK 1 TRANSFERS NOVO SERVIÇO*/

		case 0:
			setTimeout(function(){
    			$.ajax({url: "registries/analytics.php",error:function(){		
        			$('.debug-url').html('Erro ao obter o Painel de Controlo, p.f. verifique a ligação Wi-Fi.');
        			$("#mensagem_ko").trigger('click');}
				})
				.done(function( html ) { $( "#insert" ).html(html); /*dailyTotalServicies();*/});
			}, 500);
			$('.back').fadeOut();	
		break;

		case 1:
			setTimeout(function(){
    			$.ajax({url: "registries/new_registry_form.php",error:function(){		
        			$('.debug-url').html('Erro ao obter o formulário de Novo Registo, p.f. verifique a ligação Wi-Fi.');
        			$("#mensagem_ko").trigger('click');}
				})
				.done(function( html ) { $( "#insert" ).html(html);});
			}, 500);
			$('.back').fadeOut();	
		break;

/*LINK 2 TRANSFERS PESQUISA POR ID/REFERENCIA DOS REGISTOS*/

		case 2:
			setTimeout(function(){
				$.ajax({url: "registries/call_registries_actions_byidref.php",error:function(){
       				$('.debug-url').html('Erro ao obter formulário para Pesquisa de Serviços por Id e Refº, p.f. verifique a ligação Wi-Fi.');
     				$("#mensagem_ko").trigger('click');}
				})
      			.done(function( html ) {$( "#insert" ).html(html);});
      		}, 500);
      		$('.back').fadeOut();
		break;

/*LINK 3 PESQUISA LISTAGEMS SERVIÇOS - DATATABLES*/

		case 3:
			setTimeout(function(){
      			$.ajax({url: "registries/call_datatables.php",error:function(){
        			$('.debug-url').html('Erro ao obter o formulário para Pesquisa/Listagens Servicos, p.f. verifique a ligação Wi-Fi.');
        			$("#mensagem_ko").trigger('click');}
				})
      			.done(function( html ) { $( "#insert" ).html(html)});
  			}, 500);
  		$('.back').fadeOut();
		break;

/*LINK 4 EDIÇAO SERVIÇOS SIMPLES */
		case 4:
			setTimeout(function(){
				$.ajax({url: "registries/call_registries_actions.php",error:function(){
        			$('.debug-url').html('Erro ao obter o formulário de Edição de Serviços Base, p.f. verifique a ligação Wi-Fi.');
        			$("#mensagem_ko").trigger('click');}
				})
      			.done(function( html ) { $( "#insert" ).html(html);});
  			}, 500);
  		$('.back').fadeOut();
		break;

/*LINK 5 EDIÇAO SERVIÇOS COMPLETA */

		case 5:
			setTimeout(function(){
      			$.ajax({url: "registries/call_registries_actions_complete.php",error:function(){
        			$('.debug-url').html('Erro ao obter o formulário de Edição de Serviços Completo, p.f. verifique a ligação Wi-Fi.');
        			$("#mensagem_ko").trigger('click');}
				})
				.done(function( html ) { $( "#insert" ).html(html);});
  			}, 500);
  		$('.back').fadeOut();
		break;
       }
}


function searchServiceId(vl){
  if (!vl){
    $('#Modalko .debug-url').html('O campo para pesquisa está vazio!');
    $("#mensagem_ko").trigger('click');
  }

  else{
    serv='';
    setTimeout(function(){
    $('.back').fadeIn();
      dataValue='action=7&id='+vl;
      $.ajax({ url:'registries/action_registries.php',
        data:dataValue,
        type:'POST',
        cache:false,
        success:function(data){
          $(".back").fadeOut();
          arr=[];
          arr =  JSON.parse(data);
          if (arr == null || arr.length < 1){
            $('#Modalko .debug-url').html('Não foram encontrados Registos, pf modifique a pesquisa!');
            $("#mensagem_ko").trigger('click');
            $('.show_reg').hide();
            $('.btn-print').addClass('disabled');
          }
          else {
            $('.btn-print').removeClass('disabled');
            $('.show_reg').show();
            for(i=0;i<arr.length;i++){
              data_out = moment(arr[i].data_servico*1000).format("DD/MM/YYYY");
              hora_out = moment(arr[i].hrs*1000).format("H:mm");
              arr[i].cobrar_direto ? cob_dir = parseFloat(arr[i].cobrar_direto).toFixed(2)+"€":cob_dir = '-/-';
              arr[i].cobrar_operador ? cob_ope = parseFloat(arr[i].cobrar_operador).toFixed(2)+"€":cob_ope = '-/-';
              fs = arr[i].matricula.substring(0, 2);
              md = arr[i].matricula.substring(2, 4);
              fn =arr[i].matricula.substring(4, 6);
              matr = fs+"-"+md+"-"+fn;
              serv += "<div class='cbc'></div><div class='row ficha' style='margin-top:0px;' id='del_registry_"+arr[i].id+"'><div class='servico'><h5 class='prt_header'><span class='glyphicon glyphicon-tags'></span> Serviço</h5><div class='bd myid col-md-1 col-sm-3 col-xs-6'><label>ID</label><br/><input style='cursor:not-allowed;' type='text' id='col-0-"+arr[i].id+"' class='frm-item form-control' readonly='true' value='"+arr[i].id+"'><font>"+arr[i].id+"</font></div><div class='bd myref col-md-2 col-sm-3 col-xs-6'><label>Ref</label><br/><input data-toggle='tooltip' data-placement='top' title='Ao alterar a Referência verifique se tem retorno, se sim tem que alterar ambas as Referências (valores iguais)!' type='text' id='col-1-"+arr[i].id+"' class='frm-item form-control'value='"+arr[i].referencia+"'><font>"+arr[i].referencia+"</font></div><div class='bd mydata col-md-2 col-sm-3 col-xs-6'><label>Data</label><br><input type='text' id='col-2-"+arr[i].id+"' class='datetimepicker_dt frm-item form-control' value='"+data_out+"'><font>"+data_out+"</font></div><div class='bd myhora col-md-1 col-sm-3 col-xs-6'><label>Hora</label><br/><input type='text' id='col-3-"+arr[i].id+"' class='datetimepicker_h frm-item form-control' value='"+hora_out+"'><font>"+hora_out+"</font></div><div class='bd mystaff col-md-2 col-sm-6 col-xs-6'><label>Staff</label><br><select id='col-4-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].staff+"'>"+arr[i].staff+"</option></select><font>&nbsp;"+arr[i].staff+"</font></div><div class='bd myservico col-md-2 col-sm-6 col-xs-6'><label>Servico</label><br><select id='col-5-"+arr[i].id+"' class='add_servico frm-item form-control'><option value='"+arr[i].servico+"'>"+arr[i].servico+"</option></select><font>&nbsp;"+arr[i].servico+"</font></div><div class='bd myestado col-md-1 col-sm-6 col-xs-6'><label>Estado</label><br><select id='col-6-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+arr[i].estado+"'>"+arr[i].estado+"</option> <option value='Aguarda'> Aguarda</option><option value='Aceite'> Aceite</option><option value='Cancelado'> Cancelado</option><option value='Rejeitado'> Rejeitado</option><option value='Iniciado'> Iniciado</option><option value='Fechado'> Fechado</option></select><font>&nbsp;"+arr[i].estado+"</font></div><div class='bd mymatricula col-md-1 col-sm-6 col-xs-6'><label>Matricula</label><br><select id='col-7-"+arr[i].id+"' class='add_estado frm-item form-control'><option value='"+matr+"'>"+matr+"</option></select><font class='txt_matr'>&nbsp;"+matr+"</font></div></div><div class='cliente'><h5 class='col-xs-12'><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-user'></span> Cliente </span></h5><div class='bd myvoo col-md-2 col-sm-6 col-xs-6'><label>Nº Voo</label><br><input type='text' id='col-8-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].voo+"'><font>&nbsp;"+arr[i].voo+"</font></div><div class='bd mynome col-md-2 col-sm-6 col-xs-6'><label>Nome</label><br><input type='text' id='col-9-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].nome_cl+"'><font>&nbsp;"+arr[i].nome_cl+"</font></div><div class='bd myemail col-md-2 col-sm-6 col-xs-6'><label>Email</label><br><input type='text' id='col-10-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].email+"'><font>&nbsp;"+arr[i].email+"</font></div><div class='bd mytel col-md-2 col-sm-6 col-xs-6'><label>Telefone</label><br><input type='text' id='col-11-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].telefone+"'><font>&nbsp;"+arr[i].telefone+"</font></div><div class='bd mypais col-md-2 col-sm-12 col-xs-12'><label>Pais</label><br><input type='text' id='col-12-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].pais+"'><font>&nbsp;"+arr[i].pais+"</font></div><div class='bd myrec col-md-2 col-sm-6 col-xs-12'><label>Recolha</label><br><input type='text' id='col-13-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_recolha+"'><font>&nbsp;"+arr[i].local_recolha+"</font></div><div class='bd myent col-md-2 col-sm-6 col-xs-12'><label>Entrega</label><br><input type='text' id='col-14-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].local_entrega+"'><font>&nbsp;"+arr[i].local_entrega+"</font></div><div class='bd myptref col-md-4 col-sm-12 col-xs-12'><label>P. Referência</label><br><input type='text' id='col-15-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ponto_referencia+"'><font>&nbsp;"+arr[i].ponto_referencia+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Adulto</label><br><input type='number' min='1' id='col-16-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].px+"'><font>&nbsp;"+arr[i].px+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Criança</label><br><input type='number' min='0' id='col-17-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cr+"'><font>&nbsp;"+arr[i].cr+"</font></div><div class='bd mypx col-md-2 col-sm-4 col-xs-4'><label>Bébé</label><br><input type='number' min='0' id='col-18-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].bebe+"'><font>&nbsp;"+arr[i].bebe+"</font></div><div class='bd myobs col-sm-12 col-xs-12'><label>Observações</label><br><input type='text' id='col-19-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].obs+"'><font>&nbsp;"+arr[i].obs+"</font></div></div><div class='operador col-xs-12 col-md-6'><h5 class=''><span class='label label-default' style='padding: 4px;'><span class='glyphicon glyphicon-tower'></span> Operador</span></h5><div class='bd col-sm-6 xs6 col-xs-6'><label>Operador</label><br><select id='col-20-"+arr[i].id+"' class='addstaff frm-item form-control'><option value='"+arr[i].operador+"'>"+arr[i].operador+"</option></select><font>&nbsp;"+arr[i].operador+"</font></div><div class='bd xs6 col-sm-6 col-xs-6'><label>Ticket</label><br><input type='text' id='col-21-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].ticket+"'><font>&nbsp;"+arr[i].ticket+"</font></div></div><div class='cobrancas col-md-6 col-xs-12'><h5 class=''><span class='label valor label-default' style='padding: 4px;'><span class='glyphicon glyphicon-eur'></span> Cobranças</span></h5><div class='bd col-sm-6 col-xs-6'><label>Cob.Operador</label><br><input type='number' min='0' step='any' id='col-22-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_operador+"'><font>"+cob_ope+"</font></div><div class='bd col-xs-6 col-sm-6'><label>Directo</label><br><input type='number' step='any' min='0' id='col-23-"+arr[i].id+"' class='frm-item form-control' value='"+arr[i].cobrar_direto+"'><font>"+cob_dir+"</font></div></div><div class='col-md-12 col-xs-12' style='margin-top:15px;' id='action-"+arr[i].id+"'><div class='btn-group btn-group no-print' style='float: right;' role='group'><button title='Apagar Registo' class='btn btn-danger btn-sm' onclick='confirmDeleteRegistries("+arr[i].id+")'><span class='glyphicon glyphicon-trash'></span></button><button class='btn btn-info btn-sm' title='Editar Registo' onclick='showFrmRegistry("+arr[i].id+")'><span class='glyphicon glyphicon-edit'></span</button></div></div></div><div class='ft'></div>";
            }
          $("#delete_team").html(serv);
          }
        },
        error:function(data){
          $('#Modalko .debug-url').html('Erro ao obter dados dos Registos, p.f. verifique a ligação Wi-Fi.');
          $("#mensagem_ko").trigger('click');
          $(".back").fadeOut();
        }
      });
    }, 500);
  }
}



