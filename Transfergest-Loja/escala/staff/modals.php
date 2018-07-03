<div class="modal fade" id="confirm-service" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Fechar Serviço</h4>
                </div>
                <div class="modal-body">
                     <p class="debug-url"></p>
                </div>
                
                <div class="modal-footer">
                    <button id="close_mod" type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                    <a class="btn btn-success btn-ok">Sim</a>
                </div>
            </div>
        </div>
    </div>
<div class="back"></div>
<div id="fulldiv">
<div class="client_content"></div>
<hr>
<button class="btn-sm btn- btn-default" style="float:right;" onclick="clearMe();">Fechar</button>
</div>
</div>

<input type="hidden" id="mensagem_ko" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalko">
<div id="Modalko" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:#d9534f;">Erro</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="mensagem_ok" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modalok">
<div id="Modalok" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color:green;">Sucesso</h4>
      </div>
      <div class="modal-body">
        <p class="debug-url"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="client_name" role="dialog" style='opacity: 1;
background:#FF6600;'>
    <div class="modal-dialog modal-lg" style="max-height:100vh; margin-top: 10px;">
      <div class="modal-content">
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>



