<?php
session_start();
if($_SESSION['name']){
?>

<!DOCTYPE html>
<html>
<head>
    <title>Escala Horizontal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="font/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-multiselect.css" type="text/css">
    <link type="text/css" rel="stylesheet" href="demo.css"/>
</head>
<body>
    <div class="back">
        <div class="load"></div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-sm-12 col-lg-12 col-xs-12 w3-padding-4">
             <button class="btn btn-primary" title="Atualizar Serviços (obter serviços)" onclick="callServices()">
               <i class="fa fa-tags"></i><span class="hidden-xs"> Serviços</span>
             </button>
             <div class="btn-group">
              <button title="Inicio Data tabela" class="btn-default btn" onclick="javascript:dp.scrollTo(dp.startDate.addDays(-1),  'true', 'right');">
              <i class="fa fa-backward"></i><span class="hidden-xs"> Inicio</span></button>
              <a title="Inicio Data atual" class="btn-default btn" href="javascript:dp.scrollTo(new DayPilot.Date(), 'true', 'left');">
              <i class="fa fa-play"></i><span class="hidden-xs"> Agora</span></a>
              <a title="Fim Data tabela" class="btn-default btn" href="javascript:dp.scrollTo(dp.startDate.addDays($('#days').val()), 'true', 'right');">
              <i class="fa fa-forward"></i> <span class="hidden-xs">Fim</span></a>
             </div>
            <button style="float:right;"class="btn btn-default" title="Esconder definições" id="def-btn">
              <i class="fa fa-chevron-up"></i><span class="hidden-xs"></span>
            </button>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <div class="row">
            <div class="col-lg-3 col-sm-4 col-xs-12 w3-padding-8">
                <div class="input-group">
                    <span class="input-group-addon" title="Comprimento das células das horas da tabela">
                    <i class="fa fa-arrows-h"></i>
                    <span class="hidden-xs"></span><span id="label"> 30</span>
                    </span>
                    <input type="range" class="form-control input-range" min="15" max="80" step="5" id="cellwidth" value="30" />
                </div>
            </div>

            <div class="col-lg-3 col-sm-4 col-xs-12 w3-padding-8">
                <div class="input-group">
                    <span class="input-group-addon" title="Altura das linhas do Staff">
                    <i class="fa fa-arrows-v"></i>
                    <span class="hidden-xs"></span><span id="labelh"> 35</span>
                    </span>
                    <input type="range" class="form-control input-range" min="20" max="200" step="10" id="cellheight" value="35" />
                </div>
            </div>

            <div class="col-lg-3 col-sm-4 col-xs-12 w3-padding-8">
                <div class="input-group">
                    <span class="input-group-addon" title="Dias a apresentar na escala">
                    <i class="fa fa-sun-o"></i>
                    <span class="hidden-xs"></span><span id="labeldays"> 2</span>
                    </span>
                    <input type="range" class="form-control input-range" min="1" max="8" step="1" id="days" value="2" />
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-4 w3-col s12 m4 w3-padding-8">
                <div class="input-group">
                    <select class="form-control my-group" id="area">
                        <option title="Transferir apenas parte visivel da tabela, formato jpeg" value="viewport">Parcial</option>
                        <option title="Transferir toda a tabela, formato jpeg" value="full">100%</option>
                        <option title="Transferir tabela" value="pdf">PDF</option>
                    </select>
                    <span class="input-group-btn">
                        <button class="btn btn-default" title="Imprimir escala" id="download-button">
                            <i class="fa fa-print"></i>
                            <span class="hidden-xs"></span>
                        </button>
                    </span>
                </div>
             </div>
            <div class="col-lg-5 col-md-9 col-sm-8 w3-col s12 m8 w3-padding-8">      
                <div class="input-group">
                    <div class="btn-group">
                      <button class="btn btn-default btnstaffvisible" title="Remover/esconder barra lateral do Staff" onclick="hideStaff()">
                        <i class="fa fa-eye-slash"></i><span class="hidden-xs"> Esconder</span>
                       </button>
                            <button title="Mostrar todo Staff" class="btn btn-default" id="clear" title="Mostrar todos elementos Staff">
                                <i class="fa fa-user"></i><span class="hidden-xs"> Limpar</span>
                            </button>
                            <button title="Esconder Staff seleccionado" class="showsomestaff btn btn-warning" style="border-radius: 0px; margin-right: -1px;">
                                <i class="fa fa-user"></i><span class="hidden-xs"> Ok</span>
                            </button>
                            <select id="filter" class="multisel form-control" multiple="multiple"></select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dp"></div>
    <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="bootstrap-3.3.2.min.js"></script>
    <script type="text/javascript" src="bootstrap-multiselect.js"></script>
    <script src="jspdf.min.js"></script>
    <script src="daypilot-all.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    var dp = new DayPilot.Scheduler("dp");

arr= JSON.parse(localStorage.getItem("staff"));

staff = [];

color = ['w3-pale-red','w3-aqua','w3-black','w3-blue','w3-dark-grey','w3-deep-purple','w3-grey','w3-light-grey','w3-brown','w3-deep-orange','w3-orange','w3-amber','w3-yellow','w3-khaki','w3-sand','w3-lime','w3-light-green','w3-green','w3-teal','w3-cyan','w3-light-blue','w3-indigo','w3-pale-blue','w3-pink','w3-pale-green','w3-purple','w3-pale-yellow'];

staff.push({name:"*Por atribuir", cssClass:"w3-center w3-red", id:"0"}); 
for (i=0;i<arr.length;i++){
cl = "w3-center "+color[i]; 
staff.push({name:arr[i].label, cssClass:cl, id:arr[i].label}); 
}

    dp.durationBarVisible = false;
    dp.rowClickHandling = "Select";
    dp.selectedRows = 1;
    dp.rows.selection.clear();
    dp.startDate = DayPilot.Date.today(<?php echo date('Y-m-d')?>);
    dp.cellGroupBy = "Day";
    dp.days = 2;
    dp.rowHeaderHideIconEnabled = true;
    dp.eventHeight = 28;
    dp.timeHeaders = [
      { groupBy: "Day", format: "dd/MM/yyyy"},
      { groupBy: "Hour", format: "HH:mm"}
    ];   
    dp.resources = staff;
    dp.scale = "CellDuration";

    dp.cellDuration = 15;

    dp.moveBy = "Full";
    dp.timeFormat ='Clock24Hours';
    dp.snapToGrid = false;
    dp.useEventBoxes = "Never";
    dp.treeEnabled = false;
    dp.rowHeaderWidth = 80;
    dp.rowMinHeight = 30;
    dp.rowMarginTop= 1;
    dp.dynamicEventRendering = "Disabled";
    dp.eventResizeHandling = "Disabled";
    dp.onRowFilter = function(args) {
        r = args.filter;
        for(d = 0 ; d<r.length ; d++){
            if (!args.row.id.indexOf(r[d]))
            args.visible = false;
        }
    };

    dp.onBeforeEventRender = function(args) {
        args.e.bubbleHtml = args.e.text;
    };

/*EVENTO ALTERA SERVIÇOS PARA STAFF*/

    dp.onEventMoved = function (args) {
        staff = args.newResource;
        id = args.e.data.id;
                dataValue="staff="+staff+"&id="+id+"&action=17";
                staff == '0' ? staff = '<span class="w3-text-red"> *Por atribuir</span>': staff = '<span class="w3-text-black">'+staff+'</span>';
                $.ajax({ url:'../upd_schedules.php',
                  data: dataValue,
                  type: 'POST',
                  cache: false, 
                  success: function(data){
                    if (args.e.text().match(/Partida/g))x = "w3-pale-red";
                    else if (args.e.text().match(/Chegada/g)) x = 'w3-pale-green';
                    else if (args.e.text().match(/Golf/g)) x = 'w3-pale-blue';
                    else if (args.e.text().match(/Interzone/g)) x = 'w3-pale-yellow';
                    else x = 'w3-white';
                    data == 1 ?
                  dp.message('<div class="w3-green w3-padding-4 w3-border-bottom"><b><i class="fa fa-check"></i> Sucesso</b></div><div class="'+x+' w3-padding-6 w3-text-black">' +args.e.text()+'</div><div class="w3-white w3-border-top"><b class="w3-right w3-padding-4"><i class="w3-text-green fa fa-user"></i> '+staff+'</b></div>')
                : 
                  callServices();
                },
                error:function(){ window.location.assign('index.php');}
              });
        dp.update();
    };

    dp.cellWidth = 30;
    dp.onIncludeTimeCell = function(args) {
    };
dp.showCurrentTime = true;

dp.init();

    function animated() {
        return $("#animated").val() === "true";
    }

    function target() {
        return $("#target").val();
    }

function callServices(){
    $('.back').show();
        dp.events.load("dates.php",
        function success(args) {
        $('.back').fadeOut();
        dp.update();
        },
        function error(args) {
            $('.back').fadeOut();
            console.log('ko');
        });
$('.back').fadeOut();
}


function hideStaff(){
    if ($('.scheduler_default_header_icon').hasClass('scheduler_default_header_icon_show')){
        $('.btnstaffvisible').html('<i class="fa fa-eye-slash"></i><span class="hidden-xs"> Esconder</span>').attr('title','Remover barra lateral do Staff').removeClass('btn-info');
        $('.scheduler_default_header_icon').trigger('click');
    }
    else{
        $('.btnstaffvisible').html('<i class="fa fa-eye"></i><span class="hidden-xs"> Mostrar</span>').attr('title','Mostrar barra lateral do Staff').addClass('btn-info');
        $('.scheduler_default_header_icon').trigger('click');
    }
}

   function createPdfAsBlob() {
                    var doc = new jsPDF("landscape", "in", "A4");
                    doc.setFontSize(15);
                    doc.text(0.5, 1, "Escalas");
                    for (var i = 1; i <= $('#days').val(); i++) {
                        var image = dp.exportAs("jpeg", {
                            area: "range",
                            scale: 2,
                            dateFrom: dp.startDate.addDays(i-1),
                            dateTo: dp.startDate.addDays(i),
                            quality: 0.95
                        });
                        var dimensions = image.dimensions();
                        var ratio = dimensions.width / dimensions.height;
                        var width = 10;
                        var height = width/ratio;
                        doc.addImage(image.toDataUri(), 'JPEG', 0.5, 1.5, width, height);

                        var last = i === 2;
                        if (!last) {
                            doc.addPage();
                        }
                    }

                    return doc.output("blob");
                }
s='';

dp.separators = [{color: "Green", width: 1, location: new DayPilot.Date()}]; 
dp.update(); 
setInterval(function () { 
dp.separators.pop(); 
dp.separators = [ 
{color: "Green", layer: 'above', width: 1, location: new DayPilot.Date()} 
]; 
dp.update(); 
}, 60*1000) // Update every minute 


function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ) {
 dp.eventHoverHandling = 0;
dp.bubble = '';
dp.update(); 
  }
