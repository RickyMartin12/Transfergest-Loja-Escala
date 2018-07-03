<div>
    <h4>Dados Cliente</h4>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group" id="novo_transfer_form_group_e-mail">
                <label for="novo_transfer_form_email" class="label-novo-transfer">E-mail</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </div>
                    <div id="email-typeahead">
                        <input type="text" class="typeahead form-control" name="novo_transfer_form_e-mail" id="novo_transfer_form_e-mail" placeholder="E-mail" tabindex="1" disabled="disabled">
                    </div>
                </div>
                <div class="error-info"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" id="novo_transfer_form_group_nome-cliente">
                <label for="novo_transfer_form_nome-cliente" class="label-novo-transfer">Nome Cliente</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-user"></span>
                    </div>
                    <div id="nome-typeahead">
                        <input type="text" class="typeahead form-control" name="novo_transfer_form_nome-cliente" id="novo_transfer_form_nome-cliente" placeholder="Nome Cliente" tabindex="2" disabled="disabled">
                    </div>
                </div>
                <div class="error-info"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="novo_transfer_form_telefone" class="label-novo-transfer">Telefone</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-earphone"></span>
                    </div>
                    <input type="text" class="form-control" id="novo_transfer_form_telefone" name="novo_transfer_form_telefone" placeholder="Telefone" tabindex="3" disabled="disabled">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 pull-right">
            <div class="form-group">
                <label for="novo_transfer_form_pais" class="label-novo-transfer">País</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-globe"></span>
                    </div>
                    <select class="selectpicker form-control" name="novo_transfer_form_pais" id="novo_transfer_form_pais" tabindex="5" disabled="disabled">
                        <?php
                        if(count($paises) > 0) {
                            foreach ($paises as $key => $value) {?>
                                <option value="<?php echo $key;?>"> <?php echo $value;?></option>
                            <?php }}?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4 pull-right">
            <div class="form-group">
                <label for="novo_transfer_form_numero-quarto" class="label-novo-transfer">Nº Quarto</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-home"></span>
                    </div>
                    <input type="text" class="form-control" name="novo_transfer_form_numero-quarto" id="novo_transfer_form_numero-quarto" placeholder="Nº Quarto" tabindex="4" disabled="disabled">
                </div>
            </div>
        </div>
    </div>
</div>