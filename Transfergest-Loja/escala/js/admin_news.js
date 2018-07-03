/*OBTEM A ULTIMA NOTICIA PRIMEIRO */
function callAdminNews(){
setTimeout(function(){
    dataValue='action=1';
     $.ajax({ url:'admin/action_news.php',
    data:dataValue,
    type:'POST',
    cache:false,
    success:function(data){
      $(".back").fadeOut();
      $('#waiting').addClass("hidden");
      news='';
      arr=[];
      arr =  JSON.parse(data);
      if (arr == null || arr.length < 1){
        $("#latestnews").html("<h5 ><marquee scrollamount='2' behavior='scroll' direction='left' onmouseover='this.stop()' onmouseout='this.start()'>Não existem noticias/novidades.<br/></marquee></h5>");
      }
      else {
        for(i=0;i<arr.length;i++){
          id = arr[i].id;
          news += arr[i].noticias;
         }

     $("#latestnews").html("<h5><marquee scrollamount='2' behavior='scroll' direction='left' onmouseover='this.stop()' onmouseout='this.start()'>"+news+"</marquee></h5>");
      }
    },
    error:function(data){
      $(".back").fadeOut();
      $('#waiting').addClass("hidden");
      $('.debug-url').html('Erro ao obter as noticias/novidades do sistema, p.f. verifique a ligação Wi-Fi.');
      $("#mensagem_ko").trigger('click');
    }
  });
}, 500);
}


function seeMore(txt){
$('#information-modal').trigger('click');
$('#assunto').val(txt);
$('#dominio').val($('#domains').val());
}


$(function(){
$('#informations-news').on('submit',function(e){
e.preventDefault();
dataValue=$(this).serialize()+'&action=2';
$.ajax({ url:'admin/action_news.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
    if(data == 11){
        $('#close-inf-modal').trigger('click'); 
        $('#email, #nome, #obs').val('');
        $('.debug-url').html('O pedido de informações foi submetido com sucesso.<br>Brevemente entraremos em contato, obrigado.');
        $("#mensagem_ok").trigger('click');
      }
    else{
        $('#close-inf-modal').trigger('click');
        $('.debug-url').html('Lamentamos mas o nosso servidor não está a responder, p.f. tente novamente mais tarde.<br>Lamentamos o sucedido');
        $("#mensagem_ko").trigger('click');
      }    
},
    error: function(){
      $('#close-inf-modal').trigger('click');
      $('.debug-url').html('Para submeter o pedido de informações, p.f. verifique a sua ligação Wi-Fi/internet.');
      $("#mensagem_ko").trigger('click');
    }
  });
});
});


