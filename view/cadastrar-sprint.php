<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/sprint.css');
$pagina->addCSS('../asset/css/cadastrar_sprint.css');
$pagina->head("Cadastrar Sprint");
?>

<div id="ds_conteudo">
  <form id="formCadastrar" method="POST">
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

    <div id="addTarefa">
    
      <h4 for="">Adicionar Tarefa</h4>
      
      <div class="row">

        <div class="form-group col-md-2">
          <label for="codigo">Código</label>
          <input type="text" name="codigo" id="codigo" class="form-control">
        </div>

        <div class="form-group col-md-3">
          <label for="titulo">Titulo</label>
          <input type="text" name="titulo" id="titulo" class="form-control">
        </div>

        <div class="form-group col-md-5">
          <label for="descricao">Descrição</label>
          <input type="text" name="descricao" id="descricao" class="form-control">
        </div>

        <div class="form-group col-md-2">
          <label for="tempoEstimativa">Tempo estimativa</label>
          <input type="time" name="tempoEstimativa" id="tempoEstimativa" class="form-control">
        </div>
      </div>
      <div class="row" id="btn-salvar-tarefas">
        <a href="#" class="btn btn-success" id="addTarefaTabela">Add</a>
      </div>
    </div>

    <div id="">
      <table id="tarefas-tabela" class="table table-striped table-bordered">
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