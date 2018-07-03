<?php
    $paises = require ROOTDIR . '/includes/new-transfer/repository/countries.php';
    $formas_de_pagamento = require ROOTDIR . '/includes/new-transfer/repository/payments_methods.php';
    $estados_de_pagamento = require ROOTDIR . '/includes/new-transfer/repository/payment_status.php';
    $locais_frequentes = require ROOTDIR . '/includes/new-transfer/repository/frequent_places.php';
    $servicos = require ROOTDIR . '/includes/services/repository/type_of_services.php';
?>
<div id="new-transfer">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Novo Transfer</h3>
        </div>
        <div class="panel-body">
            <form id="novo_transfer_form" role="form">
                <?php require ROOTDIR . '/includes/new-transfer/partials/serviceArea.php'; ?>
                <?php require ROOTDIR . '/includes/new-transfer/partials/clientArea.php'; ?>
                <?php require ROOTDIR . '/includes/new-transfer/partials/startArea.php'; ?>
                <?php require ROOTDIR . '/includes/new-transfer/partials/returnArea.php'; ?>
                <?php require ROOTDIR . '/includes/new-transfer/partials/paymentArea.php'; ?>
                <input type="hidden" value="<?php echo $idOperador; ?>" id="operador_admin_id" name="operador">
                <input type="hidden" value="<?php echo $nomeOperador; ?>" id="operador_nome_id" name="operadorNome">

                <input type="hidden" value="<?php echo $username2; ?>" id="usernm" name="username">  

                <div class="pull-right">
                    <button type="reset" class="btn btn-default btn-cancel btn-sm">Limpar</button>
                    <button type="button" class="btn btn-success btn-submit btn-sm">Submeter</button>
                </div>
            </form>
            <?php require ROOTDIR . '/includes/new-transfer/partials/modalMaps.php'; ?>
        </div>
    </div>
</div>

    <div class="modal fade" id="avisos_cliente" tabindex="-1" role="dialog" aria-labelledby="">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content infocolor" style="border-radius:0px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title mensagem_head"></h3>
                </div>
             
              <div class="modal-body w3-white">
                    <p class="mensagem_txt"></p>
                </div>

            </div>
        </div>
    </div>