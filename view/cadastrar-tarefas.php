<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/sprint.css');
$pagina->addCSS('../asset/css/cadastrar_sprint.css');
$pagina->head("Cadastrar Tarefas");
?>

<div id="addTarefa">

    <h4 for="">Adicionar Tarefa</h4>
    <div class="row">
        <form action="" method="post">
            <div class="form-group col-md-2">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" id="codigo" class="form-control">
            </div>

            <div class="form-group col-md-7">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
            </div>

            <div class="form-group col-md-3">
                <label for="tempoEstimativa">Tempo</label>
                <input type="time" name="tempoEstimativa" id="tempoEstimativa" class="form-control">
            </div>

            <div class="form-group col-md-12">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" id="salvar-sprint" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>

<?php
$pagina->addJS('../asset/js/cadastrarSprint.js');
$pagina->footer();
?>