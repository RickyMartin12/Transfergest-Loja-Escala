<div id="pdf_conf" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-arrows-alt" aria-hidden="true"></i> Formato & Orientação:</span></h4>
      </div>
      <div class="modal-body">
      <div class="w3-row-padding">
      <div class="w3-col l6 s12">
        <label>Formato:</label>
          <select class="form-control" id="pagesize">ee
          <option value="a2">A2</option>
          <option value="a3">A3</option>
          <option value="a4">A4</option>
          </select>
      </div>

      <div class="w3-col l6 s12">
        <label>Orientação:</label>
          <select class="form-control" id="orientation">
            <option value="portrait">Vertical</option>
            <option value="landscape">Horizontal</option>
          </select>
      </div>
        </div>
      </div>

    <div class="modal-footer r">
      <button type="button" class="btn btn-default cancel-edit" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>
        <font class="hidden-xs"> Fechar</font>
      </button>
      <button type="button" class="btn btn-success" onclick="generatePdf($('#pagesize').val(),$('#orientation').val())">
<span class="glyphicon glyphicon-ok"></span>
        <font class="hidden-xs"> Confirmar</font>
      </button>
    </div>
  </div>
  </div>
</div>

<div id="edit-servicies" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-list-alt"></i> Fatura #<span class="servico_id"></span></h4>
      </div>
      <div class="modal-body">

<!-- INFO TABELA -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><i class="fa fa-book"></i>&nbsp; Dados
          <span class="servicedetails_0 w3-right myarrow glyphicon glyphicon-chevron-up" onclick="hideShowdetails('servicedetails')"></span>
        </h5>
        <div class="row servicedetails">

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label">Data Fatura *</label>
              <div class="input-group date" id="date_one">
                <input type="text" readonly class="form-control" id="regcol_1" placeholder="Data Fatura *">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label">Entidade</label>
               <input type="text" class="form-control" id="regcol_4" placeholder="Entidade">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label">Fatura nº</label>
                <input type="text" class="form-control" id="regcol_5" placeholder="Fatura">
            </div>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label">Staff</label>
              <div class="input-group" style="width:100%;">
              <select class="form-control" id="regcol_99" placeholder="Staff"></select>
              </div>
            </div>
          </div>


          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label">Responsavel</label>
                <input type="text" class="form-control" id="regcol_3" placeholder="Responsável">
              </div>
            </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
             <label class="control-label">Matricula </label>
              <div class="input-group" style="width:100%;">
                <select style="border-radius: 4px;" class="form-control" id="regcol_87"></select>
              </div>
            </div>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Tipo </label>
              <select class="form-control" id ="regcol_18"></select>
            </div>
          </div>
        <div class="col-md-3 col-sm-6 col-xs-6 w3-margin-bottom">
        <label class="control-label">Manutenção</label>
            <select disabled class="form-control" id="regcol_19"></select>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Localidade </label>
              <input type="text" class="form-control" id="regcol_20" placeholder="Localidade">
            </div>
          </div>

        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Km.Inicio</label>
              <input type="text" class="form-control" id="regcol_6" placeholder="Km.Inicio">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Km.Fim</label>
              <input type="text" class="form-control" id="regcol_17" placeholder="Km.Fim">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Prox.Km.</label>
              <input type="number" min='0' class="form-control" id="regcol_180" placeholder="Próx.Km.">
            </div>
          </div>
 <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Lat.Inicio</label>
              <input type="text" class="form-control" id="regcol_55" placeholder="Lat.Inicio">
            </div>
          </div>
 <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Long.Inicio</label>
              <input type="text" class="form-control" id="regcol_56" placeholder="Long.Inicio">
            </div>
          </div>
 <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Lat.Fim</label>
              <input type="text" class="form-control" id="regcol_57" placeholder="Lat.Fim">
            </div>
          </div>
 <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Long.Fim</label>
              <input type="text" class="form-control" id="regcol_58" placeholder="Long.Fim">
            </div>
          </div>

      </div>

<!-- RESTANTE FIXAS APENAS -->

        <h5 title ="Apenas visivel para despesas Fixas." class="col-xs-12 mylabel w3-padding-8 w3-card-2"><i class="fa fa-info-circle"></i>&nbsp;Informações (Fixas)
        <span class="serviceclient_0 hidden myarrow w3-right glyphicon glyphicon-chevron-down" onclick="hideShowdetails('serviceclient')"></span>
        </h5>
        <div class="row serviceclient hidden">
          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Data Inicio</label>
              <div class="input-group data_two">
                <input type="text" readonly class="form-control" id="regcol_181" placeholder="Data Inicio">
                <span style="cursor:pointer;" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Data Fim</label>
              <div class="input-group data_tree">
                <input type="text" readonly class="form-control" id="regcol_182" placeholder="Data Fim">
                <span style="cursor:pointer;" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Horas Inicio</label>
              <div class="input-group clocktime">
              <input readonly value='00:00' type="text" class="form-control" id="regcol_11" placeholder="Horas Inicio">
              <span style="cursor:pointer;" class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-6">
            <div class="form-group">
              <label class="control-label">Horas Fim</label>
              <div class="input-group clocktime">
              <input readonly type="text" value='00:00' class="form-control" id="regcol_12" placeholder="Horas Fim">
              <span style="cursor:pointer;" class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-xs-4">
            <div class="form-group">
              <label class="control-label">Dia </label>
              <input type="number" min="1" max="31" class="form-control" value ='1' required id="regcol_10" placeholder="dia">
            </div>
          </div>
           <div class="col-lg-3 col-md-4 col-xs-8">
            <div class="form-group">
              <label class="control-label">Periodicidade</label>
              <select class="form-control" id="regcol_22"></select>
            </div>
          </div>
        </div>

<!-- COBRANÇAS -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-eur"></span>&nbsp;Total</h5>
        <div class="row servicecharges">
        <div class="col-md-9 col-xs-9">
          <div class="form-group">
            <label class="control-label">Descrição</label>
            <input type="text" class="form-control" id="regcol_16" placeholder="Descrição">
          </div>
        </div> 
        <div class="col-md-3 col-xs-3">
          <div class="form-group">
            <label class="control-label"> Total</label>
            <input type="number" step="any" min="0" class="form-control" id="regcol_78" placeholder="Total">
          </div>
        </div> 
      </div>
    </div>

    <div class="modal-footer r">
      <button type="button" class="btn btn-default cancel-edit" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>
        <font class="hidden-xs"> Fechar</font>
      </button>
      <button type="button" class="btn btn-success" onclick="saveIt($('.servico_id').html())"><span class="glyphicon glyphicon-save-file"></span>
        <font class="hidden-xs"> Guardar</font>
      </button>
    </div>
  </div>
  </div>
</div>