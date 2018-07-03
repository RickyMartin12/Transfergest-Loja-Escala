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
          <select class="form-control" id="pagesize">
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

<div id="errorvalues" style="z-index: 9999;" class="w3-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="$('#errorvalues').css('display','none')" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="color:#d9534f;"><span class="glyphicon glyphicon-warning-sign"></span> Aviso</h4>
      </div>
      <div class="modal-body">
      <p class="debug"></p>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-default" onclick="$('#errorvalues').css('display','none')"><span class='glyphicon glyphicon-remove-sign'></span> <span class="hidden-xs"> Fechar</span></button>
      </div>
    </div>
  </div>
</div>


<div id="deletevalues" style="z-index: 9999;" class="w3-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="$('#deletevalues').css('display','none')" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title" style="color:#FFB231"><span style="color:#f0ad4e;"><span class="glyphicon glyphicon-exclamation-sign"></span> Confirmar</span></h4>
      </div>
      <div class="modal-body">
        <p class="debug">
 <p>Pretende <b>apagar/zerar</b> os valores dos seguintes Campos?</p>
    -Cobrar Operador<br>-Cobrar Direto<br>-Comissão Operador<br>-Comissão Staff
</p>
      </div>
      <div class="modal-footer"> 
        <button type="button" class="btn btn-default" onclick="$('#deletevalues').css('display','none')"><span class='glyphicon glyphicon-remove-sign'></span> <span class="hidden-xs"> Fechar</span></button>
        <button type="button" class="btn btn-success" onclick="$('#regcol_15,#regcol_16,#regcol_77,#regcol_78').val('0'),$('#deletevalues').css('display','none')" ><span class='glyphicon glyphicon-ok'></span><span class="hidden-xs"> Sim</span></button>
      </div>
    </div>
  </div>
</div>





<div id="edit-servicies" class="modal fade" role="dialog">
<form class="createdfromother">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-road"></span> Editar Registo #<span class="servico_id"></span></h4>
      </div>
      <div class="modal-body">

<!-- SERVICO -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"> <span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Serviço
          <span class="servicedetails_0 w3-right myarrow glyphicon glyphicon-chevron-up" onclick="hideShowdetails('servicedetails')"></span>
        </h5>
        <div class="row servicedetails">

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O dia a que se realiza o serviço/transfers.(Visivel na aplicação)">Data Serviço *</label>
              <div class="input-group date" id="date-no-past-date">
                <input type="text" readonly name='data_servico' class="form-control" id="regcol_1" placeholder="Data Serviço *">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="A hora a que que se realiza o serviço/transfers.(Visivel na aplicação)">Horas</label>
              <div class="input-group date datetimepicker_h">
                <input readonly type="text" name="hrs" class="form-control" id="regcol_3" placeholder="Horas">
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O tipo de serviço.(Visivel na aplicação)">Serviço</label>
              <select name="servico" class="form-control" id="regcol_4"></select>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Referência interna para pesquisa de serviços/transfers quando superior a 1.(Não visivel na aplicação)">Referência</label>
              <div class="input-group" style="width:100%;">
                <input style="border-radius: 4px;" type="text" name='referencia' class="form-control" id="regcol_179" placeholder="Ref.Interna">
              </div>
            </div>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O elemento do staff que realiza o serviço/transfers.(Visivel na aplicação)">Staff</label>
              <div class="input-group" style="width:100%;">
              <select class="form-control" id="regcol_99" name='staff' placeholder="Staff "></select>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
             <label class="control-label" title="A matricula do veiculo que efectua o serviço/transfer.(Não visivel na aplicação)">Matricula </label>
              <div class="input-group" style="width:100%;">
                <select style="border-radius: 4px;" name='matricula' class="form-control" id="regcol_87"></select>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O estado em que se encontra o serviço/transfer.(Controlado pela aplicação e central)"> Estado </label>
                <select name="estado" class="form-control" id="regcol_17" onchange="this.value == 'Cancelado' ? $('#deletevalues').css('display','block'): false"></select>
            </div>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Tempo do serviço/transfers.(Não visivel na aplicação)">Duração (hh:mm)</label>
              <input readonly type="text" name="duracao" style="border-radius:4px;" class="form-control" id="duracao" placeholder="Duração">
            </div>
          </div>
      </div>

