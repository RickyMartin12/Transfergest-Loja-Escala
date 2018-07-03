response=1;
loginit='O programa foi carregado com sucesso';
f=10;
function loaderInit(r){
switch(r){
 case 1:
  $('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getDefinitionsInit();}, 250);break;
 case 2:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getOperadoresInit();}, 250);break;
 case 3:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getStaffInit();}, 250);break;
 case 4:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getMatriculaInit();}, 250);break;
 case 5:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getServicesType();}, 250);break;
 case 6:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getZonasCmxInit();}, 250);break;
 case 7:
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){getLocais();}, 250);break;
 case 8: 
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){prodsCategories();}, 250);break;
 case 9: 
$('.percentagem').text(' '+parseFloat(f*r)+'%').css('width',parseFloat(f*r)+'%');
  setTimeout(function(){frequentPlaces();}, 250);break;
case 10:
//$('.percentagem').text(' '+parseFloat(x*r)+'%').css('width',parseFloat(x*r)+'%');
 setTimeout(function(){getClients();}, 250);break;
case 11:
$('.percentagem').text('100%').css('width','100%');
 setTimeout(function(){
$('.percentagem').removeClass('w3-red').addClass('w3-green').html('<i class="fa fa-check"></i><span class="w3-hide-small"> Submeter</span>')
$('.w3-button').attr('disabled',false)}, 250); break;
 }
}





/*OBTEM DEFINICOES SISTEMA INICIO*/
function getDefinitionsInit(){
    dataValue='action=3';
     $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
      localStorage.setItem("arrDefinitions", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $('.w3-input').attr('readonly',false);       
        $('.logo_insert').prop('src','css/logo-ini.png');
       response = 2;
       loginit = "<br> - Não existem dados de Definições"; 
       loaderInit(response);
      }
      else{
       $('.w3-input').attr('readonly',false);
       $('.logo_insert').prop('src','definitions/'+arr[0].logo);
       $('.nome_txt').text(arr[0].nome);
       $('.morada_txt').text(arr[0].morada);
       response = 2;
       loaderInit(response);
      }
     },
     error:function(){
     response = 1;
     $('.debug-url').html("Nao foi possivel aceder à internet, p.f. verifique a ligação! (#R1)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;
     }
  });
}

/*OBTEM TIPO, ID, NOME OPERADORES INICIO*/
function getOperadoresInit(){
dataValue='&action=5';
  $.ajax({ url:'operator/action_operator.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
      localStorage.setItem("operadores", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
       response = 3;
       loginit += "<br> - Não existem dados de Operadores."; 
       loaderInit(response);
      }
      else {
       response = 3;
       loaderInit(response);
      }
     },
     error:function(){
     response = 2;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R2)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;
    }
 });
}

/*OBTEM NOMES, DO STAFF INICIO*/
function getStaffInit(){
    dataValue='action=14';
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("staff", data);
    arr=[];
      arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){
       response = 4;
       loginit += "<br> - Não existem dados de Staff"; 
       loaderInit(response);
     }
     else{
       response = 4;
       loaderInit(response);
      }
      },
    error:function(){
     response = 3;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R3)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
    $("#Modalko").modal();
     return;}
    });
}

/*OBTER MATRICULAS INICIO*/
function getMatriculaInit(){
    dataValue='action=15';
    $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("matricula", data);
     arr=[];
      arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){
       response = 5;
       loginit += "<br> - Não existem dados de Viaturas "; 
       loaderInit(response);
     }
      else{
       response = 5;
       loaderInit(response);}
      },
     error:function(){
     response = 4;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R4)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;
     }
    });
}


/*OBTER TIPOS DE SERVICOS INICIO*/
function getServicesType(){
dataValue='&action=5';
  $.ajax({ url:'definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("servicestype", data);
    arr=[];
      arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){
       response = 6;
       loginit += "<br> - Não existem dados de Serviços "; 
       loaderInit(response);
     }
      else{
       response = 6;
       loaderInit(response);}
      },
    error:function(){
     response = 5;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R5)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}

