<div aria-labelledby="myModalLabel" class="modal fade" id="modal_apagar_utilizador" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content w3-red" style="border-radius:0px;">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Confirmar
                </h4>
            </div>
            <div class="modal-body w3-white">
                Tem a certeza que pretende apagar o utilizador 
                <input type="hidden" id="modal_apagar_utilizador_id">
                    <strong><span id="apagar_utilizador_nome">
                </span></strong>
                ?
            </div>
            <div class="modal-footer w3-white">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Fechar
                </button>
                <button class="btn btn-danger" type="button">
                    Apagar
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="avisos_cliente" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content infocolor" style="border-radius:0px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h3 class="modal-title mensagem_head"></h3>
                </div>
             
              <div class="modal-body w3-white">
                    <p class="mensagem_txt"></p>
                </div>

            </div>
        </div>
    </div>