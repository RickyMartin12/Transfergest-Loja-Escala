<?php
    $timelines = require ROOTDIR . "/includes/management/repository/timeline.php";
    $operador = require ROOTDIR . "/includes/management/repository/service_tax.php";

    $taxa = $operador['taxa_de_servico'] == 1 ? true : false;

    $tipo = $operador['tipo_taxa_de_servico'];
    if($tipo != '') {
        $tipo = $tipo == 'Percentagem' ? 0 : 1;
    }
    $valor = $operador['valor_taxa_de_servico'] == '' ? '0.00' : $operador['valor_taxa_de_servico'];
?>


<div id="management">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Configurações</h3>
        </div>
        <div class="panel-body">
            <div class="row" style="margin:0px 25px;">
                <div class="col-md-6">
                    <div class="checkbox checkbox-default">
                        <input id="taxa_de_servico" class="styled" type="checkbox"
                               value="<?php echo $taxa; ?>" <?php if ($taxa) {
                            echo 'checked="checked"';
                        } ?> >
                        <label for="checkbox2">
                            Taxa de Serviço
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 0px 25px 20px 25px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="addon-label">Tipo</span>
                            </div>
                            <select class="selectpicker form-control" id="tipo" <?php if($taxa == false) { echo 'disabled="disabled"';}?> >
                                <option value="0" <?php if($tipo == 0) { echo 'selected="selected"';}?> >Percentagem</option>
                                <option value="1" <?php if($tipo == 1) { echo 'selected="selected"';}?> >Valor fixo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="novo_transfer_form_group_adultos">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="addon-label">Valor</span>
                            </span>
                            <input type="text" class="form-control" id="valor" value="<?php echo $valor;?>" aria-label="..."
                                <?php if($taxa == false) { echo 'disabled="disabled"';}?>>
                        </div><!-- /input-group -->
                    </div>
                </div>
            </div>

            <div class="btn-group pull-right" role="group" aria-label="...">
                <button type="button" class="btn btn-success" id="save-btn">Guardar</button>
            </div>

        </div>
    </div>
</div>
<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Timeline</h3>
    </div>

    <div class="panel-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php foreach ($timelines as $timeline) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo $timeline['id']; ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse<?php echo $timeline['id']; ?>" aria-expanded="true"
                               aria-controls="collapse<?php echo $timeline['id']; ?>">
                                <?php echo $timeline['created_at'] . ' - ' . $timeline['text']; ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $timeline['id']; ?>" class="panel-collapse collapse in" role="tabpanel"
                         aria-labelledby="heading<?php echo $timeline['id']; ?>">
                        <div class="panel-body">
                            <?php echo $timeline['modifications']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<input type="hidden" id="operador" value="<?php echo $idOperador; ?>">
</div>