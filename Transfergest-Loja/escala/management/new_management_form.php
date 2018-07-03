<style>

.nav-tabs>li>a {
    border: 1px solid #ccc;
    background: rgba(255,255,255,0.8);
}

</style>

<ul class="nav nav-tabs" id='new_prod_form_tabs' style="border-bottom: 0px solid #ddd;"></ul>
<span id='new_prod_form_types'></span>
<div class="panel panel-default">
<div class="panel-heading my-orange"><h3 class="panel-title">

<button class="btn btn-default criar_nova_classe" title='Criar Nova Classe Ex: 1-4 pax' onclick='callNewPricesForm(5,$("#tipo_val").val(),$("#cat_val").val())'>
<span class='glyphicon glyphicon-paperclip'></span> Classes</button>&nbsp;

<button class="btn btn-default criar_novo_local" title='Criar Novo Local' onclick='callNewPricesForm(1,$("#tipo_val").val(),$("#cat_val").val())'>

<span class='glyphicon glyphicon-map-marker'></span> Locais</button>&nbsp;

<button class=" btn btn-default btn-info criar_nova_rota" title='Criar Nova Rota' 
onclick='callNewProdForm(parseInt($("#tipo_val").val()),parseInt($("#cat_val").val()))'>
<span class='glyphicon glyphicon-tag'></span> Rota</button>



</h3>
<span onclick="$('#insert').empty();" class="glyphicon glyphicon-remove" title="Fechar Novo Produto" style="float: right;top: -24px; cursor: pointer;"></span>
</div>

<!--INSERIR NOVO PRODUTO-->

<div class="panel-body" id="add_type" style="padding:10px 5px 0px 5px;"></div>

<!--INSERIR EDITAR PRODUTO-->

<div class="panel-body" id="add_type_edit" style="padding:0px 5px 0px 5px;"></div>

<div class="panel-footer my-orange"></div>
</div>

<script>

$('.panel-title .btn').click(function(){

$('.panel-title .btn').removeClass('btn-info');
$(this).addClass('btn-info');

});



</script>