<link href="css/highlight.css" rel="stylesheet">
<link href="css/bootstrap-switch.min.css" rel="stylesheet">

<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">
<span class="glyphicon glyphicon-signal"></span> Privilégios</h3>
<span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Privilégios" style="float: right;top: -14px; cursor: pointer;"></span>
</div>
<div id='testeloader'></div>
<div class="panel-footer">
</div>
</div>
<script>

function showMenuAll(nr){
if ($(".menu"+nr).hasClass("glyphicon-chevron-down"))
{
$(".menu"+nr).removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
$(".menu"+nr+"all").fadeIn();}
else{
$(".menu"+nr).removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
$(".menu"+nr+"all").fadeOut();}}
</script>