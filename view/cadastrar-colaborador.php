<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/cadastrar_colaborador.css');
$pagina->addCSS('../asset/css/dataTables.bootstrap4.min.css');
$pagina->head("Cadastrar Colaborador");
?>


<div id="ds_conteudo">

    <h1 class="sp_titulo">Colaborador</h1>
    <hr class="sp_divisao" />
    <div id="addColaborador">
        <a class="btn" id="btn-addColaborador">Cadastrar Colaborador</a>
    </div>

    <br>
    <table id="tabela-colaboradores" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody></tbody>
    </table>

    <br>

    <div class="modal" id="modalCadastrarColaborador" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastrar Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="cadastrar_mensagem"></div>
                    <form id="cadastrarColaborador" method="POST">
                        
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="text" name="cargo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" name="login" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <a href="" id="spt-salvar-colaborador" class="btn btn-primary">Salvar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="modalDeletarColaborador" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Deletar Colaborador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="mensagem_confirmar_remocao"></div>
                    Têm certeza que deseja remover esse colaborador?
                    <input type="hidden" id="id" name="id">                    
                </div>
                <div class="modal-footer">
                    <a href="" id="spt-deletar-colaborador" class="btn btn-primary">Sim</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
$pagina->addJS('../asset/js/cadastrarColaborador.js');
$pagina->footer();
?>