else{
dp.eventHoverHandling = "Bubble"; 
dp.bubble = new DayPilot.Bubble();   
dp.update(); 
}

}


$(function () {

$("#def-btn").on('click', function() {
if ($(this).hasClass('up')){
 $(this).html('<i class="fa fa-chevron-up"></i><span class="hidden-xs"></span>').removeClass('up btn-info').attr('title','Esconder definições');
$( ".panel-body" ).animate({height: "1%",opacity:1}, 500 );
}

else{
 $(this).html('<i class="fa fa-chevron-down"></i><span class="hidden-xs"></span>').addClass('up btn-info').attr('title','Mostrar definições');
$( ".panel-body" ).animate({height: "-10",opacity:0}, 500 );
}
});

    for(i=0;i<staff.length;i++){s +='<option value="'+staff[i].id+'">'+staff[i].name+'</option>';}
        var orderCount = 0;
        $('.multisel').html(s).multiselect({
            onChange: function(option, checked) {
                if (checked) {
                    orderCount++;
                    $(option).data('order', orderCount);
                }
                else {
                    $(option).data('order', '');
                }
            },
            buttonText: function(options) {
                if (options.length === 0) {
                    return '0 seleccionados';
                }
                else if (options.length > 3) {
                    return options.length + ' seleccionados';
                }
                else {
                    var selected = [];
                    options.each(function() {
                        selected.push([$(this).text(), $(this).data('order')]);
                    });
 
                    selected.sort(function(a, b) {
                        return a[1] - b[1];
                    });
 
                    var text = '';
                    for (var i = 0; i < selected.length; i++) {
                        text += selected[i][0] + ', ';
                    }
 
                    return text.substr(0, text.length -2);
                }
            },
        });


        $('.showsomestaff').on('click', function() {
            var selected = [];
            $('.multisel option:selected').each(function() {
                selected.push([$(this).val(), $(this).data('order')]);
            });
 
            selected.sort(function(a, b) {
                return a[1] - b[1];
            });
 
            var text = '';
            for (var i = 0; i < selected.length; i++) {
                text += selected[i][0] + ', ';
            }
            text = text.substring(0, text.length - 2);
            dp.rows.filter(text);
        });

/*LIMPA TODOS SELECCIONADOS */

    $("#clear").click(function() {
        $(".multisel").multiselect("deselectAll", false).multiselect('refresh');
        dp.rows.filter(null);
        return false;
    });

/*DOWNLOAD ESCALA*/
    $("#download-button").click(function(ev) {
        $('.nopdf').hide();
        ev.preventDefault();
        if ($("#area").val() == 'pdf'){
            var blob = createPdfAsBlob();
            DayPilot.Util.downloadBlob(blob, "escala.pdf");}
        else {
            var area = $("#area").val();
            dp.exportAs("jpeg", {area: area}).download();
        }
       $('.nopdf').show();
    });

/*COMPRIMENTO DAS CELULAS*/
   $("#cellwidth")[0].oninput = function(ev) {
            var cellwidth = parseInt(this.value);
            $("#label").html(cellwidth);
            var start = dp.getViewPort().start;
            dp.cellWidth = cellwidth;
            dp.update();
            dp.scrollTo(start);
        };

/*ALTURA DAS CELULAS*/
   $("#cellheight")[0].oninput = function(ev) {
            var cellheight = parseInt(this.value);
            $("#labelh").html(cellheight);
            var start = dp.getViewPort().start;
            dp.rowMinHeight = cellheight;
            dp.eventHeight = cellheight-2;
            dp.update();
            dp.scrollTo(start);
        };

/*DIAS APRESENTAR*/
   $("#days")[0].oninput = function(ev) {
            var days = parseInt(this.value);
            $("#labeldays").html(days);
            var start = dp.getViewPort().start;
            dp.days = days;
            dp.update();
            dp.scrollTo(start);
        };


});

detectmob();
alert = function() {};

</script>
<?php
}
else{
header('Location:/'.$_COOKIE['folders'].'/logout.php');
}
?>

</body>
</html>
