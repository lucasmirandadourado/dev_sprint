<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->head("Home");
?>

<div id="ds_conteudo">
  <div id="sprint">
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
</div>

<?php
$pagina->addJS('../asset/js/sprint.js');
$pagina->footer();
?>

<!-- <div id="grafico">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div> -->