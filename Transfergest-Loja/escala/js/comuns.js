$(function() {

mob=0;

$('.nav-mob').click(function() {StopgetAnalitics();});

$('.to_top').click(function(){
$("html, body").animate({ scrollTop: $("#debug").scrollTop() }, 500);
});

    $('li a').click(function(e) {
        e.preventDefault();
        $('a').removeClass('active');
        $(this).addClass('active');
    });

    $('.nav-action').click(function() {
    if (mob==0){
        if ($('.nav-action').hasClass('is-open')){

           $(".nav-action").removeClass("is-open");
           $("#mySidenav").css("display","none");
           $(".main-container").css('marginLeft','0').addClass('w3-animate-right').removeClass('w3-animate-left');
        }
        else {
          $('.nav-action').addClass('is-open');
          $("#mySidenav").css("display","block");
          $('.main-container').css('marginLeft','205px').addClass('w3-animate-left').removeClass('w3-animate-right');
       }
    }

    else if (mob==1){

         $(".main-container").css('marginLeft','0');
         if ($('.nav-action').hasClass('is-open')){
           $(".nav-action").removeClass("is-open");
           $(".w3-sidenav").css("left","-200px");
         }
        else{
         $(".nav-action").addClass("is-open");  
        $(".w3-sidenav").css("left","0px");
        }
      }
    });

});



function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
   mob=1;
   $('.nav-action').trigger('click');
   $('.nav-mob').click(function() {
   $('.nav-action').trigger('click');
   });
  }
}

window.onscroll = function() {toTop()};
function toTop() {
document.body.scrollTop > 600 || document.documentElement.scrollTop > 600 ? $('.to_top').fadeIn() : $('.to_top').fadeOut();
}

z=0;
y=0;
w=0;
q=0;
fl=0;
gta='';

function myGtaTime() {
    gta = setTimeout(function(){ getAnalitics(); }, 5000);
}

function getAnalitics(){

     dataValue="action=16";
     $.ajax({ url:'registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     cache:false,
     success:function(data){
      x='';
       arr = JSON.parse(data);
       $('#totaltoday').attr('data-count' , arr[0]);
       $('#opentoday').attr('data-count' , arr[0]-arr[1]);
       $('#closedtoday').attr('data-count' , arr[1]);

       $('#pendingoperators').attr('data-count' , arr[2]);
       $('#canceledoperators').attr('data-count' , arr[3]);
       $('#fromshop').attr('data-count' , arr[4]);
       $('#nostafftoday').attr('data-count',arr[5]);

        if( fl > 1){
          if( y != arr[2] || z != arr[3] || w != arr[5] || q != arr[4]){
           alertSounds();
           y = arr[2]; z = arr[3]; w = arr[5]; q = arr[4];
          }
        }
       if (arr[4] > 0){ 
          q = arr[4];
          $('.sp').removeClass('border-dgray').addClass('border-red').attr('onClick','getEventsData(22)').css('cursor','pointer');
       }
       else{$('.sp').removeClass('border-red').addClass('border-dgray').removeAttr('onClick').css('cursor','default');}
       if (arr[5] > 0){ 
          w = arr[5];
          $('.ne').removeClass('border-dgray').addClass('border-red').attr('onClick','getEventsData(1)').css('cursor','pointer');
       }
       else{$('.ne').removeClass('border-red').addClass('border-dgray').removeAttr('onClick').css('cursor','default');}

       if (arr[2] > 0 ){
          y = arr[2]
          $('.de').removeClass('border-dgray').addClass('border-red').attr('onClick','getEventsData(17)').css('cursor','pointer');
       }
       else{$('.de').removeClass('border-red').addClass('border-dgray').removeAttr('onClick').css('cursor','default');}
       if (arr[3] > 0 ){
          z = arr[3];
          $('.ce').removeClass('border-dgray').addClass('border-red').attr('onClick','getEventsData(18)').css('cursor','pointer');
       }
      else{$('.ce').removeClass('border-red').addClass('border-dgray').removeAttr('onClick').css('cursor','default');}
      setTimeout(function(){ 
       $('.counter').each(function() {
         var $this = $(this),
         countTo = $this.attr('data-count');
         $({ countNum: $this.text()}).animate({
           countNum: countTo
         },
         {
          duration: 1500,
          easing:'linear',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });  
      });
     }, 500);

     },
error:function(){
    }
  });

fl++;

myGtaTime();

}


