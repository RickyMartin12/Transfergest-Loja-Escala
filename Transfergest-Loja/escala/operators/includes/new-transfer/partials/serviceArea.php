<div class="row">
    <div class="col-md-4">
        <div class="form-group" id="novo_transfer_form_group_servico">
            <label for="novo_transfer_form_servico" class="label-novo-transfer">Serviço</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>
                <select class="selectpicker form-control" title="Seleccione" name="novo_transfer_form_servico" id="novo_transfer_form_servico">
                    <?php
                    if(count($servicos) > 0) {
                        foreach ($servicos as $key => $value) {?>
                            <option value="<?php echo $key;?>"> <?php echo $value;?></option>
                        <?php }}?>
                </select>
            </div>
            <div class="error-info"></div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group" id="novo_transfer_form_group_zona-de-recolha">
            <label for="novo_transfer_form_zona-de-recolha" class="label-novo-transfer">Zona de Recolha</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-send"></span>
                </div>
                <div id="zona-de-recolha-typeahead">
                    <input type="text" class="typeahead form-control" name="novo_transfer_form_zona-de-recolha" id="novo_transfer_form_zona-de-recolha" placeholder="Zona de Recolha" tabindex="1" disabled="true">
                </div>
            </div>
            <div class="error-info"></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="novo_transfer_form_group_zona-de-entrega">
            <label for="novo_transfer_form_zona-de-entrega" class="label-novo-transfer">Zona de Entrega</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-flash"></span>
                </div>
                <div id="zona-de-entrega-typeahead">
                    <input type="text" class="typeahead form-control" name="novo_transfer_form_zona-de-entrega" id="novo_transfer_form_zona-de-entrega" placeholder="Zona de Entrega" tabindex="1" disabled="true">
                </div>
            </div>
            <div class="error-info"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" id="novo_transfer_form_group_datetime">
                    <label for="datetime" class="label-novo-transfer">Agendamento</label>
                    <div class='input-group date' id='datetimepickerAgendamento'>
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </div>
                        <input type="text" class="form-control" name="datetime" id="novo_transfer_form_datetime" name="novo_transfer_form_datetime" placeholder="Data hora" disabled="true" readonly="readonly">
                    </div>
                    <div class="error-info"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="novo_transfer_form_local-frequente-recolha" class="label-novo-transfer">Local Frequente - Recolha</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>
                <select class="selectpicker form-control" title="Selecione" name="novo_transfer_form_local-frequente-recolha" id="novo_transfer_form_local-frequente-recolha" data-live-search="true" disabled="true">
                    <?php
                    if(count($locais_frequentes) > 0) {?>
                       <?php foreach ($locais_frequentes as $local) {?>
                            <option data-morada="<?php echo $local['morada'];?>" data-gps="<?php echo $local['morada_gps'];?>" data-zona="<?php echo $local['zona'];?>" value="<?php echo $local['id'];?>"> <?php echo $local['nome'];?></option>
                        <?php }}?>
                </select>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="novo_transfer_form_local-frequente-entrega" class="label-novo-transfer">Local Frequente - Entrega</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-tags"></span>
                </div>
                <select class="selectpicker form-control" title="Selecione" name="novo_transfer_form_local-frequente-entrega" id="novo_transfer_form_local-frequente-entrega" data-live-search="true" disabled="true">
                    <?php
                    if(count($locais_frequentes) > 0) {
                        foreach ($locais_frequentes as $local) {?>
                            <option data-morada="<?php echo $local['morada'];?>" data-gps="<?php echo $local['morada_gps'];?>" data-zona="<?php echo $local['zona'];?>" value="<?php echo $local['id'];?>"> <?php echo $local['nome'];?></option>
                        <?php }}?>
                </select>
            </div>
        </div>
    </div>
</div>