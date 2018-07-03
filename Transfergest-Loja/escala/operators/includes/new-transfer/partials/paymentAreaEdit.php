<div>
    <h4>Dados de Pagamento</h4>
    <hr>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="forma-de-pagamento" class="label-novo-transfer">Forma de Pagamento</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-transfer"></span>
                    </div>
                    <select class="selectpicker form-control" name="forma-de-pagamento" id="novo_transfer_form_forma-de-pagamento" disabled="true">
                        <?php
                        if(count($formas_de_pagamento) > 0) {
                            foreach ($formas_de_pagamento as $key => $value) {?>
                                <option value="<?php echo $key;?>"> <?php echo $value;?></option>
                            <?php }}?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="valor-do-servico" class="label-novo-transfer">Valor do Serviço</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-eur"></span>
                    </div>
                    <input type="text" class="form-control" name="valor-do-servico" id="valor-do-servico" value="-/-" readonly="true">

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="estado-do-pagamento" class="label-novo-transfer">Estado Serviço</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-saved"></span>
                    </div>
                    <select class="selectpicker form-control" name="estado-do-pagamento" id="novo_transfer_form_estado-do-pagamento" disabled="true">
                        <?php
                        if(count($estados_de_pagamento) > 0) {
                            foreach ($estados_de_pagamento as $key => $value) {?>
                                <option value="<?php echo $key;?>"> <?php echo $value;?></option>
                            <?php }}?>
                    </select>

                </div>
            </div>
        </div>



    </div>
</div>