/*OBTEM NOME ZONA, E VALOR ZONA INICIO*/
function getZonasCmxInit(){
dataValue='&action=17';
  $.ajax({ url:'team/action_team.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("zona_cmx", data);
    arr=[];
      arr =  JSON.parse(data);
     if (arr == null || arr.length < 1){
       response = 7;
       loginit += "<br> - Não existem dados nas Zonas de Comissão "; 
       loaderInit(response);
       }
      else {
       response = 7;
       loaderInit(response);}
      },
    error:function(){
     response = 6;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R6)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}

/*OBTEM LOCAIS E VALOR ZONA INICIO*/
function getLocais(){
dataValue='&action=13';
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("locais", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1) {
       response = 8;
       loginit += "<br> - Não existem dados de Locais"; 
       loaderInit(response);
      }
      else {
       response = 8;
       loaderInit(response);
      }
      },
     error:function(){
     response = 7;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R7)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}



/*OBTEM LOCAIS E VALOR ZONA INICIO*/
function prodsCategories(){
dataValue='&action=23';
  $.ajax({ url:'management/action.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("prods_category", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1) {
       response = 9;
       loginit += "<br> - Não existem dados de Locais"; 
       loaderInit(response);
      }
      else {
       response = 9;
       loaderInit(response);
      }
      },
     error:function(){
     response = 8;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R8)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}


/*OBTEM LOCAIS FREQUENTES*/
function frequentPlaces(){
dataValue='&action=19';
  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("frequent_places", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1) {
       response = 10;
       loginit += "<br> - Não existem dados de Locais Frequentes"; 
       loaderInit(response);
      }
      else {
       response = 10;
       loaderInit(response);
      }
      },
     error:function(){
     response = 9;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R9)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}


/*CLIENTES FREQUENTES*/
function getClients(){
dataValue='&action=26';
  $.ajax({ url:'registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("clients", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1) {
       response = 11;
       loaderInit(response);
      }
      else {
       response = 11;
       loaderInit(response);
      }
      },
     error:function(){
     response = 10;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R10)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}




/*CLIENTES FREQUENTES*/
function getClientsOperators(){
dataValue='&action=26';
  $.ajax({ url:'registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("clients_operators", data);
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1) {
       response = 12;
       loaderInit(response);
      }
      else {
       response = 12;
       loaderInit(response);
      }
      },
     error:function(){
     response = 11;
     $('.debug-url').html("Não foi possivel aceder à internet, p.f. verifique a ligação! (#R10)<p style='text-align:center;'><button type='button' onclick='loaderInit(response)'class='btn btn-primary'><span class='glyphicon glyphicon-refresh'></span> Recarregar</button></p>");
     $("#Modalko").modal();
     return;}
    });
}


$(".form-signin").on("submit", function(e) {
    $('.back').show()

    datav=$(this).serialize()
    e.preventDefault()
    datav=$(this).serialize()
    $.ajax({
        type: "POST",
        url: "login/action_login.php",
        data: datav,
        cache: false,
        success: function(data) {
          $('.back').fadeOut()
          obj = JSON.parse(data)
          if (obj.error){
            $('#showerrors .header').addClass('w3-amber').removeClass('w3-green w3-red')
            $('#showerrors').css('display','block')
            $('.messagehead').text('Por favor, verifique:')
            $('.messagetxt').html(obj.error)
          }
          else if (obj.success){
            $('#showerrors .header').addClass('w3-green').removeClass('w3-red w3-amber')
            $('#showerrors').css('display','block')
            $('.messagehead').text('Sucesso') 
            $('.messagetxt').html('Bem vindo '+$('#utilizador').val()+', a redireccionar ...')
            setTimeout(function(){
              location.href = obj.success;
            }, 1500);
          }
        },
        error: function() {
           $('.back').fadeOut()
           $('#showerrors .header').addClass('w3-red').removeClass('w3-green w3-amber')
           $('#showerrors').css('display','block')
           $('.messagehead').text('Aviso')
           $('.messagetxt').html('Verifique a ligação, e tente novamente!')
        }
    })
})


function showLoaderResult(){
$('#loader').fadeOut(750);
$('.log').fadeIn(1250);
$('.complete_in').addClass('isupdate').text('Sistema actualizado a reiniciar.');
$('.complete').fadeIn().text('Sistema Carregado com Sucesso.');
setTimeout(function(){ $('.complete_in').hide();}, 4000);
setTimeout(function(){ if ($('.col-xs-8').hasClass('isupdate'))
window.location.assign("index.php");}, 2000);
} 

