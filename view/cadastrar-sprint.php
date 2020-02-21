<?php
require_once('../template/Pagina.php');
$pagina = new Pagina();
$pagina->addCSS('../asset/css/cadastrar_sprint.css');
$pagina->head("Cadastrar Sprint");
?>

<div id="ds_conteudo">

  <h1 class="sp_titulo">Criar Sprint</h1>
  <hr class="sp_divisao" />

  <form id="formCadastrar" method="POST">
    <div class="row sp-cadastro-sprint">

      <div class="col form-group col-md-8">
        <label for="nome">Nome do sprint</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Sprint">
      </div>

      <div class="col form-group col-md-4">
        <label for="qtdDevs">Quant. de Devs</label>
        <input type="number" class="form-control" id="qtdDevs" name="qtdDevs" placeholder="Quantidade de Desenvolvedores">
      </div>

      <div class="col form-group  col-md-4">
        <label for="qtdDiasSprint">Quant. de dias do Sprint</label>
        <input type="number" class="form-control" min="1" max="30" id="qtdDiasSprint" name="qtdDiasSprint" placeholder="Quantidade dias">
      </div>
    </div>

    <div class="datas-dias">

    </div>

    <div id="salvar-sprint">
      <button class="btn btn-success" id="sp-salvar-sprint" type="submit">Salvar</button>
    </div>
  </form>

  <br>

  <table id="tabela-sprint" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Data Criação</th>
        <th scope="col">Quant. Programador</th>
        <th scope="col">Quant. horas</th>
        <th scope="col">Quant. Tarefas</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>
</div>

<br>

<?php
$pagina->addJS('../asset/js/cadastrarSprint.js');
$pagina->footer();
?>