function StopgetAnalitics() {fl=0; clearTimeout(gta)};

function alertSounds() {
    var x = document.createElement("AUDIO"); 
    if (x.canPlayType("audio/mpeg")) {
        x.setAttribute("src","css/alert.mp3");
        x.play();
    } else {
        x.setAttribute("src","css/alert.ogg");
        x.play(); 
    }
}




function clearForm(){
$('#form_equipa input, #form_operator input, #form_registry input, #form_expense input').val('');
$('#opcol_52, #regcol_4, #veh_1, #veh_2, #admcol_1, #admcol_2, #admcol_3, #regcol_13').val('');
$('#regcol_2, #expcol_17, #expcol_2').val('A definir');
$('#regcol_18').val('A definir*/*A definir');
$('#regcol_17').val('Aguarda');
$('#admcol_4').val('0*/*Gestor');
}

function logOut(){
  window.open('logout.php','_self');
}


function goToPrint(ac){


frn = '';
dat = '';
pt = '';

switch (ac){
case 0:

bootbox.dialog({
  message:"Por favor, escolha tipo de impressão:<select style='margin:0 auto;width: 230px;'class='form-control' id='tipo'><option value='0'> Sem quebra de linha</option><option value='1'> Com quebra de linha</option><select>",
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

     $('#tipo').val()== '1'? $('.table-striped').removeClass('nowrap') : $('.table-striped').addClass('nowrap');
     removeNavBar();
     resultsPrint();
     detailsCompany();

    $('#real_time_container,.to_top, td.col-25, th.col-25, nav, .btn-success, .btn-warning, .btn-info').hide();
    for(i=0;i<26;i++){
    if ($('.table-responsive input#col_'+i).is(':checked')){
    $('td.col-'+i+',th.col-'+i).hide();
    }
     $('.color_print_'+i+',.table-responsive input#col_'+i).hide();
    }
  setTimeout(function(){window.print();}, 500);
  setTimeout(function(){
  addNavBar();
  normalizePrint();
  $('#real_time_container,.to_top, td.col-25, th.col-25, nav, .btn-success, .btn-warning, .btn-info').show();
  for(i=0;i<26;i++){
      $('.color_print_'+i+',td.col-'+i+',input#col_'+i+',td.col-'+i+',th.col-'+i).show();
    }
    searchData2();
    }, 750);

      }
    },
  }
});


  break;

case 1:

bootbox.dialog({
  message:"Por favor, escolha tipo de impressão:<select style='margin:0 auto;width: 230px;'class='form-control' id='tipo'><option value='0'> Sem quebra de linha</option><option value='1'> Com quebra de linha</option><select>",
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

    $('#tipo').val()== '1'? $('.table-striped').removeClass('nowrap') : $('.table-striped').addClass('nowrap');
    resultsPrintExpensies();
    removeNavBar();
    detailsCompany();
    $('#real_time_container,.to_top, th.col-21,td.col-21, .btn-success, .btn-warning, .btn-info').hide();
    for(i=0;i<21;i++){
    if ($('.table-responsive input#col_'+i).is(':checked')){
    $('td.col-'+i+',th.col-'+i).hide();
    }
    $('.color_print_'+i+',.table-responsive input#col_'+i).hide();
    }
  setTimeout(function(){window.print();}, 500);
  setTimeout(function(){
  normalizePrint();
  addNavBar();
  $('#real_time_container,.to_top, th.col-21,td.col-21, .btn-success, .btn-warning, .btn-info').show();
  for(i=0;i<22;i++){
      $('.color_print_'+i+',td.col-'+i+',input#col_'+i+',td.col-'+i+',th.col-'+i).show();
    }
    searchDataExpensies();
    }, 750);

      }
    },
  }
});


    break;

case 2:

bootbox.dialog({
  message:"Por favor, escolha tipo de impressão:<select style='margin:0 auto;width: 230px;'class='form-control' id='tipo'><option value='0'> Sem quebra de linha</option><option value='1'> Com quebra de linha</option><select>",
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

     $('#tipo').val()== '1'? $('.table-striped').removeClass('nowrap') : $('.table-striped').addClass('nowrap');
     resultsPrint();
     detailsCompany();

    $('#real_time_container,.to_top, th.col-23, td.col-23,.btn-success, .btn-warning, .btn-info').hide();
    for(i=0;i<23;i++){
    if ($('.table-responsive input#col_'+i).is(':checked')){
    $('td.col-'+i+',th.col-'+i).hide();
    }
    $('.color_print_'+i+',.table-responsive input#col_'+i).hide();
    }

   removeNavBar(); 

  setTimeout(function(){window.print();}, 500);
  setTimeout(function(){
  normalizePrint();
  addNavBar();
  $('#real_time_container,.to_top, th.col-23, td.col-23, .btn-success, .btn-warning, .btn-info').show();
  for(i=0;i<23;i++){
      $('.color_print_'+i+',td.col-'+i+',input#col_'+i+',td.col-'+i+',th.col-'+i).show();
    }
    searchData2();
    }, 750);

      }
    },
  }
});

    break;




case 3:

detailsCompanyTeam();
setTimeout(function(){
  removeNavBar();
  $('.visual').removeClass('desktop').addClass('mobile');
  $('body').css('paddingTop','0px');
  $('#real_time_container,.to_top, .no-print, .btn-success, .btn-warning, .cont-nav,.android').hide();
  $('th,td').addClass('head');  
  $('.signatures').show();
    }, 750);
  setTimeout(function(){window.print();}, 760);
  setTimeout(function(){
  $('th,td').removeClass('head');
  $('body').css('paddingTop','50px');
  $('.visual').removeClass('mobile').addClass('desktop');
  $('.company').empty();
  $('#real_time_container,.to_top, .no-print, .btn-success, .btn-warning, .cont-nav, .android').show();
  $('.signatures').hide();
  addNavBar();
  }, 1000);
    break;




case 4:

