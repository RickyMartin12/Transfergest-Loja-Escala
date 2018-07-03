<?php
$services = require ROOTDIR . "/includes/services/repository/services.php";
$total_of_services = require ROOTDIR . "/includes/services/repository/total_of_services.php";

$servicos = require ROOTDIR . "/includes/services/repository/type_of_services.php";
$estados_de_pagamento = require ROOTDIR . '/includes/new-transfer/repository/payment_status.php';
$formas_de_pagamento = require ROOTDIR . '/includes/new-transfer/repository/payments_methods.php';

$paises = require ROOTDIR . "/includes/new-transfer/repository/countries.php";

//pagination
$page = 1;
$SERVICES_PER_PAGE = 20;
$minLimitValue = 0;
$maxLimitValue = $page * $SERVICES_PER_PAGE;

if ($page != 1) {
    $minLimitValue = ($page - 1) * $SERVICES_PER_PAGE;
}

$numOfPages = ceil($total_of_services / $SERVICES_PER_PAGE);
?>

<div id="services">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Serviços<span class="pull-right" id="services__total"> <?php echo $total_of_services; ?> resultados encontrados.</span>
            </h3>
        </div>
        <div class="panel-body">

            <div class="filters" style="margin-top:15px;margin-bottom: 15px;">
                <form>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="sr-only" for="responsavel">ID</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-pushpin"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ID" name="filter_id"
                                           id="filter_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                         <div class="form-group input-group" id="datetimepicker6">
                          <input type="text" readonly="" class="form-control" id="date_ini" name="date_ini" placeholder="Dia Inicio">
                          <span class="input-group-addon" style="cursor:pointer;">
                           <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                        <div class="error-info"></div>
                        </div>


                        <div class="col-md-2">
                         <div class="form-group input-group" id="datetimepicker7">
                          <input type="text" readonly="" class="form-control" id="date_fim" name="date_fim" placeholder="Dia Fim">
                          <span class="input-group-addon" style="cursor:pointer;">
                           <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                        <div class="error-info"></div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="sr-only" for="responsavel">Serviços</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-tags"></span>
                                    </div>
                                    <select class="selectpicker form-control" name="filter_service" id="filter_service">
                                        <option value="-1"></option>
                                        <?php
                                        if (count($servicos) > 0) {
                                            foreach ($servicos as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="sr-only" for="responsavel">Estado</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-saved"></span>
                                    </div>
                                    <select class="selectpicker form-control" name="filter_status" id="filter_status">
                                        <option value="-1"></option>
                                        <?php
                                        if (count($estados_de_pagamento) > 0) {
                                            foreach ($estados_de_pagamento as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"> <?php echo $value; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="disabled">
                            <a href="#" aria-label="Previous" class="previousPageNumber">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <?php for ($i = 2; $i <= $numOfPages; $i++) { ?>
                            <li class="eachPageNumber"><a href="#"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li>
                            <a href="#" aria-label="Next" class="nextPageNumber">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="table-responsive">
                <table class="table table-striped" id="services__table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Serviço</th>
                        <th>Cliente</th>
                        <th>Pax</th>
                        <th>Pagamento</th>
                        <th>Estado</th>
                        <th style="min-width:155px;">Acções</th>
                    </tr>
                    </thead>
                    <tbody id="services__table__body">
                    <?php foreach ($services as $service) { ?>
                        <tr>
                            <td><?php echo $service['id']; ?></td>
                            <td><?php echo date('d/m/Y', $service['data_servico']); ?></td>
                            <td><?php echo date('H:i', $service['hrs']); ?></td>
                            <td><?php echo $service['servico']; ?></td>
                            <td><?php echo $service['nome_cl']; ?></td>
                            <td><?php echo $service['pax']; ?></td>
                            <td>
                                <?php $Pago = 'Não';
                                if ($service['pag_staf'] == 'Sim' || $service['pag_ope'] == 'Sim') {
                                    $Pago = 'Sim';
                                }
                                echo $Pago;
                                ?>
                            </td>
                            <td><?php echo $service['estado']; ?></td>
                            <td>
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group" role="group" aria-label="First group"
                                         data-id="<?php echo $service['id']; ?>">
                                        <button type="button" class="btn btn-sm btn-primary">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-default btn-pdf">
                                            <span class="glyphicon glyphicon-print"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-default btn-email">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-default btn-marker">
                                            <span class="glyphicon glyphicon-map-marker" style="color:#41aadb;"></span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="disabled">
                            <a href="#" aria-label="Previous" class="previousPageNumber">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1</a></li>
                        <?php for ($i = 2; $i <= $numOfPages; $i++) { ?>
                            <li class="eachPageNumber"><a href="#"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li>
                            <a href="#" aria-label="Next" class="nextPageNumber">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>

    <!-- Modal 2-->
    <div class="modal fade" id="pdf_modal" tabindex="-1" role="dialog" aria-labelledby="services">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="services__modal__title">Por favor, escolha tipo de lingua:</h4>
                </div>
                <form class="mypdf" action="../operators/includes/services/requests/json/transfers.php" method="post" >
                <div class="modal-body">
                

                    <select name="lang" id="mylangs">
                     <option value="PT">PT</option>
                     <option value="EN">EN</option>
                    </select>
                    <input type="hidden" input hidden type="text" name="id" id="num">
                    
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success myl">
                </div>
               </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="services__modal" tabindex="-1" role="dialog" aria-labelledby="services">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="services__modal__title"></h4>
                </div>
                <div class="modal-body">
                    <form id="novo_transfer_form" role="form">
                        <?php require ROOTDIR . '/includes/new-transfer/partials/serviceArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/clientArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/startArea.php'; ?>
                        <?php require ROOTDIR . '/includes/new-transfer/partials/paymentArea.php'; ?>
                        <input type="hidden" value="<?php echo $idOperador; ?>" id="operador_admin_id" name="operador">
                        <input type="hidden" value="-1" id="service_id">
                    </form>
                    <?php require ROOTDIR . '/includes/new-transfer/partials/modalMaps.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /Resultado da pesquisa -->
    <input type="hidden" id="operador" value="<?php echo $nomeOperador; ?>">
    <input type="hidden" id="username" value="<?php echo $username; ?>">
    <input type="hidden" id="maxPage" value="<?php echo $numOfPages; ?>">
    <input type="hidden" id="old-novo_transfer_form_datetime">
    <input type="hidden" id="old-novo_transfer_form_observacoes">
    <input type="hidden" id="old-novo_transfer_form_forma-de-pagamento">
    <input type="hidden" id="old-novo_transfer_form_estado-do-pagamento">
</div>
