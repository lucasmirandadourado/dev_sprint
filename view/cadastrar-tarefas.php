<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/sprint.css');
$pagina->addCSS('../asset/css/cadastrar-tarefas.css');
$pagina->head("Cadastrar Tarefas");
?>

<div class="container">
    <div id="info-sprint" class="row">
        <div class="alert alert-info" role="alert">
            <h3>Informações do Sprint</h3>
            <input type="hidden" name="sprint_id" id="sprint_id" value="<?= $_GET['sprint'] ?>">
            <div class="form-group">
                <label for="nome-sprint">Nome Sprint: </label><span id="nome-sprint"></span>
            </div>
            <div class="form-group">
                <label for="colaborador-sprint">Qtd Colaboradores: </label><span id="colaborador-sprint"></span>
            </div>
            <div class="form-group">
                <label for="dias-sprint">Quantidade de Dias: </label><span id="dias-sprint"></span>
            </div>
        </div>

    </div>
    <br>
    <div id="addTarefa">
        <h4 for="">Adicionar Tarefa</h4>
        <form action="" id="tarefas-form" method="post">

            <div class="row">
                <input type="hidden" name="id" id="id" value="">

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

                <div class="form-group col-md-3">
                    <label for="colaborador">Colaborador</label>
                    <select name="colaborador" id="colaborador">
                        <option value="0">Selecione o colaborador</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <div>
                        <label for="bug" title="Essa tarefa é para resolver um problema de bug?">Bug</label>
                        <img src="../asset/icon/icons8-info.svg" alt="Essa tarefa é para resolver um problema de bug?">
                    </div>
                    <input type="checkbox" name="bug" id="bug">
                </div>

                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
                </div>
            </div>

            <div class="row" id="sabtn-right">
                <a id="salvar-sprint" class="btn btn-primary">Salvar</a>
            </div>
        </form>
    </div>

    <div id="tabela-tarefas">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tempo estimado</th>
                </tr>
            </thead>
            <tbody id="tarefas-tabela-row"></tbody>
        </table>
    </div>
</div>
<?php
$pagina->addJS('../asset/js/cadastrarTarefas.js');
$pagina->footer();
?>