detailsCompanyTeam();
setTimeout(function(){
removeNavBar();

v='A gerência';

var $set = $('.ficha');
var len = $set.length;
$set.each(function(index) {
if(index == 1 || index == 3 || index == 5 || index == 7 || index == 9 || index == 11 || index == 13 || index == 15){
 $( this ).next().html("<div class='row' style='margin-top: 40px; margin-bottom:400px;'><div class='col-xs-7'></div><div class='col-xs-5' style='border-bottom:1px solid #000;'>"+v+"</div>");
 $('.signatures').hide();
}
if (index == len - 1) {
 $( this ).next().html("<div class='row' style='margin-top: 40px; margin-bottom:10px;'><div class='col-xs-7'></div><div class='col-xs-5' style='border-bottom:1px solid #000;'>"+v+"</div>");
}
});

  $('.visual').removeClass('desktop').addClass('mobile');
  $('body').css('paddingTop','0px');
  $('#real_time_container,.to_top, .no-print').hide();
  $('.txt_matr').css('font-size','8px');
  $('.myid').removeClass('col-md-1 col-sm-3 col-xs-6').addClass('col-xs-1');
  $('.myref').removeClass('col-md-2 col-sm-3 col-xs-6').addClass('col-xs-2');
  $('.mydata').removeClass('col-md-2 col-sm-3 col-xs-6').addClass('col-xs-2');
  $('.myhora').removeClass('col-md-1 col-sm-3 col-xs-6').addClass('col-xs-1');
  $('.mystaff').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-2');
  $('.myservico').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-2');
  $('.myestado').removeClass('col-md-1 col-sm-6 col-xs-6').addClass('col-xs-1');
  $('.mymatricula').removeClass('col-md-1 col-sm-6 col-xs-6').addClass('col-xs-1');
  $('.myvoo').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-2');
  $('.mynome').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-4'); 
  $('.myemail').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-3');
  $('.mytel').removeClass('col-md-2 col-sm-6 col-xs-6').addClass('col-xs-2');
  $('.mypais').removeClass('col-md-2 col-sm-12 col-xs-12').addClass('col-xs-1');
  $('.myrec, .myent').removeClass('col-md-2 col-sm-6 col-xs-12').addClass('col-xs-4');
  $('.myptref').removeClass('col-md-4 col-sm-12 col-xs-12').addClass('col-xs-4');
  $('.mypx').removeClass('col-md-2 col-sm-4 col-xs-4').addClass('col-xs-1');
  $('.myobs').removeClass('col-sm-12 col-xs-12').addClass('col-xs-9');
  $('.col-sm-12, .col-xs-12').css('padding','0');
  $('.prt_header').addClass('brd');
  $('.valor').html("<span class='glyphicon glyphicon-eur'></span> Total</span>");
  va = $('#id_name').val();
  $(".myvoucher").html("<span class='glyphicon glyphicon-list-alt'></span> Transfer: #"+va);
  $('.panel-body,.bd').css('padding','0px 10px 0px 10px');
  $('h5').css('margin','0');
  $('.operador,.cobrancas').removeClass('col-md-6 col-xs-12').addClass('col-xs-6');
  $('.label').css('padding','0px');
  }, 750);
  setTimeout(function(){window.print();}, 760);
  setTimeout(function(){

  $('.ft').empty();
  $('body').css('paddingTop','50px');
  $('.prt_header').removeClass('brd');
  $('.bd').css('padding','5px');
  $('h5').css('margin','10px 0px 10px 0px');
  $('.visual').removeClass('mobile').addClass('desktop');
  $('.company').empty();
  $('.label').css('padding','4px');
  $('.panel-body').css('padding','15px');
  $('.operador,.cobrancas').addClass('col-md-6 col-xs-12').removeClass('col-xs-6');
  $('.col-sm-12, .col-xs-12').css('padding','0px 15px 0px 15px');
  $('.myid').addClass('col-md-1 col-sm-3 col-xs-6').removeClass('col-xs-1');
  $('.myref').addClass('col-md-2 col-sm-3 col-xs-6').removeClass('col-xs-2');
  $('.mydata').addClass('col-md-2 col-sm-3 col-xs-6').removeClass('col-xs-2');
  $('.myhora').addClass('col-md-1 col-sm-3 col-xs-6').removeClass('col-xs-1');
  $('.mystaff').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-2');
  $('.myservico').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-2');
  $('.myestado').addClass('col-md-1 col-sm-6 col-xs-6').removeClass('col-xs-1');
  $('.mymatricula').addClass('col-md-1 col-sm-6 col-xs-6').removeClass('col-xs-1');
  $('.myvoo').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-2');
  $('.mynome').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-4'); 
  $('.myemail').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-3');
  $('.mytel').addClass('col-md-2 col-sm-6 col-xs-6').removeClass('col-xs-2');
  $('.mypais').addClass('col-md-2 col-sm-12 col-xs-12').removeClass('col-xs-1');
  $('.myrec, .myent').addClass('col-md-2 col-sm-6 col-xs-12').removeClass('col-xs-4');
  $('.myptref').addClass('col-md-4 col-sm-12 col-xs-12').removeClass('col-xs-4');
  $('.mypx').addClass('col-md-2 col-sm-4 col-xs-4').removeClass('col-xs-1');
  $('.myobs').addClass('col-sm-12 col-xs-12').removeClass('col-xs-9');
  $('.txt_matr').css('font-size','11px');
  $(".myvoucher").html("<span class='glyphicon glyphicon-list-alt'></span> Registos");
  $('.valor').html("<span class='glyphicon glyphicon-eur'></span> Cobrado</span>");
  $('#real_time_container,.to_top, .no-print').show();

   addNavBar();

  $('.signatures').hide();
    }, 1000);
    break;

case 5:

