<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->head("Home");
?>

<div id="ds_conteudo">
  <div id="sprint">
    <label for="select-sprint">Selecione o Sprint</label>
    <select name="select-sprint" id="select-sprint"></select>
  </div>
  <div class="scrum">
    <div id="to-do">
      <p class="status_tarefa">To-do</p>
      <div id="add_tarefas_to_do"></div>
    </div>
    <div id="in-progress">
      <p class="status_tarefa">in Progress</p>
      <div id="add_tarefas_in_progress"></div>
    </div>
    <div id="done">
      <p class="status_tarefa">Done</p>
      <div id="add_tarefas_done"></div>

    </div>
  </div>
</div>



<div class="modal" id="modalDetalhesTarefa" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tarefa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <input type="hidden" name="idTarefa" id="idTarefa">

          <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo">
          </div>

          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo">
          </div>

          <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao">
          </div>

          <div class="form-group">
            <label for="colaborador">Colaborador</label>
            <input type="text" name="colaborador" id="colaborador">
          </div>

          <div class="form-group">
            <label for="bug">Bug ?</label>
            <input type="text" name="bug" id="bug">
          </div>


          <div class="form-group">
            <label for="bug">Tarefa Bug</label>
            <input type="text" name="tarefa_bug" id="tarefa_bug">
          </div>

          <div class="form-group">
            <label for="data_iniciada">Data iniciada</label>
            <input type="text" name="data_iniciada" id="data_iniciada">
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <a href="" id="deletar-tarefa" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fecha</button>
      </div>
    </div>
  </div>
</div>


</div>

<?php
$pagina->addJS('../asset/js/sprint.js');
$pagina->footer();
?>

<!-- <div id="grafico">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div> -->