<!-- OPERADOR -->

      <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-tower"></span>&nbsp;Operador
        <span class="serviceoperator_0 w3-right myarrow glyphicon glyphicon-chevron-down" onclick="hideShowdetails('serviceoperator')"></span>
      </h5>
      <div class="row serviceoperator hidden">
        <div class="col-md-6 col-xs-12 w3-margin-bottom">
        <label class="control-label" title="Nome do Operador (visivel na aplicação)">Operador</label>
          <div class="input-group" style="width:100%;">
            <span class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></span>
            <select name="operador" class="form-control" id="regcol_88"></select>
          </div>
        </div>

          <div class="col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O ticket/voucher atribuido ao serviço.(Visivel na aplicação)">Ticket </label>
              <input name ="ticket" type="text" class="form-control" id="regcol_14" placeholder="Ticket">
            </div>
          </div> 
        </div>

<!-- CLIENTE -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-user"></span>&nbsp;Cliente
          <span class="serviceclient_0 myarrow w3-right glyphicon glyphicon-chevron-down" onclick="hideShowdetails('serviceclient')"></span>
        </h5>
        <div class="row serviceclient hidden">

          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O nome do cliente.(Visivel na aplicação)">Nome Cliente</label>
              <input name="nome_cl" type="text" class="form-control" id="regcol_6" placeholder="Nome Cliente">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group" title="O email do cliente.(Não visivel na aplicação)">
              <label class="control-label">Email</label>
              <input name="email" type="email" class="form-control" id="regcol_180" placeholder="Email">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O país de origem do cliente.(Não visivel na aplicação)">País</label>
              <input name="pais" type="text" class="form-control" id="regcol_182" placeholder="País">
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O nº. telefone do cliente.(Não visivel na aplicação)">Telefone</label>
              <input name="tel" type="tel" class="form-control" id="regcol_181" placeholder="Telefone">
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-xs-4">
            <div class="form-group">
              <label class="control-label" title="O total de adultos para o serviço/Transfer.(visivel na aplicação)">Adultos *</label>
              <input name="px" value="1" type="number" min="1" class="form-control" required id="regcol_10" placeholder="Total Adultos *">
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-xs-4">
            <div class="form-group">
              <label class="control-label" title="O total de crianças para o serviço/Transfer.(visivel na aplicação)">Crianças</label>
              <input name="cr"  type="number" min="0" class="form-control" value="0"  id="regcol_11" placeholder="Total Crianças">
            </div>
          </div>
          <div class="col-lg-2 col-md-4 col-xs-4">
            <div class="form-group">
              <label class="control-label" title="O total de bébés para o serviço/Transfer.(visivel na aplicação)">Bébés</label>
              <input name="bebe" type="number" min="0" class="form-control" value="0" id="regcol_12" placeholder="Total Bébés">
            </div>
          </div>
        </div>

<!-- LOCAIS -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Locais
          <span class="servicelocations_0 w3-right myarrow glyphicon glyphicon-chevron-down" onclick="hideShowdetails('servicelocations')"></span>
        </h5>
        <div class="row servicelocations hidden">


          <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O nº. do voo do cliente.(Visivel na aplicação)">Nº Voo</label>
              <input type="text" name="voo" class="form-control" id="regcol_5" placeholder="Voo">
            </div>
          </div>


          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="O nº. do voo do cliente.(Não visivel na aplicação)">Hora Voo</label>
              <div class="input-group date" id="flight-date">
                <input type="text" name="voo_horario" class="form-control" id="regcol_25" placeholder="Hora Voo">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Visivel na aplicação)">Zona Recolha</label>
              <div class="input-group" style="width:100%;">
                <select name="local_recolha" style="border-radius: 4px;"class="form-control" id="regcol_7"></select>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Não Visivel na aplicação)">GPS Recolha</label>
              <div class="input-group" style="width:100%;">
                <input name="morada_recolha_gps"  style="border-radius: 4px;" type="text" class="form-control" id="regcol_21" placeholder="GPS Recolha">
              </div>
            </div>
          </div>

          <div class=" col-lg-12 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Não Visivel na aplicação)">Morada Recolha</label>
              <div class="input-group" style="width:100%;">
                <input name="morada_recolha"  style="border-radius: 4px;" type="text" class="form-control" id="regcol_20" placeholder="Morada Recolha">
              </div>
            </div>
          </div>

         <div class="col-xs-12 w3-border-bottom w3-border-dark-grey w3-margin-bottom"></div>

          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de destino do cliente.(Visivel na aplicação)">Zona Entrega</label>
             <div class="input-group" style="width:100%;">
                <select name="local_entrega" style="border-radius: 4px;" class="form-control" id="regcol_8"></select>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Não Visivel na aplicação)">GPS Entrega</label>
              <div class="input-group" style="width:100%;">
                <input name="morada_entrega_gps" style="border-radius: 4px;" type="text" class="form-control" id="regcol_23" placeholder="GPS Entrega">
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Descrição completa do ponto de origem do cliente.(Não Visivel na aplicação)">Morada Entrega</label>
              <div class="input-group" style="width:100%;">
                <input name="morada_entrega" style="border-radius: 4px;" type="text" class="form-control" id="regcol_22" placeholder="Morada Entrega">
              </div>
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Observações suplementares repeitantes ao transfer ou cliente.(visivel na aplicação)">Observações</label>
              <input name="obs" type="text" class="form-control" id="regcol_13" placeholder="Obs">
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="form-group">
              <label class="control-label" title="Observação extra referente a uma localização especifica, origem ou destino.(Visivel na aplicação)">Ponto Referência</label>
              <input name="pt_ref" type="text" class="form-control" id="regcol_9" placeholder="Ponto de Referência">
            </div>
          </div>
        </div>