bootbox.dialog({
  message:"Por favor, escolha tipo de impressão:<select style='margin:0 auto;width: 230px;'class='form-control' id='tipo'><option value='0'> PVP + PO + PN </option><option value='1'> PVP </option><option value='2'> PO </option><option value='3'> PN </option></select>",
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

       switch ($('#tipo').val()){

         case '0': $('.po-price, .pvp-price, .pn-price').show(); break;
         
         case '1': $('.po-price, .pn-price').hide(); break;

         case '2': $('.pvp-price, .pn-price').hide(); break;

         case '3' : $('.po-price, .pvp-price').hide(); break;
       }

       resultsPrintExpensies();
        
       $('.panel-info').css('padding','2px');

       $('.panel-heading h3, .panel-heading span').show();
  
       arr = JSON.parse(localStorage.getItem("arrDefinitions"));
        if (arr == null || arr.length < 1)
          $('.logo_insert').prop('src','definitions/upload/noimg.jpg');
        else {

       $('.panel-default').addClass('col-xs-12');
  $('.company').addClass('col-xs-12','well').css('margin-bottom','10px').html("<div class='col-xs-6'><img style='margin:0 auto;'class='img-responsive logo_insert' src='definitions/"+arr[0].logo+"'/></div><div class='col-xs-6'><p class='mg5'><font>"+arr[0].nome+"</font><font> NIF:"+arr[0].nif+"</font><font> RNAVT:"+arr[0].ravt+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-map-marker'></span>: "+arr[0].morada+"</font><font> "+arr[0].cod_postal+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-earphone'></span>: "+arr[0].tel+"</font><font><span class='glyphicon glyphicon-phone'></span>: "+arr[0].tlm+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-envelope'></span>: "+arr[0].email+"</font><br><font><span class='glyphicon glyphicon-globe'></span>: "+arr[0].site+"</font></p></div>");
  }

   removeNavBar();

    $('#real_time_container,.to_top, .btn-success, .btn-warning, .btn-info, .print-hide').hide();
    $('.panel-info, .panel-default').css('padding','0px 0px');

  setTimeout(function(){window.print();}, 500);
  setTimeout(function(){
  normalizePrint();
 
  $('.oper-data').css('color','#333');
  $('.panel-info').css('padding','0px');



  addNavBar();
    $('#real_time_container,.to_top, .btn-success, .btn-warning, .btn-info, .print-hide, .pvp-price, .pn-price, .po-price').show();
    
    }, 750);

      }
    },
  }
});

    break;
}
}


var resultsPrintExpensies = function (){
 $('.panel').removeClass('panel-info');
 $('.visual').removeClass('desktop').addClass('mobile');
 $('.cont-nav, .header-info,.android').hide();
 $('#delete_team label').css('font-size','14px');
 $('.nosearchprint, .search_results, .panel-heading h3, .panel-heading hr, .panel-heading span').hide();
 $('body').css('paddingTop','0');
 $('.col-11, .col-12, .col-13').css('width','50px');
dt ='';
dts='';
matr='';
nome='';

$('#staff_name').val() ? nome="<font> Staff: "+$('#staff_name').val()+"</font>&nbsp;" : nome='';
$('#matricula_name').val() !='Escolha' && $('#matricula_date').val() == '1' ? matr="<font> Matricula: "+$('#matricula_name').val()+"</font>&nbsp;" :matr='';
 $('#day_date').val() && $('#in_date').val() == '1' ? dt = "<font> Data: "+$('#day_date').val()+"</font>&nbsp;" :dt='';
 $('#date_ini').val() && $('#date_fim').val() && $('#between_date').val() == '1' ? dts = "<font> Datas: "+$('#date_ini').val()+" a "+$('#date_fim').val()+"</font>&nbsp;" :dts=''; 

 $('.searchprint').html("<p style='text-decoration: underline'>"+nome+""+matr+""+dt+""+dts+"</p>");

 $('.table-responsive').css('overflow-x','initial'); 
}

var resultsPrint = function (){
 $('.panel').removeClass('panel-info');
 $('.visual').removeClass('desktop').addClass('mobile');
 $('.cont-nav, .header-info,.android').hide();
 $('#delete_team label').css('font-size','14px');
 $('.nosearchprint, .search_results, .panel-heading h3, .panel-heading hr, .panel-heading span').hide();
 $('body').css('paddingTop','0');
 $('.col-11, .col-12, .col-13').css('width','50px');

 fr = $('#paymentfiltersuppliers').val();
 fr == '1' ? frn ="<font>Staff: "+$('#staff_name').val()+"</font>&nbsp;" : false;
 fr == '2' ? frn ="<font>Fornecedor: "+$('#operator_name').val()+"</font>&nbsp;" : false;
 dt = $('#paymentfilterdates').val();
 dt == '1' ?  dat = "<font> Data: "+$('#day_date').val()+"</font>&nbsp;" :false;
 dt == '2' ?  dat = "<font> Datas: "+$('#date_ini').val()+" a "+$('#date_fim').val()+"</font>&nbsp;" : false;
 vl = $('#paymentfiltertype').val();
 vl != '0' ? pt ="<font>Pagamentos: "+$('#paymentfiltertype option[value='+vl+']').text()+"</font>&nbsp;" : false;
 $('.searchprint').html("<p style='text-decoration: underline'>"+frn+""+dat+""+pt+"</p>");
 $('.table-responsive').css('overflow-x','initial'); 
}



