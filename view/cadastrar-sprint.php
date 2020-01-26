<?php
  require_once('../template/Pagina.php');
  $pagina = new Pagina();
  $pagina->addCSS('../asset/css/sprint.css');
  $pagina->head("Cadastrar Sprint");
?>

  <div id="conteudo">
    <form id="formCadastrar">
      <div class="row">

        <div class="col form-group">
          <label for="nome">Nome do sprint</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Sprint">
        </div>

        <div class="col form-group">
          <label for="qtdDiasSprint">Quantidade de dias do Sprint</label>
          <input type="number" class="form-control" id="qtdDiasSprint" name="qtdDiasSprint" placeholder="Quantidade dias">
        </div>

        <div class="col form-group">
          <label for="qtdDevs">Quantidade de Desenvolvedores</label>
          <input type="number" class="form-control" id="qtdDevs" name="qtdDevs" placeholder="Quantidade de Desenvolvedores">
        </div>

      </div>
      <div id="dias">

      </div>

      <div id="tabela">
        <table id="tarefas-tabela" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Código</th>
              <th>Tarefa</th>
              <th>Descrição</th>
              <th>Horas estimadas</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody id="conteudo">
            
          </tbody>
        </table>
      </div>

      <button type="submit" id="salvar-sprint" class="btn btn-primary">Salvar</button>
    </form>
  </div>

</div>
<div id="footer">
  <div id="desenvolvedor">Desenvolvedor: Lucas Dourado</div>
  <img src="../asset/img/scrum-head.png" class="logo-footer" alt="Dev Sprint">
</div>


<?php
  $pagina->addJS('../asset/js/cadastrarSprint.js');
  $pagina->footer();
?>