<?php
  require_once('../template/Pagina.php');
  $pagina = new Pagina();
  $pagina->addCSS('../asset/css/sprint.css');
  $pagina->head("Home");
?>

  <div id="conteudo">
    <div id="selecionarSprint">
      <select name="selecionar-sprints" id="selecionar-sprints"></select>
      <div id="info">
        <table class="table">

          <tbody>
            <tr>
              <td>Horas trabalhadas</td>
              <td id="horas_trabalhadas"></td>
            </tr>
            <tr>
              <td>Quantidade de tarefas</td>
              <td id="qtd_tarefa"></td>
            </tr>
            <tr>
              <td>Bugs</td>
              <td id="bugs"></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
    <div id="grafico">
      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    </div>
  </div>
</div>

<div id="footer">
  <div id="desenvolvedor">Desenvolvedor: Lucas Dourado</div>
  <img src="./asset/img/scrum-head.png" class="logo-footer" alt="Dev Sprint">
</div>

<?php
  $pagina->addJS('asset/js/sprint.js');
  $pagina->footer();
?>