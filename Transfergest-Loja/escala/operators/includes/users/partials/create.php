<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Novo Utilizador
            <span class="pull-right" id="form_novo_utilizador_notification">
            </span>
        </h3>
    </div>
    <div class="panel-body">
        <form id="form_novo_utilizador">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span aria-hidden="true" class="glyphicon glyphicon-tower">
                                </span>
                            </div>
                            <input class="form-control" name="nome" placeholder="Nome *" type="text">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="sr-only" for="responsavel">
                            E-mail
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope">
                                </span>
                            </div>
                            <input class="form-control" name="email" placeholder="E-mail *" type="email">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="sr-only" for="responsavel">
                            Nome Utilizador
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user">
                                </span>
                            </div>
                            <input class="form-control" name="utilizador" placeholder="Nome Utilizador *" type="text">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="sr-only" for="responsavel">
                            Password
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-lock">
                                </span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password *" type="password">
                            <input name="operador_admin_id" type="hidden" value="<?php echo $idOperador; ?>">
                            </input>
                            </input>
                        </div>
                    </div>
                </div>
        </form>
        <div class="col-xs-12">
<p style="text-align:right;">
            <button class="btn btn-default btn-clear" id="btn_clear_form_novo_utilizador" type="button"><span class="glyphicon glyphicon-erase"></span><font class="hidden-xs"> Limpar</font></button>
            <button class="btn btn-success" id="btn_submit_form_novo_utilizador" type="button"><span class="glyphicon glyphicon-save-file"></span><font class="hidden-xs"> Guardar</font></button>
</p>

</div>

    </div>
</div>