<!-- COBRANÇAS -->

        <h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2"><span class="glyphicon glyphicon-eur"></span>&nbsp;Cobranças/Comissões</h5>
        <div class="row servicecharges">
          <div class="col-md-3 col-xs-6">
            <div class="form-group">
              <label class="control-label" title="Valor a cobrar ao operador definido no campo 'Operador'.(Não visivel na aplicação)">Cobrar Operador</label>
              <input name="cobrar_operador" type="number" step="any" min="0" class="form-control" id="regcol_15" placeholder="A cobrar ao Operador">
            </div>
          </div> 
        <div class="col-md-3 col-xs-6">
          <div class="form-group">
            <label class="control-label" title="Valor a cobrar ao cliente na serviço/transfer.(Visivel na aplicação no icone 'i' de cada serviço)">Cobrar Directo</label>
            <input name="cobrar_direto" type="number" step="any" min="0" class="form-control" id="regcol_16" placeholder="A cobrar ao Cliente">
          </div>
        </div> 
        <div class="col-md-3 col-xs-6">
          <div class="form-group">
            <label class="control-label">Cmx Operador</label>
            <input name="cmx_ope" type="number" step="any" min="0" class="form-control" id="regcol_77" placeholder="Cmx Operador">
          </div>
        </div>
        <div class="col-md-3 col-xs-6">
          <div class="form-group">
            <label class="control-label"> Cmx Staff </label>
            <input name="cmx_st" type="number" step="any" min="0" class="form-control" id="regcol_78" placeholder="Cmx Staff">
          </div>
        </div> 
      </div>
    </div>
    <input type="hidden" name="criado_em" value="1">
    <input type="hidden" name="created_by" id="created_by">
    <div class="modal-footer r">

      <button onclick="newTransferType(23)" style="float:left;" title="Criar novo registo/réplica com dados do Serviço atual, ATENÇÃO ao carregar está a gravar. " type="button" class="btn btn-info btn-repeat">
       <i class="fa fa-repeat" aria-hidden="true"></i>
        <span class="hidden-xs"> Guardar Réplica</span>
     </button>

     <button onclick="newTransferType(24)" style="float:left;margin-left:9px;"title="Criar um novo registo de Retorno com dados do Serviço atual (Troca moradas Partida = Chegada e Chegada = Partida)" type="button" class="btn btn-info btn-return">
      <i class="fa fa-exchange" aria-hidden="true"></i>
      <span class="hidden-xs"> Guardar Retorno</span>
     </button>

      <button title="Fechar Sem guardar"type="button" class="btn btn-default cancel-edit" data-dismiss="modal"><span class="glyphicon glyphicon-remove-sign"></span>
        <span class="hidden-xs"> Fechar</span>
      </button>
      <button title="Guardar as alterações do serviço" type="button" class="btn btn-success" onclick="saveIt($('.servico_id').html())"><span class="glyphicon glyphicon-save-file"></span>
        <span class="hidden-xs"> Guardar Alterações</span>
      </button>
    </div>
  </div>
  </div>
</form>
</div>