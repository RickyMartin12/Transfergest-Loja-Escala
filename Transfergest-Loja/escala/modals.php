<style>

.modal-content {
    background: #333;}

.modal-body{
background:#FFF;
}

.close{
color:#FFF;
opacity:1;
}

</style>

<input type="hidden" id="mensagem_ok" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalok">
<div id="Modalok" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#5cb85c;"> <span class='glyphicon glyphicon-ok'></span> Sucesso</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">

      <p style='text-align:center; margin:0;'><img src="css/logo-nav.png" style="width:120px;"></p>
<!--
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
-->
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="mensagem_ko" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalko">
<div id="Modalko" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#d9534f;"><span class='glyphicon glyphicon-warning-sign'></span> Aviso</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">

 <p style='text-align:center; margin:0;'><img src="css/logo-nav.png" style="width:120px;"></p>  

<!--
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>

-->
      </div>
    </div>
  </div>
</div>


<input type="hidden" id='information-modal' data-toggle="modal" data-target="#newsinformation">

<div id="newsinformation" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style='color: #337ab7;'><span class="glyphicon glyphicon-info-sign"></span> Informações Sobre...</h4>
      </div>

<form id="informations-news">
      <div class="modal-body">
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label class="control-label" for="nome">Nome *</label>
<input type="text" required="" style="cursor:pointer; background-color: #FFFFFF;" name="nome" id="nome" value="" class="input-small form-control" placeholder="Nome *">
</div>
</div>


<div class="col-xs-12">
<div class="form-group">
<label class="control-label" for="nome">Email *</label>
<input type="email" required="" background-color: #FFFFFF;" name="email" id="email" class="input-small form-control" placeholder="Email *">
</div>
</div>
<div class="col-xs-12">
<div class="form-group">
<label class="control-label" for="nome">Assunto</label>
<input type="text" readonly="true" background-color: #FFFFFF;" name="assunto" id="assunto" class="input-small form-control">
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label class="control-label" for="nome">Dominio </label>
<input type="text" readonly="true" background-color: #FFFFFF;" name="dominio" id="dominio" class="input-small form-control">
</div>
</div>

<div class="col-xs-12">
<div class="form-group">
<label class="control-label" for="nome">Observações </label>
<textarea type="text"  background-color: #FFFFFF;" name="obs" id="obs" class="input-small form-control" placeholder="Observações"/></textarea>
</div>
</div>
</div>
</div>
      <div class="modal-footer">
 <p style='text-align:center; margin:0;'><img src="css/logo-nav.png" style="width:120px;"></p>  
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" title="Enviar pedido informação"></span> Enviar</button>
        <button type="button" class="btn btn-default" id="close-inf-modal" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign" title="Fechar pedido informação"></span> Fechar</button>
      </div>

</form>
    </div>

  </div>
</div>
