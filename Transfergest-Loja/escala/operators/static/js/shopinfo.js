
/*OBTEM DEFINIÇÕES DA LOJA CLIENTE*/
function shopDefinitions(){
  dataValue='action=3';
  $.ajax({ url:'../definitions/action_definitions.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("shopDef", data);
    getLocais();

    setTimeout(function(){ move(); }, 500);
    },
    error:function(){}
});
}

/*OBTEM LOCAIS E VALOR ZONA INICIO*/
function getLocais(){
dataValue='&action=13';
  $.ajax({ url:'../management/action.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("locais", data);
     frequentPlaces();
      },
     error:function(){}
    });
}

/*OBTEM LOCAIS FREQUENTES*/
function frequentPlaces(){
dataValue='&action=19';
  $.ajax({ url:'../registries/action_registries.php',
    data:dataValue,
    type:'POST', 
    success: function(data){
     localStorage.setItem("frequent_places", data);
      },
     error:function(){}
    });
}



/*CLIENTES FREQUENTES*/
function getClientsOperators(id){
dataValue='action=26&id_operador='+id;
  $.ajax({ url:'../registries/action_registries_operators.php',
    data:dataValue,
    type:'POST', 
    success:function(data){
    localStorage.setItem("clients_operators", data);
    },
    error:function(){}
});
}


fl=0;

function getCurrentServicies(vl){
     dataValue="action=21&op="+vl;
     $.ajax({ url:'../registries/action_registries.php',
     data:dataValue,
     type:'POST', 
     cache:false,
     success:function(data){
       arr = JSON.parse(data);
       $('#totaltoday').attr('data-count' , arr[0]);    
       $('#pendingoperators').attr('data-count' , arr[1]);

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
}