var detailsCompany = function (){
 arr = JSON.parse(localStorage.getItem("arrDefinitions"));
 if (arr == null || arr.length < 1)
  $('.logo_insert').prop('src','definitions/upload/noimg.jpg');
 else {
  $('.panel-info').addClass('col-xs-4');
  $('.company').addClass('col-xs-8','well').html("<div class='col-xs-6'><img style='margin:0 auto;'class='img-responsive logo_insert' src='definitions/"+arr[0].logo+"'/></div><div class='col-xs-6'><p class='mg5'><font>"+arr[0].nome+"</font><font> NIF:"+arr[0].nif+"</font><font> RNAVT:"+arr[0].ravt+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-map-marker'></span>: "+arr[0].morada+"</font><font> "+arr[0].cod_postal+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-earphone'></span>: "+arr[0].tel+"</font><font><span class='glyphicon glyphicon-phone'></span>: "+arr[0].tlm+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-envelope'></span>: "+arr[0].email+"</font><br><font><span class='glyphicon glyphicon-globe'></span>: "+arr[0].site+"</font></p></div>");
  }
}


var normalizePrint = function (){
$('.table-striped').addClass('nowrap');
$('.panel').addClass('panel-info');
$('.visual').removeClass('mobile').addClass('desktop');
$('.cont-nav, .header-info, .android').show();
  $('#delete_team label').css('font-size','12px');
  $('.nosearchprint, .search_results, .panel-heading h3, .panel-heading hr, .panel-heading span').show();
  $('.searchprint').empty();
  $('body').css('paddingTop','50px');
  $('.panel-info').removeClass('col-xs-4');
  $('.company').removeClass('col-xs-8').empty();
  $('.table-responsive').css('overflow-x','auto');
}




var detailsCompanyTeam = function (){
 arr = JSON.parse(localStorage.getItem("arrDefinitions"));
 if (arr == null || arr.length < 1)
  $('.logo_insert').prop('src','definitions/upload/noimg.jpg');
 else {
  $('.company').addClass('row').html("<div class='col-xs-6'><img style='margin:0 auto; max-height:100px;'class='img-responsive logo_insert' src='definitions/"+arr[0].logo+"'/></div><div class='col-xs-6'><p class='mg5'><font>"+arr[0].nome+"</font><font> NIF:"+arr[0].nif+"</font><font> RNAVT:"+arr[0].ravt+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-map-marker'></span>: "+arr[0].morada+"</font><font> "+arr[0].cod_postal+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-earphone'></span>: "+arr[0].tel+"</font><font> <span class='glyphicon glyphicon-phone'></span>: "+arr[0].tlm+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-envelope'></span>: "+arr[0].email+"</font><br><font><span class='glyphicon glyphicon-globe'></span>:  "+arr[0].site+"</font></p></div>");
  }
}



var detailsCompany = function (){
 arr = JSON.parse(localStorage.getItem("arrDefinitions"));
 if (arr == null || arr.length < 1)
  $('.logo_insert').prop('src','definitions/upload/noimg.jpg');
 else {
  $('.company').addClass('col-xs-12','well').html("<div class='col-xs-6'><img style='margin:0 auto;'class='img-responsive logo_insert' src='definitions/"+arr[0].logo+"'/></div><div class='col-xs-6'><p class='mg5'><font>"+arr[0].nome+"</font><font> NIF:"+arr[0].nif+"</font><font> RNAVT:"+arr[0].ravt+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-map-marker'></span>: "+arr[0].morada+"</font><font> "+arr[0].cod_postal+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-earphone'></span>: "+arr[0].tel+"</font><font> <span class='glyphicon glyphicon-phone'>: "+arr[0].tlm+"</font></p><p class='mg5'><font><span class='glyphicon glyphicon-envelope'></span>: "+arr[0].email+"</font><br><font><span class='glyphicon glyphicon-envelope'></span>: "+arr[0].site+"</font></p></div>");
  }
}



removeNavBar = function (){
$('#myNavbarSmall').hide();
$('.nav-action').trigger('click');
}


addNavBar = function() {
$('#myNavbarSmall').show();
$('.nav-action').trigger('click');
}








