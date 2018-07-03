<div class="panel panel-default">
<div class="panel-heading my-orange">
<h3 class="panel-title">
<span class="glyphicon glyphicon-filter"></span> Filtros</h3>
<span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Acções Operadores" style="float: right;top: -14px; cursor: pointer;"></span>
<hr style="border-top: 1px solid #FFF;">
<div class="search" style="right: 20px; top:62px;">
<div class="row">
<div class="id_date">


<div class="col-sm-6 col-md-4 col-lg-3 col-xs-12 mrg">
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
<select type="text" class="form-control" name="nome_operador" id="nome_operador" placeholder="Nome Operador">
</select>
</div>
</div>


</div>
<div style="float:right;">
<div class="form-group ">
<p style="text-align:right">
<a href="#" onclick="searchNameOperator()" id="search_action" class="btn btn-info" title="Filtrar por nome operador"><span class="glyphicon glyphicon-filter"></span></a>
</p>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading my-orange">
<h3 class="panel-title">
<span class="glyphicon glyphicon-cog"></span> Acções Operadores</h3>
</div>
<div class="panel-body" id="delete_team">
</div>
<div class="panel-footer my-orange">
</div>
</div>


<script>
$(function () {
arr = JSON.parse(localStorage.getItem("operadores"));
opt='';
for (i=0;i<arr.length;i++){

opt +='<option value="'+arr[i].label+'">'+arr[i].label+'</option>';
}

$('#nome_operador').html(opt).select2();

});
</script>
