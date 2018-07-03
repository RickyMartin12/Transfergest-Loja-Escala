<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            Utilizadores Registados
        </h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 20%">
                        Nome
                    </th>
                    <th style="width: 20%">
                        E-mail
                    </th>
                    <th style="width: 20%">
                        Utilizador
                    </th>
                    <th style="width: 20%">
                        Password
                    </th>
                    <th style="min-width:100px; text-align:right; width: 40%">
                        Acções
                    </th>
                </tr>
                </thead>
                <tbody id="tabela_utilizadores">
                <?php foreach($utilizadores as $utilizador){ ?>
                    <tr class="row-show-<?php echo $utilizador['id'];?>" data-id="<?php echo $utilizador['id'];?>">
                        <td class="name-<?php echo $utilizador['id'];?>">
                            <?php echo $utilizador['nome'];?>
                        </td>
                        <td>
                            <?php echo $utilizador['email'];?>
                        </td>
                        <td>
                            <?php echo $utilizador['utilizador'];?>
                        </td>
                        <td>
                            ***********
                        </td>
                        <td>
                            <div style="float:right" aria-label="..." class="btn-group" role="group">
                                <button class="btn btn-sm btn-danger button-delete" type="button">
                                    <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                    </span>
                                </button>

                                <button class="btn btn-sm btn-warning button-edit" type="button">
                                    <span aria-hidden="true" class="glyphicon glyphicon-lock">
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="row-hidden-<?php echo $utilizador['id'];?>" data-id="<?php echo $utilizador['id'];?>">
                        <td>
                            <?php echo $utilizador['nome'];?>
                        </td>
                        <td>
                            <?php echo $utilizador['email'];?>
                        </td>
                        <td>
                            <?php echo $utilizador['utilizador'];?>
                        </td>
                        <td>
                            <input style="min-width:150px;"class="form-control password-change" type="password" value=""/>
                        </td>
                        <td>
                            <div style="float:right" aria-label="..." class="btn-group" role="group">
                                <button class="btn btn-sm btn-success button-save" type="button">
                                    <span aria-hidden="true" class="glyphicon glyphicon-open-file">
                                    </span>
                                </button>
                                <button class="btn btn-sm btn-default button-close" type="button">
                                    <span aria-hidden="true" class="glyphicon glyphicon-remove-sign">
                                    </span>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>