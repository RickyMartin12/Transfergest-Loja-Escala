<div>
    <h4 id="novo_transfer_form_title_address">
        Dados de Partida
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-6" id="novo_transfer_form_group_morada-de-recolha">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_morada-de-recolha">
                    Morada de Recolha
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-resize-small">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_morada-de-recolha" name="novo_transfer_form_morada-de-recolha" placeholder="Morada de Recolha" type="text" data-gps="">
                    <div class="input-group-btn">
                        <button aria-label="GPS" class="btn btn-default" disabled="true" id="novo_transfer_form_group_morada-de-recolha_button-gps" title="GPS" type="button">
                                    <span class="glyphicon glyphicon-phone">
                                    </span>
                        </button>
                    </div>
                    </input>
                </div>
                <div class="error-info">
                </div>
            </div>
        </div>
        <div class="col-md-2 hide" id="novo_transfer_form_group_voo">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_voo">
                    Nº Voo
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-plane">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_voo" name="novo_transfer_form_voo" placeholder="FR7033" type="text">
                    </input>
                </div>
                <div class="error-info">
                </div>
            </div>
        </div>
        <div class="col-md-4 hide" id="novo_transfer_form_group_datetime-chegada">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_datetime-Chegada">
                    Horário de Chegada
                </label>
                <div class="input-group date" id="datetimepickerHorarioChegada">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_datetime-Chegada" name="datetimeChegada" placeholder="data hora" readonly="readonly" type="text">
                    </input>
                </div>
                <div class="error-info">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="novo_transfer_form_group_morada-de-entrega">
                <label class="label-novo-transfer" for="novo_transfer_form_morada-de-entrega">
                    Morada de Entrega
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-random">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_morada-de-entrega" name="novo_transfer_form_morada-de-entrega" placeholder="Morada de Entrega" type="text" data-gps="">
                    <div class="input-group-btn">
                        <button aria-label="GPS" class="btn btn-default" data-toggle="modal" disabled="true" id="novo_transfer_form_group_morada-de-entrega_button-gps" title="GPS" type="button">
                                    <span class="glyphicon glyphicon-phone">
                                    </span>
                        </button>
                    </div>
                    </input>
                </div>
                <div class="error-info">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group" id="novo_transfer_form_group_adultos">
                <label class="label-novo-transfer" for="novo_transfer_form_adultos">
                    Adultos
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tower">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_adultos" name="novo_transfer_form_adultos" type="text" value="1">
                    </input>
                </div>
                <div class="error-info">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_criancas">
                    Crianças
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tent">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_criancas" name="novo_transfer_form_criancas" type="text" value="0">
                    </input>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_bebes">
                    Bebés
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-baby-formula">
                            </span>
                    </div>
                    <input class="form-control" disabled="true" id="novo_transfer_form_bebes" name="novo_transfer_form_bebes" type="text" value="0">
                    </input>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_retorno">
                    Retorno
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-tags">
                            </span>
                    </div>
                    <select class="selectpicker form-control" disabled="true" id="novo_transfer_form_retorno" name="novo_transfer_form_retorno">
                        <option value="0">
                            Não
                        </option>
                        <option value="1">
                            Sim
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="label-novo-transfer" for="novo_transfer_form_observacoes">
                    Observações
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                            <span class="glyphicon glyphicon-edit">
                            </span>
                    </div>
                    <textarea class="form-control" disabled="true" id="novo_transfer_form_observacoes" name="novo_transfer_form_observacoes" rows="3" style="resize:none"></textarea>
                </div>
            </div>
        </div>
    </div>
    </hr>
</div>