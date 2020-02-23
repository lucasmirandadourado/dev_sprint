<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/sprint.css');
$pagina->addCSS('../asset/css/cadastrar-tarefas.css');
$pagina->head("Cadastrar Tarefas");
?>

<div class="container">
    <div id="info-sprint" class="row">

        <h3>Sprint</h3>
        <hr class="sp_divisao">

        <input type="hidden" name="sprint_id" id="sprint_id" value="<?= $_GET['sprint'] ?>">

        <label for="nome-sprint">Nome Sprint<span id="nome-sprint"></span></label>

        <label for="colaborador-sprint">Qtd Colaboradores <span id="colaborador-sprint"></span></label>

        <label for="dias-sprint">Quantidade de Dias<span id="dias-sprint"></span></label>

    </div>
    <br>
    <div id="addTarefa">
        <button class="btn btn-primary" id="addTarefa">Adicionar Tarefa</button>
    </div>

    <table id="tabela-tarefas" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tempo estimado</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</div>


<div class="modal" id="modalCadastrarTarefa" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="tarefas-form" method="post">

                    <div class="row">

                        <div class="form-group col-md-2">
                            <label for="codigo">Código</label>
                            <input type="text" name="codigo" id="codigo" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tempoEstimativa">Tempo</label>
                            <input type="time" name="tempoEstimativa" id="tempoEstimativa" class="form-control">
                        </div>

                        <div class="form-group col-md-7">
                            <label for="titulo">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control">
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-1">
                            <div>
                                <label for="bug" title="Essa tarefa é para resolver um problema de bug?">Bug</label>
                            </div>
                            <input type="checkbox" name="bug" id="bug">
                        </div>

                        <div class="form-group col-md-11">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="" id="salvar-sprint" class="btn btn-primary">Sim</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="modalDeletarTarefa" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deletar Tarefa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idTarefa" id="idTarefa">
               <p>Têm certeza que deseja deletar essa tarefa?</p>
            </div>
            <div class="modal-footer">
                <a href="" id="deletar-tarefa" class="btn btn-primary">Sim</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
            </div>
        </div>
    </div>
</div>

<?php
$pagina->addJS('../asset/js/cadastrarTarefas.js');
$pagina->footer();
?>