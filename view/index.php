<?php
  require_once('../template/Pagina.php');
  $pagina = new Pagina();
  $pagina->addCSS('../asset/css/sprint.css');
  $pagina->head("Home");
?>

  <div id="ds_conteudo">
    <div id="selecionarSprint">
      

      <div id="editarSprint">
        <select name="selecionar-sprints" id="selecionar-sprints"></select>
        <a href="#" class="btn" id="spt-editarSprint">Editar</a>
        <a href="#" class="btn" id="spt-criarSprint">Criar</a>
      </div>

      <div id="mensagem"></div>

    </div>
    <div id="grafico">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div>
  </div>
</div>

<?php
  $pagina->addJS('../asset/js/sprint.js');
  $pagina->footer();
?>