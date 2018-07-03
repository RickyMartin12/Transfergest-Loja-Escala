<style>
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover, .panel-default>.my-orange, .my-orange
{background-color: #FFB231;}

.nav-tabs>li>a {
    margin-bottom: -1px;
}

.active{color: #000;}
.panel-heading .my-orange{
padding: 1px 10px!important;
}
</style>


<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
<li class="active">
<a data-toggle="tab" href="#definicoes" onclick='callDefinitionsActions()'><span class="glyphicon glyphicon-cog"></span> Definições</a></li>
<li>
<a data-toggle="tab" href="#tipo_servicos" onclick="callServicesTypesActions()"><span class="glyphicon glyphicon-tags"></span> Serviços</a></li>
<li>
<a data-toggle="tab" href="#zonas_comissao"onclick="callZonesValues()" ><span class="glyphicon glyphicon-bookmark"></span> Zonas</a>
</li>
<li>
<a data-toggle="tab" href="#loja_definicoes"onclick="callShopDefinicoes()" ><span class="glyphicon glyphicon-cog"></span> Loja</a>
</li>
<li>
<a data-toggle="tab" href="#promo_code"onclick="callPromoCodes()" ><span class="glyphicon glyphicon-gift"></span> Promos</a>
</li>
</ul>

<div class="tab-content">
 <div id="definicoes" class="tab-pane fade in active">
   <div class="panel panel-default">
    <div class="panel-heading my-orange"><h3 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Definições Empresa</h3>
    </div>
   <div class="panel-body" id="delete_team">
   </div>
   <div class="panel-footer my-orange">
   </div>
  </div>
 </div>
 <div id="tipo_servicos" class="tab-pane fade">
 </div>
 <div id="zonas_comissao" class="tab-pane fade">
 </div>
 <div id="loja_definicoes" class="tab-pane fade">
 </div>
 <div id="promo_code" class="tab-pane fade">
 </div>

</div>

<input id="mydomain" type="hidden" value="<?php echo $_SERVER['HTTP_HOST'];?>">